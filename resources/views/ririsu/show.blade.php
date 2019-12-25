@extends('layouts.app')
<!-- content-section 
================================================== -->
@section('content')
    <section id="content-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    
                    <!-- single-post -->
                    <div class="single-post">
                        <h1>{{($release->title)}}</h1>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-apartment"></i><a href="#">{{$release->company->title}}</a></li>
                            <li><i class="lnr lnr-eye"></i>{{views($release)->count()}} {{__('Views')}}</li>
                            <li class=" float-right"><i class="lnr lnr-clock"></i>{{$release->created_at}}</li>
                        </ul>
                        <div class="share-post-box">
                            <ul class="share-box">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i><span>{{__('Share on Facebook')}}</span></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i><span>{{__('Share on Twitter')}}</span></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <img src="{{$release->image}}" alt="">
                        <div class="text-boxes">
                            {!! $release->description !!}
                        </div>
                        <div class="text-boxes">
                            <h2>{{__('Tags:')}}</h2>
                            <ul class="tags-list">
                                @foreach($release->tags as $tag)
                                    <li><a href="{{ route('tags.show', ['id' => $tag->id])}}">{{$tag->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End single-post -->
                    
                    @include('ririsu.postblock', ['similar_releases' => $similar_releases])

                </div>

                <div class="col-lg-4 sidebar-sticky">
                    
                    @include('sidebar.sidebar', ['release' => $release])

                </div>
            </div>

            @include('home.weekly_news')
        </div>
    </section>
    <!-- End content section -->
@endsection