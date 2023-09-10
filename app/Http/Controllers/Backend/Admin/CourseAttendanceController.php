<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Auth\User;
use App\Models\Course;
use App\Models\CourseTimeline;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class CourseAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('live_lesson_access')) {
            return abort(401);
        }
        $courses = $courses = Course::has('category')->ofTeacher()->where('bag_type', 2)->pluck('title', 'id')->prepend('Please select', '');

        $course = null;
        
        if (request()->course_id != "") {
            $course = Course::find(request()->course_id);
        }
        return view('backend.course-attendance.index', compact('courses', 'course'));
    }

    /**
     * Display a listing of Lessons via ajax DataTable.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {

        $courseStudents = Course::query();


        if ($request->course_id != "") {
            $courseStudents = $courseStudents->where('id', $request->course_id)->first()->students()->withCount(['certificates' => fn($q) => $q->where('course_id', $request->course_id)])->with(['attendances' => fn($q) => $q->where('course_id', $request->course_id)]);
        }

        return DataTables::of($courseStudents)
            ->addIndexColumn()
            ->addColumn('actions', function ($q) use ($request) {
                $view = '';
                
                $attendanceDates = json_encode($q->attendances->first() ? $q->attendances->first()->attendance_dates : []);

                $view .= view('backend.datatable.action-attendance')
                ->with(['courseId' => $request->course_id, 'userId' => $q->id, 'attendanceDates' => $attendanceDates])->render();


                if($q->certificates_count == 0) {
                    $view .= view('backend.datatable.action-assign-certificate')
                        ->with(['route' => route('admin.course-attendance.assign_cert', ['course' => $request->course_id, 'user' => $q->id])])->render();
                }
                
                return $view;
            })->addColumn('attendance_days', function($q) {
                return count($q->attendances->first() ? $q->attendances->first()->attendance_dates : []);
            })
            ->rawColumns(['actions'])
            ->make();
    }

    public function assignCertificate(Course $course, User $user) {
        CertificateController::certificateGenerator($course, $user);

        return back()->withFlashSuccess(trans('Certificate generated successfully'));
    }

    public function saveStudentAttendance(Request $request, Course $course, User $user) {
        $request->validate([
            'attendance_dates' => 'nullable|array'
        ]);

        $dates = $request->attendance_dates ?: [];

        $att = Attendance::where(['course_id' => $course->id, 'user_id' => $user->id])->exists();

        if($att) {
            Attendance::where(['course_id' => $course->id, 'user_id' => $user->id])->update(['attendance_dates' => $dates]);
        }else {
            $att = Attendance::create(['course_id' => $course->id, 'user_id' => $user->id, 'attendance_dates' => $dates]);
        }


        return response()->json(['status' => 200, 'attendance_dates' => json_encode($dates)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('live_lesson_create')) {
            return abort(401);
        }
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('role_id', 2);
        })->get()->pluck('name', 'id');
        $courses = Course::has('category')->ofTeacher()->get()->pluck('title', 'id')->prepend('Please select', '');
        return view('backend.live-lessons.create', compact('courses', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('live_lesson_create')) {
            return abort(401);
        }
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'short_text' => 'required'
        ]);

        $slug = str_slug($request->title);

        $slug_lesson = Lesson::where('slug', '=', $slug)->first();

        if ($slug_lesson != null) {
            return back()->withFlashDanger(__('alerts.backend.general.slug_exist'));
        }

        $liveLesson = Lesson::create($request->all());

        $liveLesson->slug = $slug;
        $liveLesson->live_lesson = 1;
        $liveLesson->published = 1;
        $liveLesson->save();


        $this->courseTimeLine($request, $liveLesson);

        return redirect()->route('admin.live-lessons.index', ['course_id' => $request->course_id])->withFlashSuccess(__('alerts.backend.general.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Lesson $liveLesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $liveLesson)
    {
        if (!Gate::allows('live_lesson_view')) {
            return abort(401);
        }
        return view('backend.live-lessons.show', compact('liveLesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Lesson $liveLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $liveLesson)
    {
        if (!Gate::allows('live_lesson_edit')) {
            return abort(401);
        }
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('role_id', 2);
        })->get()->pluck('name', 'id');
        $courses = Course::has('category')->ofTeacher()->get()->pluck('title', 'id')->prepend('Please select', '');
        return view('backend.live-lessons.edit', compact('courses', 'liveLesson', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lesson $liveLesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $liveLesson)
    {
        if (!Gate::allows('live_lesson_edit')) {
            return abort(401);
        }
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'short_text' => 'required'
        ]);

        $slug = str_slug($request->title);

        $slug_lesson = Lesson::where('slug', '=', $slug)->where('id', '!=', $liveLesson->id)->first();

        if ($slug_lesson != null) {
            return back()->withFlashDanger(__('alerts.backend.general.slug_exist'));
        }

        $liveLesson->update($request->all());

        $this->courseTimeLine($request, $liveLesson);

        return redirect()->route('admin.live-lessons.index', ['course_id' => $request->course_id])->withFlashSuccess(__('alerts.backend.general.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lesson $liveLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $liveLesson)
    {
        if (!Gate::allows('live_lesson_delete')) {
            return abort(401);
        }
        $liveLesson->chapterStudents()->where('course_id', $liveLesson->course_id)->forceDelete();
        $liveLesson->delete();
        return back()->withFlashSuccess(__('alerts.backend.general.deleted'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('live_lesson_delete')) {
            return abort(401);
        }
        $liveLesson = Lesson::onlyTrashed()->findOrFail($id);
        $liveLesson->restore();

        return back()->withFlashSuccess(trans('alerts.backend.general.restored'));
    }

    /**
     * Permanent remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function permanent($id)
    {
        if (!Gate::allows('live_lesson_delete')) {
            return abort(401);
        }
        $liveLesson = Lesson::onlyTrashed()->findOrFail($id);
        $timelineStep = CourseTimeline::where('model_id', '=', $id)
            ->where('course_id', '=', $liveLesson->course->id)->first();
        if ($timelineStep) {
            $timelineStep->delete();
        }

        $liveLesson->forceDelete();

        return back()->withFlashSuccess(trans('alerts.backend.general.deleted'));
    }

    private function courseTimeLine(Request $request, $liveLesson)
    {
        $sequence = 1;
        if (count($liveLesson->course->courseTimeline) > 0) {
            $sequence = $liveLesson->course->courseTimeline->max('sequence');
            $sequence = $sequence + 1;
        }

        $timeline = CourseTimeline::where('model_type', '=', Lesson::class)
            ->where('model_id', '=', $liveLesson->id)
            ->where('course_id', $request->course_id)->first();
        if ($timeline == null) {
            $timeline = new CourseTimeline();
        }
        $timeline->course_id = $request->course_id;
        $timeline->model_id = $liveLesson->id;
        $timeline->model_type = Lesson::class;
        $timeline->sequence = $sequence;
        $timeline->save();
    }
}
