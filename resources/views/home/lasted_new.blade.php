<div class="row">
    <div class="col-sm-6">
        <div class="news-post standart-post">
            <div class="post-image"  >
                <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                    <img src="{{ $new->image }}" style="height: 205px;" alt="">
                </a>
                <a href="#" class="category category-world">{{$new->category_ref}}</a>
            </div>
            <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$new->company->title}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($new)->count()}}</li>
                @foreach ($lasted_news[6]->tags as $tag)
                    <li><a href="{{ route('tags.show', ['id' => $tag->id])}}" class="badge badge-secondary text-white">{{ $tag->title}}</a></li>
                @endforeach
            </ul>
            <p>{!! \Illuminate\Support\Str::words(strip_tags($new->description), 20, '...') !!}</p>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="news-post standart-post">
            <div class="post-image" >
                <a href="{{ route('releases.show', ['slug' => $new_2->slug])}}">
                    <img src="{{ $new_2->image }}"  style="height: 205px;" alt="">
                </a>
                <a href="#" class="category category-tech">{{$new_2->category_ref}}</a>
            </div>
            <h2><a href="{{ route('releases.show', ['slug' => $new_2->slug])}}">{{$new_2->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$new_2->company->title}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($new_2)->count()}}</li>
                @foreach ($lasted_news[6]->tags as $tag)
                    <li><a href="{{ route('tags.show', ['id' => $tag->id])}}" class="badge badge-secondary text-white">{{ $tag->title}}</a></li>
                @endforeach
            </ul>
            <p>{!! \Illuminate\Support\Str::words(strip_tags($new_2->description), 20, '...') !!}</p>
        </div>
    </div>
</div>