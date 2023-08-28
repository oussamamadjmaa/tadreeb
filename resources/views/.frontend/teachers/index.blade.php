@extends('frontend.layouts.app'.config('theme_layout'))
@push('after-styles')
    <style>
        .couse-pagination li.active {
            color: #333333!important;
            font-weight: 700;
        }
        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #c7c7c7;
            background-color: white;
            border: none;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #333333;
            background-color:white;
            border:none;

        }
        ul.pagination{
            display: inline;
            text-align: center;
        }
    </style>
@endpush
@section('content')

	<!-- Start of breadcrumb section
		============================================= -->
		<section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold"><span>@lang('labels.frontend.teacher.title')</span></h2>
					</div>
				</div>
			</div>
		</section>
	<!-- End of breadcrumb section
		============================================= -->



	<!-- Start of teacher section
		============================================= -->
		{{-- <section id="teacher-page" class="teacher-page-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="teachers-archive">
							<div class="row">
                                @if(count($teachers) > 0)
                                @foreach($teachers as $item)
								<div class="col-md-4 col-sm-6">
									<div class="teacher-pic-content">
										<div class="teacher-img-content relative-position">
											<img src="{{$item->picture}}" alt="">
											<div class="teacher-hover-item">
												<div class="teacher-social-name ul-li-block">
													<ul>
                                                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                                        <li><a href="{{route('admin.messages',['teacher_id'=>$item->id])}}"><i class="fa fa-comments"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="teacher-next text-center">
												<a href="{{route('teachers.show',['id'=>$item->id])}}"><i class="text-gradiant fas fa-arrow-right"></i></a>
											</div>
										</div>
										<div class="teacher-name-designation">
											<span class="teacher-name">{{$item->full_name}}</span>
										</div>
									</div>
								</div>
                                @endforeach
                                @else
                                    <h4>@lang('lables.general.no_data_available')</h4>
                                @endif


							</div>
							<div class="couse-pagination text-center ul-li">
                                {{ $teachers->links() }}
							</div>
							
						</div>
					</div>
					@include('frontend.layouts.partials.right-sidebar')
				</div>
			</div>
		</section> --}}
		<section id="course-category" class="course-category-section">
			<div class="container">
				<div class="section-title mb45 headline text-center ">
					<span class="subtitle ml42 text-uppercase">@lang('labels.frontend.home.learn_new_skills')</span>
									<h2>@lang('labels.frontend.home.popular_teachers').</h2>
				</div>
				<div class="category-item">
					<div class="row">
						@if(count($teachers)> 0)
						@foreach($teachers as $key=>$item)
						<div class="col-md-3">
							<a href="{{route('teachers.show',$item->id)}}">
							</a>
							<div class="category-icon-title text-center "><a href="{{route('teachers.show',$item->id)}}">
									<div class="category-icon">
										<img width="100%" class="avatar" style="width:180px; height:180px;" src="{{$item->picture}}" alt="Teacher">
									</div>
								</a>
								<div class="category-title"><a href="{{route('teachers.show',$item->id)}}">
									</a><a href="{{route('teachers.show', $item->id)}}">
										<h4 class="text-truncate-2 h-45px">{{$item->full_name}}</h4>
									</a>
		
								</div>
								<div class="category-icon">
									<ul style="list-style:none;display: flex; padding:0;">
		
										@if ($item->docs)
											<li style="display: inline-flex;flex-wrap: wrap-reverse;"><a href="{{$item->docs->cv}}"><i class="fa fa-address-card" style="font-size:25px; padding:0 5px;"></i> </a></li>
										@endif
										<li style="display: inline-flex;flex-wrap: wrap-reverse;"><a href="{{'mailto:'.$item->email}}"><i class="fa fa-envelope" style="font-size:25px; padding:0 5px;"></i> </a></li>
										<li style="display: inline-flex;flex-wrap: wrap-reverse;"><a href="{{route('admin.messages',['teacher_id'=>$item->id])}}"><i style="font-size:25px; padding:0 5px;" class="fa fa-comments"></i></a></li>
										@if ($item->teacherProfile)
										@if ($item->teacherProfile->facebook_link)
											<li style="display: inline-flex;flex-wrap: wrap-reverse;"><a href="{{$item->teacherProfile->facebook_link}}" target="_blank"><i style="font-size:25px; padding:0 5px;" class=" fab fa-facebook-f"></i></a></li>
										@endif
										@if ($item->teacherProfile->twitter_link)
										<li style="display: inline-flex;flex-wrap: wrap-reverse;"><a href="{{$item->teacherProfile->twitter_link}}" target="_blank"><i style="font-size:25px; padding:0 5px;" class=" fab fa-twitter"></i></a></li>
										@endif
										
										@endif
									</ul>
								</div>
							</div>
		
						</div>
						@endforeach
						@endif
					</div>
					<div class="couse-pagination text-center ul-li">
						{{ $teachers->links() }}
					</div>
				</div>
			</div>
		</section>
	<!-- End of teacher section
		============================================= -->



@endsection