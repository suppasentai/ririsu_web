@extends('layouts.app')

@section('title', 'Tag')

@section('content')
<!-- content-section 
================================================== -->
<section id="content-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-8">

                <!-- archive box -->
                <div class="archive-box">
                    <h1>{{__('Tag:')}}  <span>{{$tag->title}}</span></h1>
                </div>
                <!-- End archive box -->
                
                <!-- Posts-block -->
                <div class="posts-block articles-box">
                    @foreach($releases as $release)
                        <div class="news-post article-post">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="post-image">
                                        <a href="{{ route('releases.show', ['slug' => $release->slug])}}">
                                            <img src="{{$release->image}}" alt="">
                                        </a>
                                        <a class="category category-tech" href="#">{{$release->category_ref}}</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h2><a href="single-post.html">{{$release->title}}</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="lnr lnr-apartment"></i><a href="#">{{$release->company->title}}</a></li>
                                        <li><i class="lnr lnr-eye"></i>{{views($release)->count()}}</li>
                                    </ul>
                                    <p>{!! \Illuminate\Support\Str::words(strip_tags($release->description), 40, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $releases->links() }}
                </div>
                <!-- End Posts-block -->

            </div>

            <div class="col-lg-4 sidebar-sticky">
                
                <!-- Sidebar -->
                <div class="sidebar theiaStickySidebar">

                    @include('sidebar.tags_box')

                    @include('sidebar.widget_box')

                </div>

            </div>
        </div>

        @include('home.weekly_news')

    </div>
</section>
<!-- End content section -->
<!-- End content section -->
@endsection