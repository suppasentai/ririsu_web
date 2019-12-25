<div class="item">
    <div class="news-post standart-post">
        <div class="post-image">
            <a href="{{ route('releases.show', ['slug' => $new->slug])}}">
                <img src="{{ $new->image }}" alt="" style="height: 140px;">
            </a>
            <a href="#" class="category category-tech">{{$new->category_ref}}</a>
        </div>
        <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
        <ul class="post-tags">
            <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new->user->firstname}}</a></li>
            <li><i class="lnr lnr-eye"></i>{{views($new)->count()}}</li>
        </ul>
    </div>
</div>