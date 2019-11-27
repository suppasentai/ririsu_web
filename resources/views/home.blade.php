@extends('layouts.app')

@section('content')
    <!-- wide-news-heading
			================================================== -->
		<div class="wide-news-heading">

            @include('home.main_news_box')
            @include('home.most_category_views_box')
            
        </div>
        <!-- End wide-news-heading -->
    
            <!-- content-section 
                ================================================== -->
            <section id="content-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">

                            
                            @include('home.lasted_box')
                            
                            @include('home.featured_box')
                            
                            @include('home.combined_box')

                            @include('home.articles_box')
                            
                        </div>
                        <div class="col-lg-4 sidebar-sticky">

                            @include('sidebar.sidebar')
                        
                        </div>
                        
                    </div>
    
                    <!-- more from news box -->

                        @include('home.weekly_news')
                    <!-- end more from news box -->
                </div>
            </section>
            <!-- End content section -->
@endsection
