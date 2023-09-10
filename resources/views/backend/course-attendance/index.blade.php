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

                            <th>@lang('labels.backend.live_lessons.fields.title')</th>

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

@stop

@push('after-scripts')
    <script>

        $(document).ready(function () {
            var route = '{{route('admin.live-lessons.get_data')}}';


            @php
            $show_deleted = (request('show_deleted') == 1) ? 1 : 0;
            $course_id = (request('course_id') != "") ? request('course_id') : 0;
            $route = route('admin.course-attendance.get_data',['show_deleted' => $show_deleted,'course_id' => $course_id]);
            @endphp

            route = '{{$route}}';
            route = route.replace(/&amp;/g, '&');

            @if(request('course_id') != "" || request('show_deleted') != "")

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
        });

    </script>
@endpush
