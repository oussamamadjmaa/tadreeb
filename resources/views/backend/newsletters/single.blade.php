@extends('backend.layouts.app')
@section('title', __('global.Newletter Subscribers').' | '.app_name())
@push('after-styles')
    <link rel="stylesheet" href="{{asset('assets/css/colors/switch.css')}}">
@endpush
@section('content')

<form method="POST" action="{{route('admin.newsletters.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMsgModalLabel">{{__('global.Single Message')}}</h5>
                    <div class="Pull-right">
                        <a href="{{route('admin.newsletters.index')}}" class="btn btn-success">{{__('global.back')}}</a>

                    </div>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">{{__('global.subject')}}:</label>
                            <input type="text" name="subject" class="form-control" placeholder="{{__('global.subject')}}" value="{{old('subject') ?? ''}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{$email}}" name="email">
                            <label for="message-text" class="col-form-label">{{__('global.message')}}:</label>
                            <textarea name="message_text" class="form-control" rows="12" cols="6" id="message-text">{{old('message_text') ?? ''}}</textarea>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="{{route('admin.newsletters.index')}}">{{__('global.cancel')}}</a>
                    <button type="submit" class="btn btn-primary mr-1 SendMsg">{{__('global.send')}}</button>
                </div>
            </div>
        </div></form>
@endsection