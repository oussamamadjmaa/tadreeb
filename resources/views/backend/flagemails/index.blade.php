@extends('backend.layouts.app')
@section('title', __('global.flagemail.title').' | '.app_name())
@push('after-styles')
    <link rel="stylesheet" href="{{asset('assets/css/colors/switch.css')}}">
@endpush
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">@lang('global.flagemail.title')</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">

                        <table id="myTable"
                               class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('labels.backend.courses.fields.title')</th>
                                <th>@lang('validation.attributes.frontend.email')</th>
                                <th>&nbsp; @lang('strings.backend.general.actions')</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($subs as $key => $sub)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$sub->course->title}}</td>
                                        <td>{{$sub->email}}</td>
                                        <td>
                                            <a href="{{route('admin.flagemails.create', ['course_id' => $sub->course_id, 'email' => $sub->email])}}" class="btn btn-primary">{{__('global.Single Message')}}</a>
                                            <a href="{{route('admin.flagemails.create', ['course_id' => $sub->course_id])}}" class="btn btn-success">{{__('global.Course Message')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>

        $(document).ready(function () {
           var table = $('#myTable').DataTable({
                iDisplayLength: 10,
                dom: 'lfBrtip<"actions">',
                buttons: [
                    {
                        extend: 'csv',
                    },
                    {
                        extend: 'pdf',
                    },
                    'colvis'
                ],
                language:{
                    url : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/{{$locale_full_name}}.json",
                    buttons :{
                        colvis : '{{trans("datatable.colvis")}}',
                        pdf : '{{trans("datatable.pdf")}}',
                        csv : '{{trans("datatable.csv")}}',
                    }
                }

            });


        });
    </script>

@endpush