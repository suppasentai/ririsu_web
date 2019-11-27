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