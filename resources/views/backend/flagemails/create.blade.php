@extends('backend.layouts.app')
@section('title', __('global.flagemail.title').' | '.app_name())
@push('after-styles')
<link rel="stylesheet" href="{{asset('assets/css/colors/switch.css')}}">
@endpush
@section('content')

<form method="POST" action="{{route('admin.flagemails.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="sendMsgModalLabel">{{request()->has('email') ? __('global.Single Message') : __('global.Course Message') }}</h5>
            <div class="Pull-right">
                <a href="{{route('admin.flagemails.index')}}" class="btn btn-success">{{__('global.back')}}</a>

            </div>
        </div>
        <div class="modal-body">


            <div class="form-group">
                <label for="course_title" class="col-form-label">{{__('labels.backend.courses.fields.title')}} : </label>
                <label for="course" class="col-form-label">{{$course->title}}</label>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">{{__('global.subject')}}:</label>
                <input type="text" name="subject" class="form-control" placeholder="{{__('global.subject')}}">
            </div>
            <div class="form-group">
                <input type="hidden" value="{{$course->id}}" name="course_id">
                @if (request()->has('email'))
                    <input type="hidden" value="{{request()->get('email')}}" name="email">
                @endif
                <label for="message-text" class="col-form-label">{{__('global.message')}}:</label>
                <textarea name="message_text" class="form-control" rows="12" cols="6" id="message-text"></textarea>
            </div>

        </div>
        <div class="modal-footer">
            <a class="btn btn-danger" href="{{route('admin.flagemails.index')}}">{{__('global.cancel')}}</a>
                    <button type="submit" class="btn btn-primary mr-1 SendMsg">{{__('global.send')}}</button>
        </div>
    </div>
</form>

@endsection