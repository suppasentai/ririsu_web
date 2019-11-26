<li>
    <div class="news-post large-image-post">
        <img src="{{$new->image}}" alt="">
        <div class="hover-box">
            <a href="#" class="category category">Politic</a>
            <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
            <ul class="post-tags">
                <li><a href="#"><i class="lnr lnr-user"></i> {{__("Author:")}} <span>{{$new->user->first_name}}</span></a></li>
                <li><i class="lnr lnr-eye"></i>{{$new->page_views}}</li>
            </ul>
        </div>
    </div>
</li>