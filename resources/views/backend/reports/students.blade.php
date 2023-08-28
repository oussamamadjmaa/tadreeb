@extends('backend.layouts.app')

@section('title', __('labels.backend.reports.students_report').' | '.app_name())

@push('after-styles')
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: right !important;
            text-align: left;
            margin-left: 25%;
        }

        div.dt-buttons {
            display: inline-block;
            width: 100%;
            text-align: center;
        }
    </style>
@endpush
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">@lang('labels.backend.reports.students_report')</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>@lang('labels.general.sr_no')</th>
                                <th>@lang('labels.backend.reports.fields.course')</th>
                                <th>@lang('labels.backend.reports.fields.students')</th>
                                <th>@lang('labels.backend.reports.fields.completed')</th>
                                <th>&nbsp; @lang('strings.backend.general.actions')</th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sendMsg" tabindex="-1" role="dialog" aria-labelledby="sendMsgModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('admin.reports.msg_students')}}" method="POST">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMsgModalLabel">{{__('global.Group Message')}}</h5>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                          <label for="subject">{{__('global.subject')}}</label>
                          <input type="text"
                            class="form-control" name="subject" id="subject"  placeholder="{{__('global.subject')}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="0" name="course_id" id="course_id_">
                            <label for="message-text" class="col-form-label">{{__('global.message')}}:</label>
                            <textarea class="form-control" name="message_text" rows="12" cols="6" id="message-text"></textarea>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">{{__('global.cancel')}}</button>
                    <button type="submit" class="btn btn-primary mr-1 SendMsg">{{__('global.send')}}</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@stop

@push('after-scripts')
    <script>

        $(document).ready(function () {
            var course_route = '{{route('admin.reports.get_students_data')}}';

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
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'colvis'
                ],
                ajax: course_route,
                columns: [

                    {data: "DT_RowIndex", name: 'DT_RowIndex', width: '8%'},
                    {data: "title", name: 'title'},
                    {data: "students_count", name: 'students'},
                    {data: "completed", name: 'completed'},
                    {data: "actions", name: 'actions'},
                ],
                language:{
                    url : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/{{$locale_full_name}}.json",
                    buttons :{
                        colvis : '{{trans("datatable.colvis")}}',
                        pdf : '{{trans("datatable.pdf")}}',
                        csv : '{{trans("datatable.csv")}}',
                    }
                },

                createdRow: function (row, data, dataIndex) {
                    $(row).attr('data-entry-id', data.id);
                },
            });

            $(document).on('click', '.sendMsg', function(){
                var id = $(this).data('id');
                $('#course_id_').val(id);
            })
        });

    </script>

@endpush
