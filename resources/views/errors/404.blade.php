@extends('layouts.app')
<!-- content-section 
================================================== -->
@section('content')
    <!-- content-section 
			================================================== -->
		<section id="content-section">
			<div class="container">

				<div class="row">
					<div class="col-lg-8">

						<!-- error box -->
						<div class="error-box">
							<div class="error-banner">
								<h1>Error <span>404</span></h1>
								<p>Oops! It looks like nothing was found at this location. Maybe try another link or a search?</p>
							</div>
							<div class="search-box">
								<form role="search" class="search-form">
									<input type="text" id="search" name="search" placeholder="Search here">
									<button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
						<!-- End error box -->
						
						<!-- Posts-block -->
						<div class="posts-block categories-box">
							<div class="title-section">
								<h1>Popular posts</h1>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="news-post standart-post">
										<div class="post-image">
											<a href="single-post-2.html">
												<img src="upload/blog/s28.jpg" alt="">
											</a>
											<a href="#" class="category category-world">World</a>
										</div>
										<h2><a href="single-post.html">North Korea tested nuclear bomb</a></h2>
										<ul class="post-tags">
											<li><i class="lnr lnr-user"></i>by <a href="#">Helena Doe</a></li>
											<li><a href="#"><i class="lnr lnr-book"></i><span>20 comments</span></a></li>
											<li><i class="lnr lnr-eye"></i>872 Views</li>
										</ul>
										<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur.</p>
									</div>
									<ul class="list-news">
										<li>
											<h2><a href="single-post.html">New alternatives are more productive</a></h2>
										</li>
										<li>
											<h2><a href="single-post.html">Fruits and Vegetables</a></h2>
										</li>
										<li>
											<h2><a href="single-post.html">Traditional food</a></h2>
										</li>
										<li>
											<h2><a href="single-post.html">Hapier Child</a></h2>
										</li>
										<li>
											<h2><a href="single-post.html">Travelling is part of our life</a></h2>
										</li>
									</ul>
									<a class="more" href="#">More ...</a>
								</div>
								<div class="col-md-6">
									<div class="news-post standart-post">
										<div class="post-image">
											<a href="single-post-2.html">
												<img src="upload/blog/s35.jpg" alt="">
											</a>
											<a href="#" class="category category-fashion">Fashion</a>
										</div>
										<h2><a href="single-post.html">New alternatives are more productive</a></h2>
										<ul class="post-tags">
											<li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
											<li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
											<li><i class="lnr lnr-eye"></i>872 Views</li>
										</ul>
										<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur.</p>
									</div>
									<ul class="list-news">
										<li>
											<h2><a href="single-post.html">Technology Remote Jobs</a></h2>
										</li>
										<li>
											<h2><a href="single-post.html">United States celebrate</a></h2>
										</li>
										<li>
											<h2><a href="single-post.html">Fruits and Vegetables</a></h2>
										</li>
										<li>
											<h2><a href="single-post.html">New alternatives are more productive</a></h2>
										</li>
										<li>
											<h2><a href="single-post.html">Fruits and Vegetables</a></h2>
										</li>
									</ul>
									<a class="more" href="#">More ...</a>
								</div>
							</div>

						</div>
						<!-- End Posts-block -->

					</div>

					<div class="col-lg-4 sidebar-sticky">
						
						<!-- Sidebar -->
						<div class="sidebar theiaStickySidebar">
							<div class="search-widget widget">
								<form>
									<input type="search" placeholder="Search for..."/>
									<button type="submit">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</div>
							<div class="widget social-widget">
								<h1>Stay Connected </h1>
								<p>Do you want to be informed everytime with our latest news?</p>
								<ul class="social-share">
									<li>
										<a href="#" class="rss">
											<i class="fa fa-rss"></i>
											<span>345</span>
										</a>
									</li>
									<li>
										<a href="#" class="facebook">
											<i class="fa fa-facebook"></i>
											<span>3,460</span>
										</a>
									</li>
									<li>
										<a href="#" class="twitter">
											<i class="fa fa-twitter"></i>
											<span>5,600</span>
										</a>
									</li>
									<li>
										<a href="#" class="google">
											<i class="fa fa-google-plus"></i>
											<span>659</span>
										</a>
									</li>
								</ul>
							</div>
							<div class="widget slider-widget">
								<h1>Featured Posts</h1>
								<div class="flexslider">
									<ul class="slides">
										<li>
											<img alt="" src="upload/blog/s14.jpg" />
											<div class="slider-caption">
												<a href="#" class="category category-tech">Tech</a>
												<h2><a href="single-post.html">Vue js new javascript Framework</a></h2>
												<ul class="post-tags">
													<li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
													<li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
													<li><i class="lnr lnr-eye"></i>872 Views</li>
												</ul>
											</div>
										</li>
										<li>
											<img alt="" src="upload/blog/s13.jpg" />
											<div class="slider-caption">
												<a href="#" class="category category-fashion">Fashion</a>
												<h2><a href="single-post.html">Autumn wear ...</a></h2>
												<ul class="post-tags">
													<li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
													<li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
													<li><i class="lnr lnr-eye"></i>872 Views</li>
												</ul>
											</div>
										</li>
										<li>
											<img alt="" src="upload/blog/s26.jpg" />
											<div class="slider-caption">
												<a href="#" class="category category-world">Business</a>
												<h2><a href="single-post.html">Business title news ...</a></h2>
												<ul class="post-tags">
													<li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
													<li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
													<li><i class="lnr lnr-eye"></i>872 Views</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</div>

							<div class="advertisement">
								<a href="#"><img src="upload/addsense/300x250.jpg" alt=""></a>
							</div>

							<div class="widget tabs-widget">
								<nav class="nav nav-tabs" id="myTab" role="tablist">
									<a class="nav-item nav-link active" id="nav-popular-tab" data-toggle="tab" href="#nav-popular" role="tab" aria-controls="nav-popular" aria-selected="true">Popular</a>
									<a class="nav-item nav-link" id="nav-recent-tab" data-toggle="tab" href="#nav-recent" role="tab" aria-controls="nav-recent" aria-selected="false">Recent</a>
									<a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments" aria-selected="false">Comments</a>
								</nav>
								<div class="tab-content" id="nav-tabContent">
									<div class="tab-pane fade show active" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
										<ul class="small-posts">
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th5.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">New alternatives are more productive</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Author</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th6.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Vue js new javascript Framework</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Besim Dauti</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th7.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Eating traditional food is more healthy</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Admin Mag</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th8.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Visiting antic countries is John Doe hobby.</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Helena Doe</a></li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
									<div class="tab-pane fade" id="nav-recent" role="tabpanel" aria-labelledby="nav-recent-tab">
										<ul class="small-posts">
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th9.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">New alternatives are more productive</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Author</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th10.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Vue js new javascript Framework</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Besim Dauti</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th1.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Eating traditional food is more healthy</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Admin Mag</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th2.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Visiting antic countries is John Doe hobby.</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Helena Doe</a></li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
									<div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
										<ul class="small-posts">
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th3.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">New alternatives are more productive</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Author</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th4.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Vue js new javascript Framework</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Besim Dauti</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th5.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Eating traditional food is more healthy</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Admin Mag</a></li>
													</ul>
												</div>
											</li>
											<li>
												<a href="single-post.html">
													<img src="upload/blog/th6.jpg" alt="">
												</a>
												<div class="post-cont">
													<h2><a href="single-post.html">Visiting antic countries is John Doe hobby.</a></h2>
													<ul class="post-tags">
														<li><i class="lnr lnr-user"></i>by <a href="#">Helena Doe</a></li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="widget tags-widget">
								<h1>Tags</h1>
								<ul class="tags-list">
									<li><a href="#">Food</a></li>
									<li><a href="#">Sport</a></li>
									<li><a href="#">Lifestyle</a></li>
									<li><a href="#">Fashion</a></li>
									<li><a href="#">World</a></li>
									<li><a href="#">Politic</a></li>
									<li><a href="#">Travel</a></li>
									<li><a href="#">Tech</a></li>
									<li><a href="#">Music</a></li>
									<li><a href="#">Economy</a></li>
									<li><a href="#">Business</a></li>
									<li><a href="#">Photos</a></li>
									<li><a href="#">Company</a></li>
									<li><a href="#">Traditional</a></li>
									<li><a href="#">New</a></li>
									<li><a href="#">Future</a></li>
									<li><a href="#">Culture</a></li>
								</ul>
							</div>

						</div>

					</div>
				</div>

				<!-- Advertisement -->
				<div class="advertisement">
					<a href="#"><img src="upload/addsense/620x80grey.jpg" alt=""></a>
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
										<img src="upload/blog/s1.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s3.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s6.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s8.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s9.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s10.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s12.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s15.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s16.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s18.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s23.jpg" alt="">
									</a>
								</div>
								<h2><a href="single-post.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="news-post thumb-post">
								<div class="post-image">
									<a href="single-post-2.html">
										<img src="upload/blog/s24.jpg" alt="">
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
		<!-- End content section -->
@endsection
