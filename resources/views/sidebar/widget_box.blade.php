<div class="widget tabs-widget">
    <nav class="nav nav-tabs" id="myTab" role="tablist">
        <a class="nav-item nav-link active" id="nav-popular-tab" data-toggle="tab" href="#nav-popular" role="tab" aria-controls="nav-popular" aria-selected="true">{{__('Popular')}}</a>
        <a class="nav-item nav-link" id="nav-recent-tab" data-toggle="tab" href="#nav-recent" role="tab" aria-controls="nav-recent" aria-selected="false">{{__('Recent')}}</a>
        <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments" aria-selected="false">{{__('Comments')}}</a>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
            <ul class="small-posts">
                @foreach($popular_news as $new)
                <li>
                    <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                        <img src="{{$new->image}}" alt="">
                    </a>
                    <div class="post-cont">
                        <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new->user->first_name}}</a></li>
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="nav-recent" role="tabpanel" aria-labelledby="nav-recent-tab">
            <ul class="small-posts">
                @foreach($recent_news as $new)
                <li>
                    <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                        <img src="{{$new->image}}" alt="">
                    </a>
                    <div class="post-cont">
                        <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new->user->first_name}}</a></li>
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
            <ul class="small-posts">
                @foreach($news as $new)
                <li>
                    <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                        <img src="{{$new->image}}" alt="">
                    </a>
                    <div class="post-cont">
                        <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
                        <ul class="post-tags">
                            <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new->user->first_name}}</a></li>
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div> 