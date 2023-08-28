@extends('backend.layouts.app')

@section('title', __('labels.backend.accreditation-bodies.title').' | '.app_name())

@section('content')
    {{ html()->form('POST', route('admin.accreditation-bodies.store'))->acceptsFiles()->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">@lang('labels.backend.accreditation-bodies.create')</h3>
            <div class="float-right">
                <a href="{{ route('admin.accreditation-bodies.index') }}"
                   class="btn btn-success">@lang('labels.backend.accreditation-bodies.view')</a>
            </div>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{route('admin.accreditation-bodies.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                           <label for="avatar">الصورة الرمزية الموقع</label>
                        </div>
                        <!--form-group-->
                        <div class="form-group hidden" id="avatar_location">
                            <input class="form-control" type="file" name="avatar_location" id="avatar_location">
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>
                <!--row-->

                <div class="row">
                    <div class="col-12">
                        <h5>{{ __('validation.attributes.frontend.personal_information') }} : </h5>
                        <hr>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="firstName" class="required"> {{__('labels.backend.accreditation-bodies.fields.first_name')}} </label>
                            <input id="firstName" class="form-control" type="text" name="first_name" value="{{old('first_name') ?? ''}}" placeholder="{{__('labels.backend.accreditation-bodies.fields.first_name')}}" maxlength="191" autofocus="on" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="last_name"> {{__('labels.backend.accreditation-bodies.fields.last_name')}} </label>
                            <input id="last_name" class="form-control" type="text" name="last_name" value="{{old('last_name') ?? ''}}" placeholder="{{__('labels.backend.accreditation-bodies.fields.last_name')}}" maxlength="191" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email"> {{__('labels.backend.accreditation-bodies.fields.email')}} </label>
                            <input id="email" class="form-control" type="email" name="email" value="{{old('email') ?? ''}}" placeholder="{{__('labels.backend.accreditation-bodies.fields.email')}}" maxlength="191" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group-phone">
                            <label for="phone"> {{__('validation.attributes.frontend.phone')}} </label>
                            <input id="phone" class="form-control" type="text" name="phone" value="{{old('phone') ?? ''}}" placeholder="" maxlength="191" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="country"> {{__('labels.backend.general_settings.user_registration_settings.fields.country')}} </label>
                            <input id="country" class="form-control" type="text" name="country" value="{{old('country') ?? ''}}" placeholder="{{__('labels.backend.general_settings.user_registration_settings.fields.country')}}" maxlength="191" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="password"> {{__('labels.backend.accreditation-bodies.fields.password')}} </label>
                            <input id="password" class="form-control" type="password" name="password" value="{{old('password') ?? ''}}" placeholder="{{__('labels.backend.accreditation-bodies.fields.password')}}" maxlength="191" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                        <h5>{{__('validation.attributes.frontend.social_information')}} :</h5>
                        <hr>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="facebook"> {{__('labels.teacher.facebook_link')}} </label>
                            <input id="facebook" class="form-control" type="text" name="facebook_link" value="{{old('facebook_link') ?? ''}}" placeholder="{{__('labels.teacher.facebook_link')}}" maxlength="191" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="twitter"> {{__('labels.teacher.twitter_link')}} </label>
                            <input id="twitter" class="form-control" type="text" name="twitter_link" value="{{old('twitter_link') ?? ''}}" placeholder="{{__('labels.teacher.twitter_link')}}" maxlength="191" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="linkedin"> {{__('labels.teacher.linkedin_link')}} </label>
                            <input id="linkedin" class="form-control" type="text" name="linkedin_link" value="{{old('linkedin_link') ?? ''}}" placeholder="{{__('labels.teacher.linkedin_link')}}" maxlength="191" autocomplete="off">
                        </div>
                    </div>
                    {{-- <div class="col-3">
                        <div class="form-group">
                            <label for="instagram"> حساب انستجرام </label>
                            <input id="instagram" class="form-control" type="text" name="instagram" value="#" placeholder="حساب انستجرام" maxlength="191" autocomplete="off">
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <hr>
                        <h5>{{ __('validation.attributes.frontend.payment_information') }} : </h5>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            {{ html()->label(__('labels.teacher.payment_details'))->class('col-md-2 form-control-label')->for('payment_details') }}
                            <div class="col-md-10">
                                <select class="form-control" name="payment_method" id="payment_method" required>
                                    <option value="bank" {{ old('payment_method') == 'bank'?'selected':'' }}>{{ trans('labels.teacher.bank') }}</option>
                                    <option value="paypal" {{ old('payment_method') == 'paypal'?'selected':'' }}>{{ trans('labels.teacher.paypal') }}</option>
                                </select>
                            </div>
    
                        </div>
    
                        <div class="bank_details" >
                            <div class="form-group row">
                                {{ html()->label(__('labels.teacher.bank_details.name'))->class('col-md-2 form-control-label')->for('bank_name') }}
                                <div class="col-md-10">
                                    {{ html()->text('bank_name')
                                            ->class('form-control')
                                            ->placeholder(__('labels.teacher.bank_details.name')) }}
                                </div><!--col-->
                            </div>
    
                            <div class="form-group row">
                                {{ html()->label(__('labels.teacher.bank_details.bank_code'))->class('col-md-2 form-control-label')->for('ifsc_code') }}
                                <div class="col-md-10">
                                    {{ html()->text('ifsc_code')
                                            ->class('form-control')
                                            ->placeholder(__('labels.teacher.bank_details.bank_code')) }}
                                </div><!--col-->
                            </div>
    
                            <div class="form-group row">
                                {{ html()->label(__('labels.teacher.bank_details.account'))->class('col-md-2 form-control-label')->for('account_number') }}
                                <div class="col-md-10">
                                    {{ html()->text('account_number')
                                            ->class('form-control')
                                            ->placeholder(__('labels.teacher.bank_details.account')) }}
                                </div><!--col-->
                            </div>
    
                            <div class="form-group row">
                                {{ html()->label(__('labels.teacher.bank_details.holder_name'))->class('col-md-2 form-control-label')->for('account_name') }}
                                <div class="col-md-10">
                                    {{ html()->text('account_name')
                                            ->class('form-control')
                                            ->placeholder(__('labels.teacher.bank_details.holder_name')) }}
                                </div><!--col-->
                            </div>
                        </div>
    
                        <div class="paypal_details">
                            <div class="form-group row">
                                {{ html()->label(__('labels.teacher.paypal_email'))->class('col-md-2 form-control-label')->for('paypal_email') }}
                                <div class="col-md-10">
                                    {{ html()->text('paypal_email')
                                            ->class('form-control')
                                            ->placeholder(__('labels.teacher.paypal_email')) }}
                                </div><!--col-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('labels.backend.accreditation-bodies.fields.status'))->class('col-md-2 form-control-label')->for('active') }}
                            <div class="col-md-10">
                                {{ html()->label(html()->checkbox('')->name('active')
                                            ->checked((old('active') == 1) ? true : false)->class('switch-input')->value((old('active') == 1) ? 1 : 0)
    
                                        . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                    ->class('switch switch-lg switch-3d switch-primary')
                                }}
                            </div>
    
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>
                <!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-0 clearfix">
                            {{ form_cancel(route('admin.accreditation-bodies.index'), __('buttons.general.cancel')) }}
                            {{ form_submit(__('buttons.general.crud.create')) }}
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>
                <!--row-->
            </form>
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
@push('after-scripts')
<script>
    @if(old('payment_method') && old('payment_method') == 'bank')
    $('.paypal_details').hide();
    $('.bank_details').show();
    @elseif(old('payment_method') && old('payment_method') == 'paypal')
    $('.paypal_details').show();
    $('.bank_details').hide();
    @else
    $('.paypal_details').hide();
    @endif
    $(document).on('change', '#payment_method', function(){
        if($(this).val() === 'bank'){
            $('.paypal_details').hide();
            $('.bank_details').show();
        }else{
            $('.paypal_details').show();
            $('.bank_details').hide();
        }
    });
</script>
@endpush
