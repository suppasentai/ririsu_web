<div class="news-post article-post">
    <div class="row">
        <div class="col-sm-4">
            <div class="post-image">
                <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                    <img alt="" src="{{$new->image}}">
                </a>
                <a class="category category-travel" href="#">{{$new->category_ref}}</a>
            </div>
        </div>
        <div class="col-sm-8">
            <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
            <ul class="post-tags">
                <li><a href="#"><i class="lnr lnr-user"></i> {{__("Author:")}} <span>{{$new->user->first_name}}</span></a></li>
                <li><a href="#"><i class="lnr lnr-book"></i><span>{{$new->updated_at}}</span></a></li>
                <li><i class="lnr lnr-eye"></i>{{$new->page_views}}</li>
            </ul>
            <p>{!! \Illuminate\Support\Str::words(strip_tags($new->description), 1, '...') !!}</p>
        </div>
    </div>
</div>