@extends('layouts.userapp')

@section('title', 'My Profile')

@section('content')
<!-- content-section 
			================================================== -->
			<section id="content-section">
				<div class="container">
					@if (session('warning'))
						<div>
						<span class="alert alert-warning help-block">
							<strong>{{ session('warning') }}</strong>
						</span>
						</div>
					@endif
					<div class="row">
						<div class="col-lg-12">
							 
							<!-- Posts-block -->
							<div class="posts-block masonry-box">
	
								<div class="iso-call">
									@each('my_account.masonrynew', $news, 'new')
								</div>
	
								<div class="center-button">
									<a href="#" class="load-more">
										Load More <i class="fa fa-repeat" aria-hidden="true"></i>
									</a>
								</div>
	
							</div>
							<!-- End Posts-block -->
	
						</div>
						
					</div>
	
					<!-- Advertisement -->
					<div class="advertisement">
						<a href="#"><img src="/upload/addsense/620x80grey.jpg" alt=""></a>
					</div>
					<!-- End Advertisement -->
	
					<!-- more from news box -->
					<div class="more-from-news">
						<h1>Weekly Top News</h1>
						<div class="row">
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s1.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s3.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s6.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s8.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s9.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s10.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s12.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s15.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s16.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s18.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s23.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4 col-6">
								<div class="news-post thumb-post">
									<div class="post-image">
										<a href="single-post-2.html">
											<img src="/upload/blog/s24.jpg" alt="">
										</a>
									</div>
									<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
								</div>
							</div>
						</div>
					</div>
					<!-- end more from news box -->
				</div>
			</section>
@endsection