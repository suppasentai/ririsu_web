<div class="news-post alternative-post">
    <div class="post-image">
        <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
            <img src="{{$new->image}}" alt="">
        </a>
        <a href="#" class="category category-fashion">{{ $new->category_ref }}</a>
        <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{ $new->title }}</a></h2>
    </div>
    <ul class="post-tags">
        <li><i class="lnr lnr-user"></i>{{__("by")}} <a href="#">{{$new->user->first_name}}</a></li>
        <li><i class="lnr lnr-eye"></i>{{$new->page_views}}</li>
    </ul>
    <p>{!! \Illuminate\Support\Str::words(strip_tags($new->description), 15, '...') !!}</p>
</div>