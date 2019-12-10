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
    
                            <!-- search-results box -->
                            <div class="search-results-box">
                                <div class="search-results-banner">
                                    <h1>Search results for  <span>'Lorem'</span></h1>
                                </div>
                                <div class="search-box">
                                    <form action="{{ url('search') }}" method="get" role="search" class="search-form">
                                        <input type="text" id="search" name="search" placeholder="Search here" value="{{ request('q') }}">
                                        <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- End search-results box -->
                            
                            <!-- Posts-block -->
                            <div class="posts-block articles-box">
                                <h2>{{__('RELEASES: ') . $releases->count()}}</h2>
                                @forelse ($releases as $release)
                                    <div class="news-post article-post">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="post-image">
                                                    <a href="{{ route('releases.show', ['slug' => $release->slug])}}">
                                                        <img src="{{$release->image}}" alt="">
                                                    </a>
                                                    <a class="category category-travel" href="#">{{$release->category_ref}}</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <h2><a href="{{ route('releases.show', ['slug' => $release->slug])}}">{{$release->title}}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$release->company->title}}</a></li>
                                                    <li><i class="lnr lnr-eye"></i>{{views($release)->count()}}</li>
                                                </ul>
                                                <p>{!! \Illuminate\Support\Str::words(strip_tags($release->description), 20, '...') !!}</p>
                                                <div>
                                                    @foreach ($release->tags as $tag)
                                                        <span class="badge badge-pill badge-secondary">{{ $tag->title}}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h2>{{__('NO RELEASES FOUND')}}</h2>
                                @endforelse
                                
    
                            </div>
                            <!-- End Posts-block -->
    
                        </div>
    
                        <div class="col-lg-4 sidebar-sticky">
                            
                            @include('shared.sidebar')
    
                        </div>
                    </div>
    
                    <!-- more from news box -->
                    @include('home.weekly_news')
                    <!-- end more from news box -->
                </div>
            </section>
            <!-- End content section -->
@endsection