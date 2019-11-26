<!-- Posts-block -->
<div class="posts-block combined-box">
    <div class="title-section">
        <h1>{{__('Combined box')}}</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="news-post standart-post">
                <div class="post-image">
                    <a href="{{ route('releases.show', ['$id' => $news[0]->id])}}">
                        <img src="{{$news[0]->image}}" alt="">
                    </a>
                    <a href="#" class="category category-fashion">{{$news[0]->category_ref}}</a>
                </div>
                <h2><a href="single-post.html">{{$news[0]->title}}</a></h2>
                <ul class="post-tags">
                    <li><a href="#"><i class="lnr lnr-user"></i> {{__("Author:")}} <span>{{$news[0]->user->first_name}}</span></a></li>
                    <li><a href="#"><i class="lnr lnr-book"></i><span>{{$news[0]->updated_at}}</span></a></li>
                    <li><i class="lnr lnr-eye"></i>{{$news[0]->page_views}}</li>
                </ul>
                <p>{!! \Illuminate\Support\Str::words(strip_tags($news[0]->description), 15, '...') !!}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-6">
                    <div class="news-post thumb-post">
                        <div class="post-image">
                            <a href="{{ route('releases.show', ['$id' => $news[1]->id])}}">
                                <img src="{{$news[1]->image}}" alt="">
                            </a>
                        </div>
                    <h2><a href="single-post.html">{{$news[1]->title}}</a></h2>
                    </div>
                </div>
                <div class="col-6">
                    <div class="news-post thumb-post">
                        <div class="post-image">
                            <a href="{{ route('releases.show', ['$id' => $news[2]->id])}}">
                                <img src="{{$news[2]->image}}" alt="">
                            </a>
                        </div>
                        <h2><a href="single-post.html">{{$news[2]->title}}</a></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="news-post thumb-post">
                        <div class="post-image">
                            <a href="{{ route('releases.show', ['$id' => $news[3]->id])}}">
                                <img src="{{$news[3]->image}}" alt="">
                            </a>
                        </div>
                        <h2><a href="single-post.html">{{$news[3]->title}}</a></h2>
                    </div>
                </div>
                <div class="col-6">
                    <div class="news-post thumb-post">
                        <div class="post-image">
                            <a href="{{ route('releases.show', ['$id' => $news[4]->id])}}">
                                <img src="{{$news[4]->image}}" alt="">
                            </a>
                        </div>
                        <h2><a href="single-post.html">{{$news[4]->title}}</a></h2>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- End Posts-block -->
