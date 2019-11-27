<div class="row">
    <div class="col-sm-6">
        <div class="news-post standart-post">
            <div class="post-image">
                <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                    <img src="{{ $new->image }}" alt="">
                </a>
                <a href="#" class="category category-world">{{$new->category_ref}}</a>
            </div>
            <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new->user->first_name}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{$new->page_views}}</li>
            </ul>
            <p>{!! \Illuminate\Support\Str::words(strip_tags($new->description), 2, '...') !!}</p>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="news-post standart-post">
            <div class="post-image">
                <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                    <img src="{{ $new_2->image }}" alt="">
                </a>
                <a href="#" class="category category-tech">{{$new_2->category_ref}}</a>
            </div>
            <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new_2->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new_2->user->firstname}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($new)->count()}}</li>
            </ul>
            <p>{!! \Illuminate\Support\Str::words(strip_tags($new->description), 2, '...') !!}</p>
        </div>
    </div>
</div>