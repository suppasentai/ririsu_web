<li>
    <div class="news-post large-image-post">
        <img src="{{$new->image}}" class="h-100" alt="">
        <div class="hover-box">
            <a href="#" class="category category">{{($new->category->title)}}</a>
            <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
            <ul class="post-tags">
                <li><a href="#"><i class="lnr lnr-apartment"></i> {{__("Author:")}} <span>{{$new->company->title}}</span></a></li>
                <li><i class="lnr lnr-eye"></i>{{views($new)->count()}}</li>
            </ul>
        </div>
    </div>
</li>