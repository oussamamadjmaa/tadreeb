<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Bundle;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Notifications\NewlettersNotification;
use DataTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReportController extends Controller
{
    public function getSalesReport(Request $request)
    {
        $courses = Course::ofTeacher()->pluck('id');
        $bundles = Bundle::ofTeacher()->pluck('id');

        $coursess = Course::ofTeacher()->withSum('item', 'price')->withCount('item')->get();
        //  bundle query
        $bundle_earnings = Order::query()->with('items')->where('status', '=', 1);
        if($request->get('bundle')){
            $bundle_earnings->whereHas('items', function ($q) use ($request) {
                $q->where('item_type', '=', Bundle::class)
                    ->where('item_id', $request->get('bundle'));
            });
        }else {
            $bundle_earnings->whereHas('items', function ($q) use ($bundles) {
                $q->where('item_type', '=', Bundle::class)
                    ->whereIn('item_id', $bundles);
            });
        }

        //  course query
        $course_earnings = Order::query()->with('items')->where('status', '=', 1);
        if($request->get('course')){
            $course_earnings->whereHas('items', function ($q) use ($request) {
                $q->where('item_type', '=', Course::class)
                    ->where('item_id', $request->get('course'));
            });
        }else{
            $course_earnings->whereHas('items', function ($q) use ($courses) {
                $q->where('item_type', '=', Course::class)
                    ->whereIn('item_id', $courses);
            });
        }


        if($request->get('student')){
            $bundle_earnings->whereHas('user', function (Builder $query) use($request){
                $query->where('id', '=', $request->get('student'));
            });

            $course_earnings->whereHas('user', function (Builder $query) use($request){
                $query->where('id', '=', $request->get('student'));
            });
        }

        $bundle_earnings =  $this->dateFilter($bundle_earnings);

        $course_earnings =  $this->dateFilter($course_earnings);

        // bundle sales and amount count
        $bundle_sales = $bundle_earnings->count();
        $bundle_earnings = $bundle_earnings->sum('amount');

        // course sales ans amount cont
        $course_sales = $course_earnings->count();
        $course_earnings = $course_earnings->sum('amount');

        $total_earnings = $course_earnings + $bundle_earnings;
        $total_sales = $course_sales + $bundle_sales;

        $students = User::query()->role('student')->get(['id', 'first_name', 'last_name']);

        $courses = Course::ofTeacher()->get(['id', 'title']);

        $bundles = Bundle::ofTeacher()->get(['id', 'title']);

        $subscribe = Order::query()->with(['plan', 'user'])->where('status', '=', 1)->where('plan_id', '!=', 0)->get();
        // bundle sales and amount count
        $subscribe_sales = $subscribe->count();
        $subscribe_earnings=0;
        if($subscribe){
            foreach ($subscribe as $sub){
                $subscribe_earnings += $sub->plan->amount;
            }
        }

        return view('backend.reports.sales', compact('total_earnings', 'total_sales', 'students', 'courses', 'bundles','subscribe_sales','subscribe_earnings'));
    }

    public function getStudentsReport()
    {
        return view('backend.reports.students');
    }

    public function getCourseData(Request $request)
    {
        $courses = Course::ofTeacher()->withSum(
            ['item' => fn($q) => 
            $q->whereHas('order', fn($q2) => $q2
                                            ->where(['status' => 1, 'plan_id' => 0])
                                            ->when(($request->get('from')), fn($q) => $q->whereDate('created_at','>=', $request->get('from')))
                                            ->when(($request->get('to')), fn($q) => $q->whereDate('created_at','<=', $request->get('to')))
            )], 'price')
            ->withSum(
                ['item' => fn($q) => 
                $q->whereHas('order', fn($q2) => $q2
                                                ->where(['status' => 1, 'plan_id' => 0])
                                                ->when(($request->get('from')), fn($q) => $q->whereDate('created_at','>=', $request->get('from')))
                                                ->when(($request->get('to')), fn($q) => $q->whereDate('created_at','<=', $request->get('to')))
                )], 'cert_price')
            ->withCount(['item' => fn($q) => 
                $q->when(($request->get('from')), fn($q) => $q->whereDate('created_at','>=', $request->get('from')))
                ->when(($request->get('to')), fn($q) => $q->whereDate('created_at','<=', $request->get('to')))])
            ->withCount(['item as certificates_count' => fn($q) => 
                $q->where('cert_price' , '>', 0)
                ->when(($request->get('from')), fn($q) => $q->whereDate('created_at','>=', $request->get('from')))
                ->when(($request->get('to')), fn($q) => $q->whereDate('created_at','<=', $request->get('to')))])
            ;
        return \DataTables::of($courses)
                ->addColumn('item_sum_price_tax', function($q){
                    return number_format(((($q->item_sum_price)/100)*15), 2);
                })
                ->addColumn('item_sum_cert_price_tax', function($q){
                    return number_format(((($q->item_sum_cert_price)/100)*15), 2);
                })->addColumn('e3tmad', function($q){
                    return $q->e3tmad->first_name ?? 'لا يوجد';
                })->addColumn('teachers', function($q){
                    $teachers = '';
                    foreach ($q->teachers as $teacher) {
                        $teachers .= $teacher->name . "\n";
                    }
                    return $teachers;
                })
                ->editColumn('created_at', function ($query) {
                    return $query->created_at->format('d-m-y H:i:s A');
                })
                ->editColumn('item_sum_price', function ($query) {
                    return $query->item_sum_price ?? 0;
                })
                ->editColumn('item_sum_cert_price', function ($query) {
                    return $query->item_sum_cert_price ?? 0;
                })
                ->addIndexColumn()
                ->make();
        // $course_orders = OrderItem::query()->with(['item', 'order', 'order.user'])->whereHas('order', function ($q) {
        //     $q->where('status', '=', 1);
        //     $q->where('plan_id', '=', 0);
        // });

        // if($request->get('course')){
        //     $course_orders->whereHasMorph(
        //         'item',
        //         'App\Models\Course',
        //         function (Builder $query) use ($request) {
        //             $query->where('id', $request->get('course'));
        //         }
        //     );
        // }else {
        //     $course_orders->whereHasMorph(
        //         'item',
        //         'App\Models\Course',
        //         function (Builder $query) use ($courses) {
        //             $query->whereIn('id', $courses);
        //         }
        //     );
        // }
       
        // if($request->get('student')){
        //     $course_orders->whereHas('order.user', function (Builder $query) use($request){
        //         $query->where('id', '=', $request->get('student'));
        //     });
        // }

        // $course_orders =  $this->dateFilter($course_orders);
        // return \DataTables::of($course_orders)
            // ->addColumn('course', function ($query) {
            //     $course_name = $query->item->title;
            //     $course_slug = $query->item->slug;
            //     $link = "<a href='" . route('courses.show', [$course_slug]) . "' target='_blank'>" . $course_name . "</a>";
            //     return $link;
            // })
            // ->addColumn('title', function ($query) {
            //     return $query->item->title;
            // })
            // ->addColumn('amount', function ($query) {
            //     return $query->order->amount;
            // })
            // ->addColumn('student', function ($query) {
            //     return $query->order->user->name;
            // })
            // ->addColumn('transaction', function ($query) {
            //     if ($query->order->transaction_id) {
            //         return $query->order->transaction_id;
            //     }
            //     return;
            // })
            // ->editColumn('created_at', function ($query) {
            //     return $query->created_at->format('d-m-y H:i:s A');
            // })
            // ->rawColumns(['course'])
            // ->addIndexColumn()
            // ->make();
    }

    public function getBundleData(Request $request)
    {
        $bundles = Bundle::ofTeacher()->has('students', '>', 0)->withCount('students')->pluck('id');

        $bundle_orders = OrderItem::query()->with(['item', 'order', 'order.user'])->whereHas('order', function ($q) {
            $q->where('status', '=', 1);
            $q->where('plan_id', '=', 0);
        });

        if($request->get('bundle')){
            $bundle_orders->whereHasMorph(
                'item',
                'App\Models\Bundle',
                function (Builder $query) use ($request) {
                    $query->where('id', $request->get('bundle'));
                }
            );
        }else {
            $bundle_orders->whereHasMorph(
                'item',
                'App\Models\Bundle',
                function (Builder $query) use ($bundles) {
                    $query->whereIn('id', $bundles);
                }
            );
        }

        if($request->get('student')){
            $bundle_orders->whereHas('order.user', function (Builder $query) use($request){
                $query->where('id', '=', $request->get('student'));
            });
        }

        $bundle_orders =  $this->dateFilter($bundle_orders);

        return \DataTables::of($bundle_orders)
            ->addIndexColumn()
            ->addColumn('bundle', function ($q) {
                $bundle_name = $q->item->title;
                $bundle_slug = $q->item->slug;
                $link = "<a href='" . route('bundles.show', [$bundle_slug]) . "' target='_blank'>" . $bundle_name . "</a>";
                return $link;
            })
            ->addColumn('title', function ($query) {
                return $query->item->title;
            })
            ->addColumn('amount', function ($query) {
                return $query->order->amount;
            })
            ->addColumn('student', function ($query) {
                return $query->order->user->name;
            })
            ->addColumn('transaction', function ($query) {
                if ($query->order->transaction_id) {
                    return $query->order->transaction_id;
                }
                return;
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at->format('d-m-y H:i:s A');
            })
            ->rawColumns(['course'])
            ->rawColumns(['bundle'])
            ->make();
    }
    public function getSubscibeData(Request $request)
    {
        $orders = Order::query()->with(['plan', 'user'])->where('status', '=', 1)->where('plan_id', '!=', 0)->get();

        return \DataTables::of($orders)
            ->addIndexColumn()
            ->addColumn('title', function ($query) {
                return $query->plan->name;
            })
            ->addColumn('amount', function ($query) {
                return $query->amount;
            })
            ->addColumn('student', function ($query) {
                return $query->user->name;
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at->format('d-m-y H:i:s A');
            })
            ->rawColumns(['student','title'])
            ->make();

    }
    public function getStudentsData(Request $request)
    {
        $courses = Course::ofTeacher()->has('students', '>', 0)->withCount('students')->get();

        return \DataTables::of($courses)
            ->addIndexColumn()
            ->addColumn('completed', function ($q) {
                $count = 0;
                if (count($q->students) > 0) {
                    foreach ($q->students as $student) {
                        $completed_lessons = $student->chapters()->where('course_id', $q->id)->get()->pluck('model_id')->toArray();
                        if (count($completed_lessons) > 0) {
                            $progress = intval(count($completed_lessons) / $q->courseTimeline->count() * 100);
                            if ($progress == 100) {
                                $count++;
                            }
                        }
                    }
                }
                return $count;

            })->addColumn('actions', function($q){
                return '<a class="btn btn-success" title="'.__('labels.backend.reports.fields.students').'" href="'.route('admin.reports.show_students', $q->id).'">'.__('labels.backend.reports.fields.students').'</a>
                <a class="btn btn-primary sendMsg" data-toggle="modal" data-target="#sendMsg" href="#" title="'.__('global.Group Message').'" data-id="'.$q->id.'">'.__('global.Group Message').'</a>';
            })
            ->rawColumns(['actions'])
            ->make();
    }

    private function dateFilter($query)
    {

        if(request()->get('applyDate')){
            if(request()->get('date')) {
                $date = explode(' / ', request()->get('date'));
                $start = $date[0];
                $end = $date[1];
                $query->whereDate('created_at','<=', $end)->whereDate('created_at', '>=', $start);
            }
        }
        return $query;
    }

    public function showStudents(Course $course){
        return view('backend.reports.students_list', compact('course'));
    }

    public function getStudents(Course $course){
        $course->load(['students:id,first_name,last_name,email']);
        return \DataTables::of($course->students)
            ->addColumn('actions', function($q){
                return '<a class="btn btn-primary sendMsg" data-toggle="modal" data-target="#sendMsg" href="#" title="'.__('global.Single Message').'" data-email="'.$q->email.'">'.__('global.Single Message').'</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['actions'])
            ->make();
    }

    public function msgStudents(Request $request){
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'subject' => 'required|string',
            'message_text' => 'required|string'
        ]);
        if($request->has('email')){
            $request->validate([
                'email' => 'required|email:dns'
            ]);
            $emails = [$request->email];
        }else{
            $course = Course::find($request->course_id);
            $emails = $course->students->pluck('email')->toArray();
        }
        $data = (object)[
            'subject' => $request->subject,
            'message' => $request->message_text
        ];
        foreach ($emails as $email) {
            Notification::route('mail', $emails)->notify(new NewlettersNotification($data));
        }

        return back()->with(['flash_success' => 'تم إرسال الرسالة بنجاح']);
    }
}
