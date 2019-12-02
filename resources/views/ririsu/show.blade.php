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
                            <li><i class="lnr lnr-user"></i>{{__('by ')}}<a href="#">{{$release->user->first_name}}</a></li>
                        <li><i class="lnr lnr-eye"></i>{{views($release)->count()}} {{__('Views')}}</li>
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
                        <div class="text-boxes">
                            {!! $release->description !!}
                        </div>
                        <div class="text-boxes">
                            <h2>{{__('Tags')}}</h2>
                            <ul class="tags-list">
                                <li><a href="#">World</a></li>
                                <li><a href="#">Politic</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Photos</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End single-post -->
                    
                    @include('ririsu.postblock', ['similar_releases' => $similar_releases])

                    {{-- <!-- author-profile -->
                    <div class="author-profile">
                        <div class="author-box">
                            <img alt="" src="upload/users/avatar6.jpg">
                            <div class="author-content">
                                <h4>Helena Doe <a href="#">14 posts</a></h4>
                                <p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam. </p>
                                <ul class="author-social">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End author-profile --> --}}

                    @include('shared.comments_box')

                    @include('shared.contact')

                </div>

                <div class="col-lg-4 sidebar-sticky">
                    
                    @include('sidebar.sidebar', ['release' => $release])

                </div>
            </div>

            @include('shared.weeklytopnews')
        </div>
    </section>
    <!-- End content section -->
@endsection