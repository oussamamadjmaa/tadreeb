<!DOCTYPE html>
@php
    $footer_data = json_decode(config('footer_data'));
@endphp
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', '')">
        <meta name="keywords" content="@yield('meta_keywords', '')">


    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->

        <link rel="stylesheet" href="{{asset($assetsPath.'/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/fontawesome-all.css')}}">
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/flaticon.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset($assetsPath.'/css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/video.min.css')}}">
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/lightbox.css')}}">
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/progess.css')}}">
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-rtl/css/slider.css')}}">

        
        @langrtl
        {{--<link rel="stylesheet" href="{{ asset('css/frontend-rtl.css') }}">--}}
        @else
        <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
        @endlangrtl
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/style.css')}}">
        <link rel="stylesheet" href="{{asset($assetsPath.'/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/colors/switch.css')}}">
        <link href="{{asset('assets/css/colors/color-2.css')}}" rel="alternate stylesheet" type="text/css"
              title="color-2">
        <link href="{{asset('assets/css/colors/color-3.css')}}" rel="alternate stylesheet" type="text/css"
              title="color-3">
        <link href="{{asset('assets/css/colors/color-4.css')}}" rel="alternate stylesheet" type="text/css"
              title="color-4">
        <link href="{{asset('assets/css/colors/color-5.css')}}" rel="alternate stylesheet" type="text/css"
              title="color-5">
        <link href="{{asset('assets/css/colors/color-6.css')}}" rel="alternate stylesheet" type="text/css"
              title="color-6">
        <link href="{{asset('assets/css/colors/color-7.css')}}" rel="alternate stylesheet" type="text/css"
              title="color-7">
        <link href="{{asset('assets/css/colors/color-8.css')}}" rel="alternate stylesheet" type="text/css"
              title="color-8">
        <link href="{{asset('assets/css/colors/color-9.css')}}" rel="alternate stylesheet" type="text/css"
              title="color-9">
              <style>
              .bg-image:after {
                  opacity:1;
                  background:#00000080;
              }
                .header-top {
                    background:#000;
                }
                .bg-theme-color{
                    background-color: #ff3333;
                    background:#ff3333;
                    color: white;
                }
                
                .latest-news-area .date-meta, .course-title:after, .widget-title:after {
                   background-color: #ff3333;
                    background:#ff3333; 
                }
                
                .bg-theme-color:hover, .genius-btn:hover, .subs-form .nws-button:hover{
                    background-color: #ff333360;
                    background:#ff3333;
                }
                .theme-color, .main-text, .select-lang select, .nav-menu-4 .login-cart-lang .login a, .course-meta .course-category, .latest-events .course-meta .course-author, .about-teacher-2 .section-title-2 h2 b, .testimonial-slide .student-name-designation span, .view-all-btn i, .teacher-img-content .teacher-category .st-name, .secound-teacher-section .teacher-img-text .teacher-designation, .teacher-pic-content .teacher-social-name li, .teacher-pic-content .teacher-name-designation .teacher-designation, .teacher-details-text .teacher-deg span, .best-product-section .price-start span, .best-sellers-pic-text .b-price, .panel-group .panel-title .btn-link, .panel-group .panel-title .btn-link:before, .panel-group .panel-title .btn-link:after, .panel-group .panel-title .btn-link:hover, .version-four .features-icon .feat-tag span, .blog-details-content .date-meta span, .blog-details-content .author-comment .author-designation-comment span, .blog-details-content .next-prev-post i, .blog-comment-area .author-name-rate span, .affiliate-market-accordion .panel-group .panel-title .btn-link span, .course-by b, .avrg-rating .avrg-rate, .course-side-bar-widget h3 span, .course-side-bar-widget h3 span, .student-number, .checkbox label .sub-text b, .terms-text b, .purchase-list .in-total span, .footer-menu li i{
                    color: #ff3333!important;
                }
                 .textZoom{
                     color: #ff3333;
                     transition: all .2s ease-in-out;
                 }
                .textZoom:hover{
                    transform: scale(1.3);
                    border: 0;
                }
                .card-info {
                    color: black;
                    font-weight: bold;
                    font-size: 0.9em;
                    /*font-size: 1vw;*/
                }
                .modal-dialog {
        margin: 1.75em auto;
        min-height: calc(100vh - 60px);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .copy-right-menu {
        background:#000!important;
    }

    #myModal .close {
        position: absolute;
        right: 0.3rem;
    }

    .g-recaptcha div {
        margin: auto;
    }

    .modal-body .contact_form input[type='radio'] {
        width: auto;
        height: auto;
    }
    .modal-body .contact_form textarea{
        background-color: #eeeeee;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 10px;
        width: 100%;
        border: none
    }
    .iti--allow-dropdown{
        direction:ltr;
    }

    .iti {
        /*position: unset;*/
        display: block !important;
    }
    .input-group-phone {
    position: relative;
    display: unset;
    }

    @media (max-width: 768px) {
        .modal-dialog {
            min-height: calc(100vh - 20px);
        }

        #myModal .modal-body {
            padding: 15px;
        }
    }
            </style>
        <link href="{{asset('assets/build/css/intlTelInput.css')}}" rel="stylesheet">
        <link href="{{asset('/vendor/unisharp/laravel-ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css') }}" rel="stylesheet">
        <script src="{{asset('/vendor/unisharp/laravel-ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
        <script>hljs.initHighlightingOnLoad();</script>
        <style>
            .iti {
                display: block;
            }
            .iti--allow-dropdown {
                direction: ltr;
            }
        </style>
    @stack('after-styles')
    @yield('css')
    @if(config('onesignal_status') == 1)
        {!! config('onesignal_data') !!}
    @endif

    @if(config('google_analytics_id') != "")

        <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{config('google_analytics_id')}}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }

                gtag('js', new Date());

                gtag('config', '{{config('google_analytics_id')}}');
            </script>
        @endif
        @if(!empty(config('custom_css')))
            <style>
                {!! config('custom_css')  !!}
            </style>
        @endif

    </head>
    <body class="{{config('layout_type')}}">
    <div id="app">

    {{--<div id="preloader"></div>--}}
    @include('frontend.layouts.modals.loginModal')


    <!-- Start of Header section
    ============================================= -->
        <header>
            <div id="main-menu" class="main-menu-container header-style-2">
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="footer-social ul-li"> 
                                   <ul>
                                    @if ($footer_data != "")
                                        @if((count($footer_data->social_links->links) > 0))
                                            @foreach($footer_data->social_links->links as $item)
                                                <li style="padding:0;"><a href="{{$item->link}}"><i class="{{$item->icon}}"></i></a></li>
                                            @endforeach
                                        @endif
                                    @endif
                                      
                                  </ul>
                               </div>
                          </div>
                            <div class="col-md-6">
                                <div class="header-top-bar ul-li float-right">
                                    <ul class="d-inline-block w-100">
                                        @if(count($locales) > 1)

                                            <li class="menu-item-has-children ul-li-block">
                                                <a href="#">
                                                    <span class="d-md-down-none">@lang('menus.language-picker.language')
                                                        ({{ strtoupper(app()->getLocale()) }})</span>
                                                </a>
                                                <ul class="sub-menu bg-white" style="z-index: 1">
                                                    @foreach($locales as $lang)
                                                        @if($lang != app()->getLocale())
                                                            <li class="border-0 border-bottom">
                                                                <a href="{{ '/lang/'.$lang }}"
                                                                   class=""> @lang('menus.language-picker.langs.'.$lang)</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                @guest
                                <div class="header-top-bar ul-li float-right">
                                    <a id="openLoginModal" data-target="#myModal" class="btn bg-theme-color mr-1 go-register" href="#" style="color:#FFF;">&#xFEFF;{{trans('labels.frontend.modal.register_now')}}</a>
                                    <a id="openLoginModal" data-target="#myModal" class="btn btn-dark go-login" href="#" style="color:#FFF;">{{__('navs.frontend.login')}}</a>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-menu">
                    <div class="container">
                        <div class="navbar-default">
                            <div class="navbar-header float-left">
                                <a class="navbar-brand text-uppercase" href="{{url('/')}}"><img
                                            src="{{asset("storage/logos/".config('logo_b_image'))}}" alt="logo"></a>
                            </div><!-- /.navbar-header -->
                            <div class="cart-search float-right ul-li">
                                <ul>
                                    <li>
                                        <button type="button" class="toggle-overlay search-btn">

                                            <a href="{{route('cart.index')}}"><i class="fas fa-shopping-bag"></i>
                                                @if(auth()->check() && Cart::session(auth()->user()->id)->getTotalQuantity() != 0)
                                                    <span class="badge badge-danger position-absolute">{{Cart::session(auth()->user()->id)->getTotalQuantity()}}</span>
                                                @endif
                                            </a>
                                        </button>

                                    </li>
                                </ul>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <nav class="navbar-menu float-right">
                                <div class="nav-menu ul-li">
                                    <ul>
                                        @if(count($custom_menus) > 0 )
                                            @foreach($custom_menus as $menu)
                                                @if($menu['id'] == $menu['parent'])
                                                    @if($menu->link == "courses")
                                                        <li class="menu-item-has-children ul-li-block">
                                                            <a href="#!">{{trans('custom-menu.'.$menu_name.'.'.str_slug($menu->label))}}</a>
                                                            <ul class="sub-menu">
                                                                @foreach(\App\Models\Category::all() as $item)
                                                                    <li>
                                                                        <a class="" id="menu-{{$item->id}}" href="{{route('courses.category', $item->slug)}}">{{$item->name}}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @elseif(count($menu->subs) == 0)
                                                        <li class="nav-item">
                                                            <a href="{{asset($menu->link)}}"
                                                               class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}"
                                                               id="menu-{{$menu->id}}">{{trans('custom-menu.'.$menu_name.'.'.str_slug($menu->label))}}</a>
                                                        </li>
                                                    @else
                                                        <li class="menu-item-has-children ul-li-block">
                                                            <a href="#!">{{trans('custom-menu.'.$menu_name.'.'.str_slug($menu->label))}}</a>
                                                            <ul class="sub-menu">
                                                                @foreach($menu->subs as $item)
                                                                    @include('frontend.layouts.partials.dropdown', $item)
                                                                @endforeach
                                                            </ul>
                                                        </li>

                                                    @endif

                                                @endif
                                            @endforeach
                                        @endif

                                        @if(auth()->check())
                                            @if($logged_in_user->hasRole('student'))
                                                <li class="">
                                                    <a href="{{ route('admin.dashboard') }}">@lang('navs.frontend.dashboard')</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('frontend.auth.logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                                                </li>
                                            @else
                                            <li class="menu-item-has-children ul-li-block">
                                                <a href="#!">{{ $logged_in_user->name }}</a>
                                                <ul class="sub-menu">
                                                    @can('view backend')
                                                        <li>
                                                            <a href="{{ route('admin.dashboard') }}">@lang('navs.frontend.dashboard')</a>
                                                        </li>
                                                    @endcan


                                                    <li>
                                                        <a href="{{ route('frontend.auth.logout') }}">@lang('navs.general.logout')</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endif
                                        @else
                                            <li class="log-in mt-0">
                                                @if(!auth()->check())
                                                    <a id="openLoginModal" data-target="#myModal"
                                                       href="#">@lang('navs.general.login')</a>
                                                    <!-- The Modal -->
                                                    {{--@include('frontend.layouts.modals.loginModal')--}}

                                                @endif
                                            </li>
                                            <li class="menu-item-has-children ul-li-block">
                                                <a href="#!">{{__('custom-menu.nav-menu.joinus')}}</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a class="" id="menu-10" href="{{route('frontend.auth.teacher.register')}}">{{__('custom-menu.nav-menu.trainers_join')}}</a>
                                                    </li>
                                                    <li>
                                                        <a class="" id="menu-11" href="{{route('frontend.auth.accreditation-body.register')}}">{{__('custom-menu.nav-menu.centers_join')}}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            </nav>

                            <div class="mobile-menu">
                                <div class="logo"><a href="{{url('/')}}"><img
                                                src="{{asset('assets/img/logo/logo.png')}}" alt="Logo"></a></div>
                                <nav>
                                    <ul>
                                        @if(count($custom_menus) > 0 )
                                            @foreach($custom_menus as $menu)
                                                @if($menu['id'] == $menu['parent'])
                                                    @if(count($menu->subs) == 0)

                                                        <li class="">
                                                            <a href="{{asset($menu->link)}}"
                                                               class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}"
                                                               id="menu-{{$menu->id}}">{{trans('custom-menu.'.$menu_name.'.'.str_slug($menu->label))}}</a>
                                                        </li>
                                                    @else
                                                        <li class="">
                                                            <a href="#!">{{trans('custom-menu.'.$menu_name.'.'.str_slug($menu->label))}}</a>
                                                            <ul class="">
                                                                @foreach($menu->subs as $item)
                                                                    @include('frontend.layouts.partials.dropdown', $item)
                                                                @endforeach
                                                            </ul>
                                                        </li>

                                                    @endif

                                                @endif
                                            @endforeach
                                        @endif

                                        @if(auth()->check())
                                            <li class="">
                                                <a class="text-dark" href="#!">{{ $logged_in_user->name}}</a>
                                                <ul>
                                                    @can('view backend')
                                                        <li>
                                                            <a href="{{ route('admin.dashboard') }}">@lang('navs.frontend.dashboard')</a>
                                                        </li>
                                                    @endcan


                                                    <li>
                                                        <a href="{{ route('frontend.auth.logout') }}">@lang('navs.general.logout')</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @else
                                            <li class="">
                                                <a id="openLoginModal" data-target="#myModal"
                                                   href="#">@lang('navs.general.login')</a>
                                                <!-- The Modal -->
                                            </li>
                                        @endif

                                        @if(count($locales) > 1)
                                            <li class="menu-item-has-children ul-li-block">
                                                <a href="#">
                                                    <span class="d-md-down-none">@lang('menus.language-picker.language')
                                                        ({{ strtoupper(app()->getLocale()) }})</span>
                                                </a>
                                                <ul class="">
                                                    @foreach($locales as $lang)
                                                        @if($lang != app()->getLocale())
                                                            <li>
                                                                <a href="{{ '/lang/'.$lang }}"
                                                                   class=""> @lang('menus.language-picker.langs.'.$lang)</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Start of Header section
            ============================================= -->

        @yield('content')
        @include('cookieConsent::index')
        @include('frontend.layouts.partials.footer')

    </div><!-- #app -->

    <!-- Scripts -->
    @stack('before-scripts')
    <!-- For Js Library -->
    <script src="{{asset($assetsPath.'/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/popper.min.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/bootstrap.min.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/jarallax.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/lightbox.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/jquery.meanmenu.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/waypoints.min.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/jquery-ui.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/gmap3.min.js')}}"></script>
    <script src="{{asset('assets/js/switch.js')}}"></script>
    <script src="{{asset('assets/build/js/intlTelInput.js')}}"></script>
    <script src="{{asset($assetsPath.'/js/script.js')}}"></script>
    <script>
        @if(request()->has('user')  && (request('user') == 'admin'))

        $('#myModal').modal('show');
        $('#loginForm').find('#email').val('admin@lms.com')
        $('#loginForm').find('#password').val('secret')

        @elseif(request()->has('user')  && (request('user') == 'student'))

        $('#myModal').modal('show');
        $('#loginForm').find('#email').val('student@lms.com')
        $('#loginForm').find('#password').val('secret')

        @elseif(request()->has('user')  && (request('user') == 'teacher'))

        $('#myModal').modal('show');
        $('#loginForm').find('#email').val('teacher@lms.com')
        $('#loginForm').find('#password').val('secret')

        @endif
    </script>
    <script>
        @if((session()->has('show_login')) && (session('show_login') == true))
        $('#myModal').modal('show');
                @endif
        var font_color = "{{config('font_color')}}"
        setActiveStyleSheet(font_color);
    </script>
    @yield('js')
    @stack('after-scripts')
    <script>
        var telInput = document.querySelector("#phone");
        // initialize
        window.intlTelInput(telInput,({
            // options here
            allowExtensions: true,
            autoFormat: false,
            autoHideDialCode: false,
            autoPlaceholder: false,
            defaultCountry: "auto",
            ipinfoToken: "yolo",
            nationalMode: false,
            numberType: "MOBILE",
            preventInvalidNumbers: true,
            preferredCountries: ['ae','sa', 'jor','kw', 'bh', 'ps', 'ma', 'tn', 'dz',],
            autoPlaceholder: 'aggressive',
            utilsScript: '{{asset("assets/build/js/utils.js")}}',
                geoIpLookup: function(callback) {
                    fetch('https://ipinfo.io/json', {
                        cache: 'reload'
                    }).then(response => {
                        if ( response.ok ) {
                            return response.json()
                        }
                        throw new Error('Failed: ' + response.status)
                    }).then(ipjson => {
                        console.log(ipjson.country)
                        callback(ipjson.country)
                    }).catch(e => {
                        callback('ae')
                    })
                }
            })
        )


    </script>
    @include('includes.partials.ga')
    @if(!empty(config('custom_js')))
        <script>
            {!! config('custom_js') !!}
        </script>
    @endif
    </body>
    </html>
