@extends('backend.layouts.app')

@section('title', __('labels.frontend.training_needs').' | '.app_name())
@push('after-styles')
<style>
    table th {
        width: 20%;
    }
</style>
@endpush
@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="page-title d-inline mb-0">@lang('labels.frontend.training_needs')</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('validation.attributes.frontend.suggested.title')</th>
                            <td>{{ $need->title }}</td>
                        </tr>

                        <tr>
                            <th>@lang('validation.attributes.frontend.suggested.category')</th>
                            <td>{{ $need->category->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('validation.attributes.frontend.suggested.idea')</th>
                            <td>{!! $need->idea !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('validation.attributes.frontend.suggested.course_topics')</th>
                            <td>{!! $need->course_topics !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
        </div>
    </div>
@stop
