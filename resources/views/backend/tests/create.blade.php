@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@push('after-styles')
    <style>
        .select2-container--default .select2-selection--single {
            height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }

    </style>
@endpush
@section('content')

    {!! Form::open(['method' => 'POST', 'route' => ['admin.tests.store']]) !!}

    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0">@lang('labels.backend.tests.create')</h3>
            <div class="float-right">
                <a href="{{ route('admin.tests.index') }}"
                   class="btn btn-success">@lang('labels.backend.tests.view')</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-3 form-group">
                    {!! Form::label('course_id', trans('labels.backend.tests.fields.course'), ['class' => 'control-label']) !!}
                    {!! Form::select('course_id', $courses, old('course_id'), ['class' => 'form-control select2']) !!}
                </div>
                <div class="col-12 col-lg-3 form-group">
                    {!! Form::label('lesson_id', trans('labels.backend.tests.fields.lesson'), ['class' => 'control-label']) !!}
                    {!! Form::select('lesson_id', $lessons, old('lesson_id'), ['class' => 'form-control select2']) !!}
                </div>

                <div class="col-12 col-lg-3  form-group">
                    {!! Form::label('title',trans('labels.backend.tests.fields.title'), ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.tests.fields.title')]) !!}

                </div>
                <div class="col-12 col-lg-3 form-group">
                    {!! Form::label('retest_number',trans('labels.backend.tests.fields.retest_number'), ['class' => 'control-label']) !!}
                    {!! Form::number('retest_number', old('retest_number'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.tests.fields.retest_number')]) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-12 form-group">
                    {!! Form::label('description',trans('labels.backend.tests.fields.description'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => trans('labels.backend.tests.fields.description')]) !!}
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-4 form-group">
                    {!! Form::label('passing_score',trans('labels.backend.tests.fields.score_field'), ['class' => 'control-label']) !!}
                    {!! Form::text('passing_score', old('passing_score'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.tests.fields.score_field_placeholder')]) !!}
                </div> --}}
                <div class="col-4 form-group">
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, false, []) !!}
                    {!! Form::label('published', trans('labels.backend.tests.fields.published'), ['class' => 'control-label font-weight-bold']) !!}

                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('strings.backend.general.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


