@extends('backend.layouts.app')
@section('title', __('labels.frontend.training_needs').' | '.app_name())
@push('after-styles')
    <link rel="stylesheet" href="{{asset('assets/css/colors/switch.css')}}">
@endpush
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">@lang('labels.frontend.training_needs')</h3>
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
                                <th>ID</th>
                                <th>@lang('validation.attributes.frontend.suggested.title')</th>
                                <th>@lang('validation.attributes.frontend.suggested.category')</th>
                                <th>@lang('validation.attributes.frontend.suggested.course_field')</th>
                                <th>@lang('validation.attributes.frontend.suggested.idea')</th>
                                <th>@lang('validation.attributes.frontend.suggested.course_topics')</th>
                                <th>&nbsp; @lang('strings.backend.general.actions')</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($training_needs as $key => $need)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$need->id}}</td>
                                        <td>{{$need->title}}</td>
                                        <td>{{$need->category->name}}</td>
                                        <td>{{$need->course_field}}</td>
                                        <td>{{$need->idea}}</td>
                                        <td>{{$need->course_topics}}</td>
                                        <td>
                                            {!! view('backend.datatable.action-view')
                                            ->with(['route' => route('admin.training_needs.show', $need->id)])->render() !!}
                                            {!!  view('backend.datatable.action-delete')
                                            ->with(['route' => route('admin.training_needs.destroy', $need->id)])
                                            ->render() !!}
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