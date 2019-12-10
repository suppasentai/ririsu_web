<div class="col-lg-2 col-md-3 col-sm-4 col-6">
    <div class="news-post thumb-post">
        <div class="post-image">
            <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                <img src="{{$new->image}}" alt="">
            </a>
        </div>
        <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
    </div>
</div>