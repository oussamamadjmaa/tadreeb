@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.live_lessons.title').' | '.app_name())

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">@lang('Attendance and certificates')</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('course_id', trans('labels.backend.live_lessons.fields.course'), ['class' => 'control-label']) !!}
                    {!! Form::select('course_id', $courses,  (request('course_id')) ? request('course_id') : old('course_id'), ['class' => 'form-control js-example-placeholder-single select2 ', 'id' => 'course_id']) !!}
                </div>
            </div>
            <div class="d-block">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="{{ route('admin.course-attendance.index',['course_id'=>request('course_id')]) }}"
                           style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">{{trans('labels.general.all')}}</a>
                    </li>
                </ul>
            </div>

            @if(request('course_id') != "")
                <div class="table-responsive">

                    <table id="myTable"
                           class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('labels.general.sr_no')</th>

                            <th>@lang('labels.backend.live_lesson_slots.student_name')</th>

                            <th>@lang('Attendance days')</th>

                            <th>@lang('strings.backend.general.actions') &nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            @endif

        </div>
    </div>
    
    @if ($course)
        <!-- Modal -->
    <div class="modal fade" id="attendanceMakerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="attendancesForm">
                    @csrf
                    <input type="hidden" name="course_id" id="course_id">
                    <input type="hidden" name="user_id" id="user_id">

                    <div class="modal-body pt-4">
                        @php
                            $ranges = Carbon\CarbonPeriod::create($course->start_date, $course->expire_at);
                        @endphp
                        @foreach ($ranges as $date)
                        <div class="checkbox">
                            <input name="attendance_dates[]" class='attendance_date_input' id="d{{$date->format('Ymd')}}" type="checkbox" value="{{$date->format('Y-m-d')}}">
                            <label for="d{{$date->format('Ymd')}}" class="checkbox control-label font-weight-bold">{{$date->translatedFormat('d M Y')}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@stop

@push('after-scripts')
    <script>

        $(document).ready(function () {
            var route = '{{route('admin.live-lessons.get_data')}}';


            @php
            $course_id = (request('course_id') != "") ? request('course_id') : 0;
            $route = route('admin.course-attendance.get_data',['course_id' => $course_id]);
            @endphp

            route = '{{$route}}';
            route = route.replace(/&amp;/g, '&');

            @if(request('course_id') != "")

            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: 10,
                retrieve: true,
                dom: 'lfBrtip<"actions">',
                buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [ 0,1]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [ 0, 1]
                        }
                    },
                    'colvis'
                ],
                ajax: route,
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex', searchable: false, orderable:false},
                    {data: "full_name", name: 'full_name'},
                    {data: "attendance_days", name: 'attendance_days'},
                    {data: "actions", name: "actions"}
                ],
                createdRow: function (row, data, dataIndex) {
                    $(row).attr('data-entry-id', data.id);
                },
                language:{
                    url : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/{{$locale_full_name}}.json",
                    buttons :{
                        colvis : '{{trans("datatable.colvis")}}',
                        pdf : '{{trans("datatable.pdf")}}',
                        csv : '{{trans("datatable.csv")}}',
                    }
                }
            });

            @endif

            $(".js-example-placeholder-single").select2({
                placeholder: "{{trans('labels.backend.live_lessons.select_course')}}",
            });
            $(document).on('change', '#course_id', function (e) {
                var course_id = $(this).val();
                window.location.href = "{{route('admin.course-attendance.index')}}" + "?course_id=" + course_id
            });
            var attCourseId;
            var attUserId;

            $(document).on('click', '.change_attendance', function() {
                attCourseId = $(this).data('course-id');
                attUserId = $(this).data('user-id');

                $("#attendancesForm #course_id").val(attCourseId)
                $("#attendancesForm #user_id").val(attUserId)

                $('.attendance_date_input').prop('checked', false);

                JSON.parse($(this).attr('data-attendance-dates')).forEach(date => {
                    $('[value="'+date+'"]').prop('checked', true);
                });

                $("#attendanceMakerModal").modal('show');
            })

            let attSaveRoute = "{{route('admin.course-attendance.save_student_attendance', ['course' => 'courseId', 'user' => 'userId'])}}";
            $(document).on('submit', '#attendancesForm', function(e) {
                e.preventDefault()

                let formData = $(this).serialize()

                $.ajax({
                    url:attSaveRoute.replace('courseId', attCourseId).replace('userId', attUserId),
                    method:'POST',
                    data:formData,
                    dataType:'json'
                }).always(() => {
                    $('#attendancesForm .btn').prop('disabled', false)
                }).done((data) => {
                    $("#attendanceMakerModal").modal('hide');
                    $('.c'+attCourseId+''+attUserId).attr('data-attendance-dates', data.attendance_dates);
                })
            })
        });

    </script>
@endpush
