@extends('layouts.app')

@section('title', 'About')

@section('content')
<!-- content-section 
			================================================== -->
<section id="content-section">
	<div class="container">

		<div class="row">
			<div class="col-lg-8">

				<!-- About-box -->
				<div class="about-box">
					<div class="title-section">
						<h1>About Us</h1>
					</div>
					<img src="upload/others/about1.jpg" alt="">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<h2>Our History</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<!-- End About-box -->

				<!-- team-box -->
				<div class="team-box">
					<div class="title-section">
						<h1>Our Team</h1>
					</div>
					<div class="row">
						<div class="col-md-4">
							<img src="upload/others/mem3.jpg" alt="">
							<h2>John Doe</h2>
							<span>Ceo / Founder</span>
						</div>
						<div class="col-md-4">
							<img src="upload/others/mem1.jpg" alt="">
							<h2>Michael Origon</h2>
							<span>Journalis</span>
						</div>
						<div class="col-md-4">
							<img src="upload/others/mem2.jpg" alt="">
							<h2>Teddy Bronkiacis</h2>
							<span>Marketing Menager</span>
						</div>
					</div>
				</div>
				<!-- End team-box -->

			</div>

			<div class="col-lg-4 sidebar-sticky">

				<!-- Sidebar -->
				<div class="sidebar theiaStickySidebar">

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

					<div class="widget tabs-widget">
						<nav class="nav nav-tabs" id="myTab" role="tablist">
							<a class="nav-item nav-link active" id="nav-popular-tab" data-toggle="tab"
								href="#nav-popular" role="tab" aria-controls="nav-popular"
								aria-selected="true">Popular</a>
							<a class="nav-item nav-link" id="nav-recent-tab" data-toggle="tab" href="#nav-recent"
								role="tab" aria-controls="nav-recent" aria-selected="false">Recent</a>
							<a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments"
								role="tab" aria-controls="nav-comments" aria-selected="false">Comments</a>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-popular" role="tabpanel"
								aria-labelledby="nav-popular-tab">
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
											<h2><a href="single-post.html">Eating traditional food is more healthy</a>
											</h2>
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
											<h2><a href="single-post.html">Visiting antic countries is John Doe
													hobby.</a></h2>
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
											<h2><a href="single-post.html">Eating traditional food is more healthy</a>
											</h2>
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
											<h2><a href="single-post.html">Visiting antic countries is John Doe
													hobby.</a></h2>
											<ul class="post-tags">
												<li><i class="lnr lnr-user"></i>by <a href="#">Helena Doe</a></li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
							<div class="tab-pane fade" id="nav-comments" role="tabpanel"
								aria-labelledby="nav-comments-tab">
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
											<h2><a href="single-post.html">Eating traditional food is more healthy</a>
											</h2>
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
											<h2><a href="single-post.html">Visiting antic countries is John Doe
													hobby.</a></h2>
											<ul class="post-tags">
												<li><i class="lnr lnr-user"></i>by <a href="#">Helena Doe</a></li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
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