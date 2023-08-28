@extends($path.'.layouts.app'.config('theme_layout'))
@section('title', trans('labels.frontend.training_needs').' | '. app_name() )

@section('content')

    <!-- Start of breadcrumb section
        ============================================= -->
    <section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
        <div class="blakish-overlay"></div>
        <div class="container">
            <div class="page-breadcrumb-content text-center">
                <div class="page-breadcrumb-title">
                    <h2 class="breadcrumb-head black bold">
                        <span>@lang('labels.frontend.training_needs')</span>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End of breadcrumb section
        ============================================= -->

        <section id="training-page" class="training-page-section pb-0 " style="background-color: #f7f7f7;padding: 110px 0px;">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card  border-0">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list-inline list-style-none">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
    
                                {{ html()->form('POST', route('frontend.user.training'))->acceptsFiles()->class('form-horizontal')->open() }}
                                {!! csrf_field() !!}
    
                                <div class="row">
                                        <div class="col-12">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.suggested.title'))->for('title') }}
    
                                            {{ html()->text('title')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.suggested.title'))
                                                ->attribute('maxlength', 191)
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.suggested.category'))->for('category') }}
    
                                            {{ html()->select('category', $categories)
                                                ->class('form-control')
                                                ->required() }}
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.suggested.course_field'))->for('course_field') }}
    
                                            {{ html()->text('course_field')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.suggested.course_field'))
                                                ->attribute('maxlength', 191)
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.suggested.course_topics'))->for('course_topics') }}
    
                                            {{ html()->text('course_topics')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.suggested.course_topics'))
                                                ->attribute('maxlength', 191)
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
    
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.suggested.idea'))->for('idea') }}
    
                                            {{ html()->textarea('idea')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.suggested.idea'))
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
    
                                </div><!--row-->
    
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-0 text-center mt-4 clearfix">
                                            <button class="btn btn-info mx-auto btn-lg" type="submit">{{__('labels.frontend.send')}}</button>
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->
                                {{ html()->form()->close() }}
                            </div><!-- card-body -->
                        </div><!-- card -->
                    </div>
                </div><!-- row -->
            </div>
        </section>
    

@endsection
