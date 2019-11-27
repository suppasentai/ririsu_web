@extends('layouts.userapp')

@section('title', 'My Profile')

@section('content')
<!-- content-section ================================================== -->
    <section id="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    
                    <!-- Posts-block -->
                    <div class="posts-block standard-box">
                        <div class="title-section">
                            <h1>{{__('My Articles')}}</h1>
                        </div>
                        @if(!empty($articles))
                            @foreach ($articles as $article)
                                @include('my_account.article')
                            @endforeach
                            {{ $articles->links() }}
                        @endif
                    </div>
                    <!-- End Posts-block -->

                </div>

                <div class="col-lg-4 sidebar-sticky">
                    
                    @include('my_account.sidebar')

                </div>
            </div>
        </div>
    </section>
	<!-- End content section -->
@endsection