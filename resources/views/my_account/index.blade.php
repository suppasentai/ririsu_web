@extends('layouts.userapp')

@section('title', 'My Profile')

@section('content')
<!-- content-section 
			================================================== -->
			<section id="content-section">
				<div class="container">
					@if (session('warning'))
						<div class="row more-from-news">
						<span class="alert alert-warning help-block">
							<strong>{{ session('warning') }}</strong>
						</span>
						</div>
					@endif
					@if (session('success'))
						<div class="row more-from-news">
						<span class="alert alert-success help-block">
							<strong>{{ session('success') }}</strong>
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
								{{ $news->links() }}
	
							</div>
							<!-- End Posts-block -->
	
						</div>
						
					</div>
	
					<!-- more from news box -->
					@include('home.weekly_news')
					<!-- end more from news box -->
				</div>
			</section>
@endsection