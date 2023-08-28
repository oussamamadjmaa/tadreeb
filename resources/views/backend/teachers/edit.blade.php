@extends('backend.layouts.app')
@section('title', __('labels.backend.teachers.title').' | '.app_name())

@section('content')
<div class="row justify-content-center align-items-center mb-3">
    <div class="col col-sm-12 align-self-center">
        <div class="card">
            <div class="card-header">
                <h3 class="page-title d-inline">@lang('labels.backend.teachers.edit')</h3>
                <div class="float-right">
                    <a href="{{ route('admin.teachers.index') }}"
                       class="btn btn-success">@lang('labels.backend.teachers.view')</a>
                </div>
            </div>

            <div class="card-body">
                <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#edit" class="nav-link active show" aria-controls="edit" role="tab" data-toggle="tab" aria-selected="true">{{__('labels.frontend.user.profile.update_information')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#password" class="nav-link" aria-controls="password" role="tab" data-toggle="tab" aria-selected="false">{{__('buttons.backend.access.users.change_password')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade pt-3 active show" id="edit" aria-labelledby="edit-tab">
                            <form class="form-horizontal" method="POST" action="{{route('admin.teachers.update', $teacher->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                           <label for="avatar">{{__('validation.attributes.frontend.avatar')}}</label>
                                            <div>
                                                <img height="50px" src="{{$teacher->picture}}" class="mt-1">
                                            </div>
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
                                            <label for="firstName" class="required"> {{__('labels.backend.teachers.fields.first_name')}} </label>
                                            <input id="firstName" class="form-control" type="text" name="first_name" value="{{old('first_name') ?? $teacher->first_name}}" placeholder="{{__('labels.backend.teachers.fields.first_name')}}" maxlength="191" autofocus="on" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="last_name"> {{__('labels.backend.teachers.fields.last_name')}} </label>
                                            <input id="last_name" class="form-control" type="text" name="last_name" value="{{old('last_name') ?? $teacher->last_name}}" placeholder="{{__('labels.backend.teachers.fields.last_name')}}" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="academicRank"> {{__('global.academic_degree.title')}} </label>
                                            <select id="academicRank" class="form-control" name="academic_rank" autocomplete="off">
                                                <option value=""> {{__('global.academic_degree.title')}} </option>
                                                @foreach (config('academic_degrees.list') as $degree)
                                                    <option {{((old('academic_rank') ?? $teacher->academic_rank ?? '') == $degree) ? 'selected' : ''}} value="{{$degree}}"> {{__('global.academic_degree.'.$degree)}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group-phone">
                                            <label for="phone"> {{__('validation.attributes.frontend.phone')}} </label>
                                            <input id="phone" class="form-control" type="text" name="phone" value="{{old('phone') ?? $teacher->phone}}" placeholder="" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="gender"> {{__('labels.backend.general_settings.user_registration_settings.fields.gender')}} </label>
                                            <select id="gender" class="form-control" name="gender" autocomplete="off">
                                                <option value="male" {{((old('gender') ?? $teacher->gender ?? '') == 'male') ? 'selected' : ''}}> {{__('validation.attributes.frontend.male')}} </option>
                                                <option value="female" {{((old('gender') ?? $teacher->gender ?? '') == 'female') ? 'selected' : ''}}> {{__('validation.attributes.frontend.female')}} </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nationality"> الجنسية </label>
                                            <input id="nationality" class="form-control" type="text" name="nationality" value="{{old('nationality') ?? $teacher->nationality}}" placeholder="الجنسية" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="country"> {{__('labels.backend.general_settings.user_registration_settings.fields.country')}} </label>
                                            <input id="country" class="form-control" type="text" name="country" value="{{old('country') ?? $teacher->country}}" placeholder="{{__('labels.backend.general_settings.user_registration_settings.fields.country')}}" maxlength="191" autocomplete="off">
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
                                            <input id="facebook" class="form-control" type="text" name="facebook_link" value="{{old('facebook_link') ?? $teacher->teacherProfile->facebook_link}}" placeholder="{{__('labels.teacher.facebook_link')}}" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="twitter"> {{__('labels.teacher.twitter_link')}} </label>
                                            <input id="twitter" class="form-control" type="text" name="twitter_link" value="{{old('twitter_link') ?? $teacher->teacherProfile->twitter_link}}" placeholder="{{__('labels.teacher.twitter_link')}}" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="linkedin"> {{__('labels.teacher.linkedin_link')}} </label>
                                            <input id="linkedin" class="form-control" type="text" name="linkedin_link" value="{{old('linkedin_link') ?? $teacher->teacherProfile->linkedin_link}}" placeholder="{{__('labels.teacher.linkedin_link')}}" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    {{-- <div class="col-3">
                                        <div class="form-group">
                                            <label for="instagram"> حساب انستجرام </label>
                                            <input id="instagram" class="form-control" type="text" name="instagram" value="#" placeholder="حساب انستجرام" maxlength="191" autocomplete="off">
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <h5>المرفقات : </h5>
                                        <hr>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="passport_photo"> صورة من جواز السفر </label>
                                            <input id="passport_photo" class="form-control" type="file" name="passport_photo" placeholder="صورة من جواز السفر">
                                            @if (@$teacher->docs->passport_photo)
                                            <a href="{{$teacher->docs->passport_photo ?? ''}}" target="_blank" class="btn btn-success btn-block mt-4">
                                                إظهار
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="academic_degree_photo"> صورة من آخر مؤهل علمي </label>
                                            <input id="academic_degree_photo" class="form-control" type="file" name="academic_degree_photo" placeholder="صورة من آخر مؤهل علمي">
                                            @if (@$teacher->docs->academic_degree_photo)
                                                <a href="{{$teacher->docs->academic_degree_photo ?? ''}}" target="_blank" class="btn btn-success btn-block mt-4">
                                                    إظهار
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="cv"> إرفاق السيرة الذاتية </label>
                                            <input id="cv" class="form-control" type="file" name="cv" accept="application/pdf" placeholder="إرفاق السيرة الذاتية">
                                            @if (@$teacher->docs->cv)
                                            <a href="{{$teacher->docs->cv ?? ''}}" target="_blank" class="btn btn-success btn-block mt-4">
                                                إظهار
                                            </a>
                                            @endif
                                        </div>
                                    </div>
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
                                                    <option value="bank" {{ $teacher->teacherProfile->payment_method == 'bank'?'selected':'' }}>{{ trans('labels.teacher.bank') }}</option>
                                                    <option value="paypal" {{ $teacher->teacherProfile->payment_method == 'paypal'?'selected':'' }}>{{ trans('labels.teacher.paypal') }}</option>
                                                </select>
                                            </div>
                    
                                        </div>
                    
                                        <div class="bank_details" style="display:{{ $teacher->teacherProfile->payment_method == 'bank'?'':'none' }}">
                                            <div class="form-group row">
                                                {{ html()->label(__('labels.teacher.bank_details.name'))->class('col-md-2 form-control-label')->for('bank_name') }}
                                                <div class="col-md-10">
                                                    {{ html()->text('bank_name')
                                                            ->class('form-control')
                                                            ->value($payment_details->bank_name ?? '')
                                                            ->placeholder(__('labels.teacher.bank_details.name')) }}
                                                </div><!--col-->
                                            </div>
                    
                                            <div class="form-group row">
                                                {{ html()->label(__('labels.teacher.bank_details.bank_code'))->class('col-md-2 form-control-label')->for('ifsc_code') }}
                                                <div class="col-md-10">
                                                    {{ html()->text('ifsc_code')
                                                            ->class('form-control')
                                                            ->value($payment_details->ifsc_code ?? '')
                                                            ->placeholder(__('labels.teacher.bank_details.bank_code')) }}
                                                </div><!--col-->
                                            </div>
                    
                                            <div class="form-group row">
                                                {{ html()->label(__('labels.teacher.bank_details.account'))->class('col-md-2 form-control-label')->for('account_number') }}
                                                <div class="col-md-10">
                                                    {{ html()->text('account_number')
                                                            ->class('form-control')
                                                            ->value($payment_details->account_number ?? '')
                                                            ->placeholder(__('labels.teacher.bank_details.account')) }}
                                                </div><!--col-->
                                            </div>
                    
                                            <div class="form-group row">
                                                {{ html()->label(__('labels.teacher.bank_details.holder_name'))->class('col-md-2 form-control-label')->for('account_name') }}
                                                <div class="col-md-10">
                                                    {{ html()->text('account_name')
                                                            ->class('form-control')
                                                            ->value($payment_details->account_name ?? '')
                                                            ->placeholder(__('labels.teacher.bank_details.holder_name')) }}
                                                </div><!--col-->
                                            </div>
                                        </div>
                    
                                        <div class="paypal_details" style="display:{{ $teacher->teacherProfile->payment_method == 'paypal'?'':'none' }}">
                                            <div class="form-group row">
                                                {{ html()->label(__('labels.teacher.paypal_email'))->class('col-md-2 form-control-label')->for('paypal_email') }}
                                                <div class="col-md-10">
                                                    {{ html()->text('paypal_email')
                                                            ->class('form-control')
                                                            ->value($payment_details->paypal_email ?? '')
                                                            ->placeholder(__('labels.teacher.paypal_email')) }}
                                                </div><!--col-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            {{ html()->label(__('labels.backend.teachers.fields.status'))->class('col-md-2 form-control-label')->for('active') }}
                                            <div class="col-md-10">
                                                {{ html()->label(html()->checkbox('')->name('active')
                                                            ->checked(($teacher->active == 1) ? true : false)->class('switch-input')->value(($teacher->active == 1) ? 1 : 0)
                    
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
                                            {{ form_cancel(route('admin.teachers.index'), __('buttons.general.cancel')) }}
                                            {{ form_submit(__('buttons.general.crud.update')) }}
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <!--col-->
                                </div>
                                <!--row-->
                            </form>

                        </div>
                        <!--tab panel profile-->

                        <div role="tabpanel" class="tab-pane fade pt-3" id="password" aria-labelledby="password-tab">
                            <form class="form-horizontal" method="POST" action="{{route('admin.teachers.update', $teacher->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password">{{__('validation.attributes.frontend.password')}}</label>

                                            <input class="form-control" type="password" name="password" id="password" placeholder="{{__('validation.attributes.frontend.password')}}" required="">
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <!--col-->
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-0 clearfix">
                                            {{ form_cancel(route('admin.teachers.index'), __('buttons.general.cancel')) }}
                                            {{ form_submit(__('buttons.general.crud.update')) }}
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <!--col-->
                                </div>
                                <!--row-->
                            </form>
                        </div>
                        <!--tab panel change password-->
                    </div>
                    <!--tab content-->
                </div>
                <!--tab panel-->
            </div>
            <!--card body-->
        </div><!-- card -->
    </div><!-- col-xs-12 -->
</div>
@endsection
@push('after-scripts')
<script>
    $(document).on('change', '#payment_method', function() {
        if ($(this).val() === 'bank') {
            $('.paypal_details').hide();
            $('.bank_details').show();
        } else {
            $('.paypal_details').show();
            $('.bank_details').hide();
        }
    });
</script>

@endpush