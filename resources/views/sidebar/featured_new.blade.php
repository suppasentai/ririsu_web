<li>
    <img alt="" src="{{$new->image}}" style="height: 212.5px;" />
    <div class="slider-caption">
        <a href="#" class="category category-tech">{{$new->category_ref}}</a>
        <h2><a href="{{ route('releases.show', ['slug' => $new->slug])}}">{{$new->title}}</a></h2>
        <ul class="post-tags">
            <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new->user->first_name}}</a></li>
            <li><i class="lnr lnr-eye"></i>{{$new->page_views}}</li>>
        </ul>
    </div>
</li>