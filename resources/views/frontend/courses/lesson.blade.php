@extends('frontend.layouts.app' . config('theme_layout'))

@push('after-styles')
    {{-- <link rel="stylesheet" href="{{asset('plugins/YouTube-iFrame-API-Wrapper/css/main.css')}}"> --}}
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.3/plyr.css" />
    <link href="{{ asset('plugins/touchpdf-master/jquery.touchPDF.css') }}" rel="stylesheet">

    <style>
        #app>header,
        #app>footer {
            display: none;
        }

        .lesson-container {
            display: flex;
            position: fixed;
            z-index: 99999;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: #fff;
        }

        .lesson-content {
            overflow: auto;
            flex: 1;
            padding: 0 1rem;
            margin: 55.39px 0;
            padding-top: 3rem;
        }

        .lesson-content>div {
            max-width: 768px;
            margin: 0 auto;
        }

        .lesson-sidebar {
            position: relative;
            overflow: auto;
            flex: 0 0 475px;
            transition: .25s;
            box-shadow: 0 15px 30px 0 rgba(0, 0, 0, .1);
            padding-top: 3rem;
            z-index: 2;
        }

        .next-prev-btns {
            position: fixed;
            bottom: 0;
            z-index: 99999;
            background: #fff;
            max-width: 768px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            right: 0;
            left: 475px;
            margin: 0 auto;
            border-top: solid 1px #f1f1f1;
            color: #666;
        }

        [dir=rtl] .next-prev-btns {
            right: 475px;
            left: 0;
        }

        .next-prev-btns #next {
            margin-left: auto;
        }

        [dir=rtl] .next-prev-btns #next {
            margin-left: unset;
            margin-right: auto;
        }

        .lesson-sidebar .sidebar {
            position: absolute;
            top: 70PX;
            right: 0;
            width: 475px;
            bottom: 0;
            overflow: auto;
        }

        .course-timeline-list {
            margin-top: 1rem !important;
        }

        .course-timeline-list li {
            background: transparent;
            border-bottom: 1px solid #f1f1f1;
            border-radius: 0;
            margin: 0;
            padding: 1rem;
        }

        .course-timeline-list li:hover {
            background: transparent;
        }

        .course-timeline-list li:hover .title {
            color: #ff3333;
        }

        .course-timeline-list li .icon_ {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #ff3333;
            display: inline-block;
            margin-right: 10px;
            color: #fff;
            text-align: center;
            line-height: 32px;
            font-size: 16px;
            position: relative;
        }

        [dir=rtl] .course-timeline-list li .icon_ {
            margin-right: 0;
            margin-left: 10px;
        }

        .course-timeline-list li .icon_::after {
            content: '';
            border: 1px solid #e74d57;
            width: 100%;
            height: 100%;
            top: 0;
            left: -6px;
            position: absolute;
            z-index: 1;
            -webkit-transition: all .35s;
            transition: all .35s;
            border-radius: 50%;
        }

        [dir=rtl] .course-timeline-list li .icon_::after {
            left: unset;
            right: -6px;
        }

        .course-timeline-list li:hover .icon_:after {
            left: 0;
            right: 0;
        }

        .course-timeline-list li span {
            float: unset;
        }

        .course-timeline-list li .checkicon {
            font-size: 16px;
            margin: 0;
            margin-top: 7px;
            float: right;
        }

        [dir=rtl] .course-timeline-list li .checkicon {
            float: left;
        }

        .course-timeline-list li .title {
            color: #000;
            font-size: 17px;
            font-weight: 500;
            text-transform: none;
            vertical-align: middle;
        }

        .course-details-section {
            padding: 0;
        }

        .tgs-btn {
            position: fixed;
            top: 30%;
            background: #fff;
            box-shadow: -5px 1px 18px 0px #0000002b;
            z-index: 999999;
            padding: 16px 5px;
            color: #ff3333;
            left: 475px;
            cursor: pointer;
            transition: 0.25s;
        }

        [dir=rtl] .tgs-btn {
            left: unset;
            right: 475px;
        }

        .tgs-btn i {
            transition: 0.25s;
        }

        [dir=rtl] .tgs-btn i {
            transform: rotate(180deg);
        }

        .toggle-lesson-sidebar .lesson-sidebar {
            flex-basis: 0;
        }

        .toggle-lesson-sidebar .tgs-btn {
            left: 0;
        }

        [dir=rtl] .toggle-lesson-sidebar .tgs-btn {
            left: unset;
            right: 0;
        }

        .toggle-lesson-sidebar .tgs-btn i {
            transform: rotate(180deg);
        }

        [dir=rtl] .toggle-lesson-sidebar .tgs-btn i {
            transform: rotate(0deg);
        }

        .toggle-lesson-sidebar .next-prev-btns {
            right: 0;
        }

        .lesson-header {
            position: fixed;
            left: 475px;
            right: 0;
            background: #f0434a;
            height: 61px;
            padding: 0 1rem;
        }

        [dir=rtl] .lesson-header {
            left: 0;
            right: 475px;
        }

        .toggle-lesson-sidebar .lesson-header {
            left: 0;
            right: 0;
        }

        .lesson-header__inner {
            position: relative;
            max-width: 768px;
            margin: 0 auto;
            height: 100%;
            color: #fff;
            display: flex;
            align-items: center;
        }

        .lesson-header a.back-course {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 61px;
            color: #fff;
            background: #c34d52;
            font-size: 23px;
        }

        [dir=rtl] .lesson-header a.back-course {
            right: unset;
            left: 0;
        }

        .lesson-header__inner h3 {
            margin: 0;
            font-size: 21px;
        }

        .test-form {
            color: #333333;
        }

        .course-details-category ul li {
            width: 100%;
        }

        .sidebar.is_stuck {
            top: 15% !important;
        }

        .touchPDF {
            border: 1px solid #e3e3e3;
        }

        .touchPDF>.pdf-outerdiv>.pdf-toolbar {
            height: 0;
            color: black;
            padding: 5px 0;
            text-align: right;
        }

        .pdf-tabs {
            width: 100% !important;
        }

        .pdf-outerdiv {
            width: 100% !important;
            left: 0 !important;
            padding: 0px !important;
            transform: scale(1) !important;
        }

        .pdf-viewer {
            left: 0px;
            width: 100% !important;
        }

        .pdf-drag {
            width: 100% !important;
        }

        .pdf-outerdiv {
            left: 0px !important;
        }

        .pdf-outerdiv {
            padding-left: 0px !important;
            left: 0px;
        }

        .pdf-toolbar {
            left: 0px !important;
            width: 99% !important;
            height: 30px;
        }

        .pdf-viewer {
            box-sizing: border-box;
            left: 0 !important;
            margin-top: 10px;
        }

        .pdf-title {
            display: none !important;
        }

        .options-list li {
            list-style-type: none;
        }

        .options-list li.correct {
            color: green;

        }

        .options-list li.incorrect {
            color: red;

        }

        .options-list li.correct:before {
            content: "\f058";
            /* FontAwesome Unicode */
            font-family: 'Font Awesome\ 5 Free';
            display: inline-block;
            color: green;
            margin-right: -1.3em;
            /* same as padding-left set on li */
            width: 1.3em;
            /* same as padding-left set on li */
        }

        .options-list li.incorrect:before {
            content: "\f057";
            /* FontAwesome Unicode */
            font-family: 'Font Awesome\ 5 Free';
            display: inline-block;
            color: red;
            margin-right: -1.3em;
            /* same as padding-left set on li */
            width: 1.3em;
            /* same as padding-left set on li */
        }

        .options-list li:before {
            content: "\f111";
            /* FontAwesome Unicode */
            font-family: 'Font Awesome\ 5 Free';
            display: inline-block;
            color: black;
            margin-right: -1.3em;
            /* same as padding-left set on li */
        }


        @media screen and (max-width: 768px) {
            .lesson-sidebar {
                flex: 0 0 0;
            }

            .lesson-sidebar .sidebar {
                width: 299px;
            }

            .tgs-btn {
                left: 0;
            }

            .tgs-btn i {
                transform: rotate(180deg);
            }
            [dir=rtl] .tgs-btn i {
                transform: rotate(0deg);
            }

            .toggle-lesson-sidebar .tgs-btn i {
                transform: rotate(0);
            }
            [dir=rtl] .toggle-lesson-sidebar .tgs-btn i {
                transform: rotate(180deg);
            }

            [dir=rtl] .tgs-btn {
                left: unset;
                right: 0;
            }
            .next-prev-btns {
                left: 0;
            }

            [dir=rtl] .next-prev-btns {
                left: unset;
                right: 0;
            }

            .toggle-lesson-sidebar .lesson-sidebar {
                flex-basis: 299px;
            }

            .toggle-lesson-sidebar .tgs-btn,
            .toggle-lesson-sidebar .next-prev-btns {
                right: unset;
                left: 299px;
            }

            [dir=rtl] .toggle-lesson-sidebar .tgs-btn,
            .toggle-lesson-sidebar .next-prev-btns {
                left: unset;
                right: 299px;
            }

            [dir=rtl] .toggle-lesson-sidebar .tgs-btn i {
                transform: rotate(180deg);
            }

            .lesson-header, [dir=rtl] .lesson-header {
                right: 0;
                left: 0;
            }

            .toggle-lesson-sidebar .lesson-header {
                right: 0;
                left: 299px;
            }

            [dir=rtl] .toggle-lesson-sidebar .lesson-header {
                right: 299px;
                left: 0;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Start of course details section
                                ============================================= -->
    <section id="course-details" class="course-details-section">
        <div>
            <div class="lesson-container">
                <div class="tgs-btn">
                    <i class="fa fa-arrow-left"></i>
                </div>
                <div class="lesson-header">
                    <div class="lesson-header__inner">
                        <a href="{{ route('courses.show', [$lesson->course->slug]) }}"><h3>{{ $lesson->course->title }}</h3></a>
                    </div>
                    <a href="{{ route('courses.show', [$lesson->course->slug]) }}" class="back-course"><i
                            class="fa fa-times"></i></a>
                </div>
                <div class="lesson-sidebar">
                    <div id="sidebar" class="sidebar">
                        <div class="course-details-category ul-li">
                            <div class="px-3">
                                <div class="next-prev-btns">
                                    @if ($previous_lesson)
                                        <div class="prev">
                                            <a
                                                href="{{ route('lessons.show', [$previous_lesson->course_id, $previous_lesson->model->slug]) }}">
                                                <i class="fa fa-angle-double-right"></i> @lang('labels.frontend.course.prev')
                                            </a>
                                        </div>
                                    @endif

                                    @if ($next_lesson)
                                        <div id="next">
                                            <a
                                                href="{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->model->slug]) }}">
                                                @lang('labels.frontend.course.next') <i class='fa fa-angle-double-left'></i> </a>
                                        </div>
                                    @endif
                                </div>

                                @if ($lesson->course->progress() == 100)
                                    @if (!$lesson->course->isUserCertified())
                                        @if ($lesson->course->can_get_certificate())
                                            <form method="post" action="{{ route('admin.certificates.generate') }}">
                                                @csrf
                                                <input type="hidden" value="{{ $lesson->course->id }}" name="course_id">
                                                <button
                                                    class="btn btn-success btn-block text-white mb-3 text-uppercase font-weight-bold"
                                                    id="finish">@lang('labels.frontend.course.finish_course')</button>
                                            </form>
                                        @endif
                                    @else
                                        <div class="alert alert-success">
                                            @lang('labels.frontend.course.certified')
                                        </div>
                                    @endif
                                @endif


                                <span class="float-none">@lang('labels.frontend.course.course_timeline')</span>
                            </div>
                            <ul class="course-timeline-list">
                                @foreach ($lesson->course->courseTimeline()->orderBy('sequence')->get() as $key => $item)
                                    @if ($item->model && $item->model->published == 1)
                                        {{-- @php $key++; @endphp --}}
                                        <li class="@if ($lesson->id == $item->model->id) active @endif">
                                            <a
                                                @if (in_array($item->model->id, $completed_lessons)) href="{{ route('lessons.show', ['course_id' => $lesson->course->id, 'slug' => $item->model->slug]) }}" @endif>
                                                <span class="icon_"><i class="fa fa-folder"></i></span>
                                                <span class="title">{{ $item->model->title }}</span>
                                                @if ($item->model_type == 'App\Models\Test')
                                                    <p class="mb-0 text-primary">
                                                        - @lang('labels.frontend.course.test')</p>
                                                @endif
                                                @if (in_array($item->model->id, $completed_lessons))
                                                    <span class="checkicon"><i
                                                            class="fa text-success float-right fa-check-square"></i></span>
                                                @endif
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="couse-feature ul-li-block">
                            <ul>
                                <li>@lang('labels.frontend.course.chapters')
                                    <span> {{ $lesson->course->chapterCount() }} </span>
                                </li>
                                <li>@lang('labels.frontend.course.category') <span><a
                                            href="{{ route('courses.category', ['category' => $lesson->course->category->slug]) }}"
                                            target="_blank">{{ $lesson->course->category->name }}</a> </span></li>
                                <li>@lang('labels.frontend.course.author') <span>

                                        @foreach ($lesson->course->teachers as $key => $teacher)
                                            @php $key++ @endphp
                                            <a href="{{ route('teachers.show', ['id' => $teacher->id]) }}" target="_blank">
                                                {{ $teacher->full_name }}@if ($key < count($lesson->course->teachers))
                                                    ,
                                                @endif
                                            </a>
                                        @endforeach

                                    </span>
                                </li>
                                <li>@lang('labels.frontend.course.progress') <span> <b>
                                            {{ intval((count($completed_lessons) / $lesson->course->courseTimeline->count()) * 100) }}
                                            % @lang('labels.frontend.course.completed')</b></span></li>
                            </ul>

                        </div> --}}
                    </div>
                </div>
                <div class="lesson-content">
                    @if (session()->has('success'))
                        <div class="alert alert-dismissable alert-success fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    @include('includes.partials.messages')

                    <div class="course-details-item border-bottom-0 mb-0">
                        @if ($lesson->lesson_image != '')
                            <div class="course-single-pic mb30">
                                <img src="{{ asset('storage/uploads/' . $lesson->lesson_image) }}" alt="">
                            </div>
                        @endif


                        @if ($test_exists)
                            <div class="course-single-text">
                                <div class="mt10 headline relative-position">
                                    <h3>
                                        <b>@lang('labels.frontend.course.test')
                                            : {{ $lesson->title }}</b>
                                    </h3>
                                </div>
                                <div class="course-details-content">
                                    <p> {!! $lesson->full_text !!} </p>
                                </div>
                            </div>
                            <hr />
                            @if (!is_null($test_result))
                                <div class="alert alert-info">@lang('labels.frontend.course.your_test_score')
                                    : {{ $test_result->test_result }}</div>
                                @if (config('retest'))
                                    <form action="{{ route('lessons.retest', [$test_result->test->slug]) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="result_id" value="{{ $test_result->id }}">
                                        <button type="submit" class="btn gradient-bg font-weight-bold text-white"
                                            href="">
                                            @lang('labels.frontend.course.give_test_again')
                                        </button>
                                    </form>
                                @endif
                                @if (count($lesson->questions) > 0)
                                    <hr>

                                    @foreach ($lesson->questions as $question)
                                        <h4 class="mb-0">{{ $loop->iteration }}
                                            . {!! $question->question !!} @if (!$question->isAttempted($test_result->id))
                                                <small class="badge badge-danger"> @lang('labels.frontend.course.not_attempted')</small>
                                            @endif
                                        </h4>
                                        <br />
                                        <ul class="options-list pl-4">
                                            @foreach ($question->options as $option)
                                                <li
                                                    class="@if (
                                                        ($option->answered($test_result->id) != null && $option->answered($test_result->id) == 1) ||
                                                            $option->correct == true) correct @elseif($option->answered($test_result->id) != null && $option->answered($test_result->id) == 2) incorrect @endif">
                                                    {{ $option->option_text }}

                                                    @if ($option->correct == 1 && $option->explanation != null)
                                                        <p class="text-dark">
                                                            <b>@lang('labels.frontend.course.explanation')</b><br>
                                                            {{ $option->explanation }}
                                                        </p>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                        <br />
                                    @endforeach
                                @else
                                    <h3>@lang('labels.general.no_data_available')</h3>
                                @endif
                            @else
                                <div class="test-form">
                                    @if (count($lesson->questions) > 0)
                                        <form action="{{ route('lessons.test', [$lesson->slug]) }}" method="post">
                                            {{ csrf_field() }}
                                            @foreach ($lesson->questions as $question)
                                                <h4 class="mb-0">{{ $loop->iteration }}. {!! $question->question !!}</h4>
                                                <br />
                                                @foreach ($question->options as $option)
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="questions[{{ $question->id }}]"
                                                                value="{{ $option->id }}" />
                                                            <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                            {{ $option->option_text }}<br />
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <br />
                                            @endforeach
                                            <input class="btn gradient-bg text-white font-weight-bold" type="submit"
                                                value=" @lang('labels.frontend.course.submit_results') " />
                                        </form>
                                    @else
                                        <h3>@lang('labels.general.no_data_available')</h3>
                                    @endif
                                </div>
                            @endif
                            <hr />
                        @else
                            <div class="course-single-text">
                                <div class="mt10 headline relative-position">
                                    <h3>
                                        <b>{{ $lesson->title }}</b>
                                    </h3>
                                </div>
                                @if ($lesson->live_lesson)
                                    <h4 class="my-4">@lang('labels.frontend.course.available_slots')</h4>
                                    <div class="affiliate-market-guide mb65">
                                        <div class="affiliate-market-accordion">
                                            <div id="accordion" class="panel-group">
                                                @php $count = 0; @endphp
                                                @foreach ($lesson->liveLessonSlots as $lessonSlot)
                                                    @php $count++ @endphp
                                                    <div class="panel position-relative">
                                                        <div class="panel-title" id="headingOne">
                                                            <div class="ac-head">
                                                                <button class="btn btn-link collapsed"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse{{ $count }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse{{ $count }}">
                                                                    <span>{{ sprintf('%02d', $count) }}</span>
                                                                    {{ $lessonSlot->topic }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div id="collapse{{ $count }}" class="collapse"
                                                            aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="panel-body">
                                                                {!! $lessonSlot->description !!}
                                                                <p class="my-auto"><span
                                                                        class="font-weight-bold">@lang('labels.frontend.course.live_lesson_meeting_date')</span>
                                                                    : {{ $lessonSlot->start_at->format('d-m-Y h:i A') }}
                                                                    <strong>({{ config('zoom.timezone') }})</strong>
                                                                </p>
                                                                <p class="my-auto"><span
                                                                        class="font-weight-bold">@lang('labels.frontend.course.live_lesson_meeting_duration')</span>
                                                                    : {{ $lessonSlot->duration }}</p>
                                                                @if ($lesson->lessonSlotBooking && $lesson->lessonSlotBooking->where('user_id', auth()->user()->id)->count())
                                                                    @if (auth()->user()->lessonSlotBookings()->where('live_lesson_slot_id', $lessonSlot->id)->first())
                                                                        @if ($lessonSlot->start_at->timezone(config('zoom.timezone'))->gt(\Carbon\Carbon::now(new DateTimeZone(config('zoom.timezone')))))
                                                                            <p class="my-auto"><span
                                                                                    class="font-weight-bold">@lang('labels.frontend.course.live_lesson_meeting_id')</span>
                                                                                : {{ $lessonSlot->meeting_id }}</p>
                                                                            <p class="my-auto"><span
                                                                                    class="font-weight-bold">@lang('labels.frontend.course.live_lesson_meeting_password')</span>
                                                                                : {{ $lessonSlot->password }}</p>

                                                                            <a class="btn btn-info mt-3"
                                                                                href="{{ $lessonSlot->join_url }}"
                                                                                target="_blank">
                                                                                <span
                                                                                    class="text-white font-weight-bold ">@lang('labels.frontend.course.live_lesson_join_url')</span>
                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    @if ($lessonSlot->lessonSlotBookings->count() >= $lessonSlot->student_limit)
                                                                        <span class="btn btn-danger mt-3">
                                                                            <span
                                                                                class="text-white font-weight-bold ">@lang('labels.frontend.course.full_slot')</span>
                                                                        </span>
                                                                    @else
                                                                        <form method="post"
                                                                            action="{{ route('lessons.course.book-slot') }}">
                                                                            @csrf
                                                                            <input type="hidden"
                                                                                value="{{ $lessonSlot->id }}"
                                                                                name="live_lesson_slot_id">
                                                                            <input type="hidden"
                                                                                value="{{ $lesson->id }}"
                                                                                name="lesson_id">
                                                                            <button
                                                                                class="btn btn-info mt-3">@lang('labels.frontend.course.book_slot')</button>
                                                                        </form>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if ($lesson->mediaPDF)
                            <div class="course-single-text mb-5">
                                {{-- <iframe src="{{asset('storage/uploads/'.$lesson->mediaPDF->name)}}" width="100%" --}}
                                {{-- height="500px"> --}}
                                {{-- </iframe> --}}
                                <div id="myPDF"></div>

                            </div>
                        @endif


                        @if ($lesson->mediaVideo && $lesson->mediavideo->count() > 0)
                            <div class="course-single-text">
                                @if ($lesson->mediavideo != '')
                                    <div class="course-details-content mt-3">
                                        <div class="video-container mb-5" data-id="{{ $lesson->mediavideo->id }}">
                                            @if ($lesson->mediavideo->type == 'youtube')
                                                <div id="player" class="js-player" data-plyr-provider="youtube"
                                                    data-plyr-embed-id="{{ $lesson->mediavideo->file_name }}"></div>
                                            @elseif($lesson->mediavideo->type == 'vimeo')
                                                <div id="player" class="js-player" data-plyr-provider="vimeo"
                                                    data-plyr-embed-id="{{ $lesson->mediavideo->file_name }}"></div>
                                            @elseif($lesson->mediavideo->type == 'upload')
                                                <video poster="" id="player" class="js-player" playsinline
                                                    controls>
                                                    <source src="{{ $lesson->mediavideo->url }}" type="video/mp4" />
                                                </video>
                                            @elseif($lesson->mediavideo->type == 'embed')
                                                {!! $lesson->mediavideo->url !!}
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if ($lesson->mediaAudio)
                            <div class="course-single-text mb-5">
                                <audio id="audioPlayer" controls>
                                    <source src="{{ $lesson->mediaAudio->url }}" type="audio/mp3" />
                                </audio>
                            </div>
                        @endif


                        @if ($lesson->downloadableMedia != '' && $lesson->downloadableMedia->count() > 0)
                            <div class="course-single-text mt-4 px-3 py-1 gradient-bg text-white">
                                <div class="course-title mt10 headline relative-position">
                                    <h4 class="text-white">
                                        @lang('labels.frontend.course.download_files')
                                    </h4>
                                </div>

                                @foreach ($lesson->downloadableMedia as $media)
                                    <div class="course-details-content text-white">
                                        <p class="form-group">
                                            <a href="{{ route('download', ['filename' => $media->name, 'lesson' => $lesson->id]) }}"
                                                class="text-white font-weight-bold"><i class="fa fa-download"></i>
                                                {{ $media->name }}
                                                ({{ number_format((float) $media->size / 1024, 2, '.', '') }}
                                                @lang('labels.frontend.course.mb'))
                                            </a>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endif


                        @if (!$test_exists)
                            <div class="course-details-content">
                                @if ($lesson->live_lesson)
                                    <p>{{ $lesson->short_text }}</p>
                                @else
                                    <p> {!! $lesson->full_text !!} </p>
                                @endif
                            </div>
                        @endif


                    </div>
                    <!-- /course-details -->

                    <!-- /market guide -->

                    <!-- /review overview -->

                </div>
            </div>
        </div>
    </section>
    <!-- End of course details section
                            ============================================= -->

@endsection


@push('after-scripts')
    {{-- <script src="//www.youtube.com/iframe_api"></script> --}}
    <script src="{{ asset('plugins/sticky-kit/sticky-kit.js') }}"></script>
    <script src="https://cdn.plyr.io/3.5.3/plyr.polyfilled.js"></script>
    <script src="{{ asset('plugins/touchpdf-master/pdf.compatibility.js') }}"></script>
    <script src="{{ asset('plugins/touchpdf-master/pdf.js') }}"></script>
    <script src="{{ asset('plugins/touchpdf-master/jquery.touchSwipe.js') }}"></script>
    <script src="{{ asset('plugins/touchpdf-master/jquery.touchPDF.js') }}"></script>
    <script src="{{ asset('plugins/touchpdf-master/jquery.panzoom.js') }}"></script>
    <script src="{{ asset('plugins/touchpdf-master/jquery.mousewheel.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>



    <script>
        $(document).on('click', '.tgs-btn', function() {
            $('body').toggleClass('toggle-lesson-sidebar');
        })

        @if ($lesson->mediaPDF)
            $(function() {
                $("#myPDF").pdf({
                    source: "{{ asset('storage/uploads/' . $lesson->mediaPDF->name) }}",
                    loadingHeight: 800,
                    loadingWidth: 800,
                    loadingHTML: ""
                });

            });
        @endif

        var storedDuration = 0;
        var storedLesson;
        storedDuration = Cookies.get("duration_" + "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" + "_" +
            "{{ $lesson->course->id }}");
        storedLesson = Cookies.get("lesson" + "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" + "_" +
            "{{ $lesson->course->id }}");
        var user_lesson;

        if (parseInt(storedLesson) != parseInt("{{ $lesson->id }}")) {
            Cookies.set('lesson', parseInt('{{ $lesson->id }}'));
        }


        @if ($lesson->mediaVideo && $lesson->mediaVideo->type != 'embed')
            var current_progress = 0;


            @if ($lesson->mediaVideo->getProgress(auth()->user()->id) != '')
                current_progress = "{{ $lesson->mediaVideo->getProgress(auth()->user()->id)->progress }}";
            @endif



            const player2 = new Plyr('#audioPlayer');

            const player = new Plyr('#player');
            duration = 10;
            var progress = 0;
            var video_id = $('#player').parents('.video-container').data('id');
            player.on('ready', event => {
                player.currentTime = parseInt(current_progress);
                duration = event.detail.plyr.duration;


                if (!storedDuration || (parseInt(storedDuration) === 0)) {
                    Cookies.set("duration_" + "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" + "_" +
                        "{{ $lesson->course->id }}", duration);
                }

            });

            {{-- if (!storedDuration || (parseInt(storedDuration) === 0)) { --}}
            {{-- Cookies.set("duration_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}", player.duration); --}}
            {{-- } --}}


            setInterval(function() {
                player.on('timeupdate', event => {
                    if ((parseInt(current_progress) > 0) && (parseInt(current_progress) < parseInt(event
                            .detail.plyr.currentTime))) {
                        progress = current_progress;
                    } else {
                        progress = parseInt(event.detail.plyr.currentTime);
                    }
                });

                saveProgress(video_id, duration, parseInt(progress));
            }, 3000);


            function saveProgress(id, duration, progress) {
                $.ajax({
                    url: "{{ route('update.videos.progress') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'video': parseInt(id),
                        'duration': parseInt(duration),
                        'progress': parseInt(progress)
                    },
                    success: function(result) {
                        if (progress === duration) {
                            // location.reload();
                        }
                    }
                });
            }


            // $('#notice').on('hidden.bs.modal', function () {
            //     location.reload();
            // });
        @endif

        $("#sidebar").stick_in_parent();


        @if ((int) config('lesson_timer') != 0)
            //Next Button enables/disable according to time

            var readTime, totalQuestions, testTime;
            user_lesson = Cookies.get("user_lesson_" + "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" + "_" +
                "{{ $lesson->course->id }}");

            @if ($test_exists)
                totalQuestions = '{{ count($lesson->questions) }}'
                readTime = parseInt(totalQuestions) * 30;
            @else
                readTime = parseInt("{{ $lesson->readTime() }}") * 60;
            @endif

            @if (!$lesson->isCompleted())
                storedDuration = Cookies.get("duration_" + "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" +
                    "_" + "{{ $lesson->course->id }}");
                storedLesson = Cookies.get("lesson" + "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" + "_" +
                    "{{ $lesson->course->id }}");


                if (storedDuration > 0) {
                    var totalLessonTime = parseInt(storedDuration) ? parseInt(storedDuration) : 0;
                } else {
                    var totalLessonTime = readTime + (parseInt(storedDuration) ? parseInt(storedDuration) : 0);
                }

                var storedCounter = (Cookies.get("storedCounter_" + "{{ auth()->user()->id }}" + "_" +
                    "{{ $lesson->id }}" + "_" + "{{ $lesson->course->id }}")) ? Cookies.get("storedCounter_" +
                    "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" + "_" + "{{ $lesson->course->id }}") : 0;
                var counter;
                if (user_lesson) {
                    if (user_lesson === 'true') {
                        counter = 1;
                    }
                } else {
                    if ((storedCounter != 0) && storedCounter < totalLessonTime) {
                        counter = storedCounter;
                    } else {
                        counter = totalLessonTime;
                    }
                }
                var interval = setInterval(function() {
                    counter--;
                    // Display 'counter' wherever you want to display it.
                    if (counter >= 0) {
                        // Display a next button box
                        $('#nextButton').html(
                            "<a class='btn btn-block bg-danger font-weight-bold text-white' href='#'>@lang('labels.frontend.course.next') (in " +
                            counter + " seconds)</a>")
                        Cookies.set("duration_" + "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" + "_" +
                            "{{ $lesson->course->id }}", counter);

                    }
                    if (counter === 0) {
                        Cookies.set("user_lesson_" + "{{ auth()->user()->id }}" + "_" + "{{ $lesson->id }}" +
                            "_" + "{{ $lesson->course->id }}", 'true');
                        Cookies.remove('duration');

                        @if ($test_exists && is_null($test_result))
                            $('#nextButton').html(
                                "<a class='btn btn-block bg-danger font-weight-bold text-white' href='#'>@lang('labels.frontend.course.complete_test')</a>"
                            )
                        @else
                            @if ($next_lesson)
                                $('#nextButton').html(
                                    "<a class='btn btn-block gradient-bg font-weight-bold text-white'" +
                                    " href='{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->model->slug]) }}'>@lang('labels.frontend.course.next')<i class='fa fa-angle-double-right'></i> </a>"
                                );
                            @else
                                $('#nextButton').html(
                                    "<form method='post' action='{{ route('admin.certificates.generate') }}'>" +
                                    "<input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}' />" +
                                    "<input type='hidden' value='{{ $lesson->course->id }}' name='course_id'> " +
                                    "<button class='btn btn-success btn-block text-white mb-3 text-uppercase font-weight-bold' id='finish'>@lang('labels.frontend.course.finish_course')</button></form>"
                                );
                            @endif

                            @if (!$lesson->isCompleted())
                                courseCompleted("{{ $lesson->id }}", "{{ get_class($lesson) }}");
                            @endif
                        @endif
                        clearInterval(counter);
                    }
                }, 1000);
            @endif
        @endif

        function courseCompleted(id, type) {
            $.ajax({
                url: "{{ route('update.course.progress') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'model_id': parseInt(id),
                    'model_type': type,
                },
            });
        }
    </script>
@endpush
