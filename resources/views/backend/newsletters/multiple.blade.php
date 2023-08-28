@extends('backend.layouts.app')
@section('title', __('global.Newletter Subscribers').' | '.app_name())
@push('after-styles')
<link rel="stylesheet" href="{{asset('assets/css/colors/switch.css')}}">
@endpush
@section('content')
<form method="POST" action="{{route('admin.newsletters.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-lg-4">
            <div class="form-group">
                <label>
                    <small>
                        @lang('global.select mail or group')
                    </small>
                </label>
                <select name="emails[]" id="emails" multiple class="form-control" style="height:545px">
                    @foreach ($emails as $email)
                        <option value="{{$email->id}}" @if (in_array($email->id, old('emails') ?? []))
                            selected
                        @endif>{{$email->email}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-lg-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMsgModalLabel">{{__('global.Group Message')}}</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('global.subject')}}:</label>
                        <input type="text" name="subject" class="form-control" placeholder="{{__('global.subject')}}" value="{{old('subject') ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('global.message')}}:</label>
                        <textarea name="message_text" class="form-control" rows="12" cols="6" id="message-text">{{old('message_text') ?? ''}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="{{route('admin.newsletters.index')}}">{{__('global.cancel')}}</a>
                    <button type="submit" class="btn btn-primary mr-1 SendMsg">{{__('global.send')}}</button>
                </div>
            </div>

        </div>

    </div>
</form>
@endsection