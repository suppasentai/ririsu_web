@extends('layouts.userapp')

@section('title', 'My Profile')

@section('content')
		<section id="content-section">
			<div class="container">

				<!-- Posts-block -->
				<div class="posts-block">
					
					<div class="slider-news-fullwidth">
						<div class="flexslider">
							<ul class="slides">
								@foreach($news as $new)
								<li>
									<img alt="" src="{{$new->image}}" />
									<div class="slider-caption">
										<a href="#" class="category">
											{{$new->category_ref}}
										</a>
										<h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
										<ul class="post-tags">
											<li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$new->company->title}}</a></li>
											<li><i class="lnr lnr-eye"></i>{{views($new)->count()}}</li>
										</ul>
										<p>{!! \Illuminate\Support\Str::words(strip_tags($new->description), 20, '...') !!}</p>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>
				<!-- End Posts-block -->
				
				<!-- Posts-block -->
				<!-- Posts-block -->
					<div class="posts-block featured-box">
						<div class="title-section">
							<h1>{{__('You Might also Like')}}</h1>
						</div>
						<div class="owl-wrapper">
							<div class="owl-carousel" data-num="4">
								@foreach($another_news as $release)
									<div class="item">
										<div class="news-post standart-post">
											<div class="post-image">
												<a href="{{ route('releases.show', ['slug' => $release->slug])}}">
													<img src="{{$release->image}}" alt="">
												</a>
												<a href="#" class="category category-tech">{{$release->category_ref}}</a>
											</div>
											<h2><a href="{{ route('releases.show', ['slug' => $release->slug])}}">{{$release->title}}</a></h2>
											<ul class="post-tags">
												<li><a href="#"><i class="lnr lnr-user"></i> {{__("Author:")}} <span>{{$release->user->first_name}}</span></a></li>
												<li><i class="lnr lnr-eye"></i>{{views($release)->count()}}</li>
											</ul>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				<!-- End Posts-block -->
				
				<!-- Posts-block -->
				@foreach($favorating_tags as $tag)
					<div class="posts-block combined-fullwidth">
						<div class="title-section second-style">
						<h1>{{$tag->title}}</h1>
						</div>
						
						@if(count($tag->releases))
						<div class="row">
							<div class="col-lg-4">
								<div class="news-post image-post">
									<img src="{{$tag->releases[0]->image}}" alt="">
									<div class="hover-box">
										<a href="#" class="category category-world">{{$tag->releases[0]->category_ref}}</a>
										<h2><a href="single-post.html">{{$tag->releases[0]->title}}</a></h2>
										<ul class="post-tags">
											<li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$tag->releases[0]->company->title}}</a></li>
											<li><i class="lnr lnr-eye"></i>{{views($tag->releases[0])->count()}}</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								
								<ul class="small-posts">
									@for($i=1 ; $i<count($tag->releases); $i++)
										<li>
											<a href="single-post.html">
												<img src="{{$tag->releases[$i]->image}}" alt="">
											</a>
											<div class="post-cont">
												<h2><a href="single-post.html">{{$tag->releases[$i]->title}}</a></h2>
												<ul class="post-tags">
													<li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$tag->releases[$i]->company->title}}</a></li>
												</ul>
											</div>
										</li>
										@if($i == 4) @break @endif
									@endfor
								</ul>
							</div>
							<div class="col-lg-4 col-md-6">
								
								<ul class="small-posts">
									@for($i=5 ; $i<count($tag->releases); $i++)
										<li>
											<a href="single-post.html">
												<img src="{{$tag->releases[$i]->image}}" alt="">
											</a>
											<div class="post-cont">
												<h2><a href="single-post.html">{{$tag->releases[$i]->title}}</a></h2>
												<ul class="post-tags">
													<li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$tag->releases[$i]->company->title}}</a></li>
												</ul>
											</div>
										</li>
										@if($i == 8) @break @endif
									@endfor
								</ul>
							</div>
						</div>
						@endif
					</div>
				@endforeach
				<!-- End Posts-block -->

				<!-- more from news box -->
				@include('home.weekly_news')
				<!-- end more from news box -->
			</div>
		</section>
		<!-- End content section -->
@endsection