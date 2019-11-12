<div class="row">
    <div class="col-sm-6">
        <div class="news-post standart-post">
            <div class="post-image">
                <a href="single-post-2.html">
                    <img src="{{ $new->image }}" alt="">
                </a>
                <a href="#" class="category category-world">{{$new->category_ref}}</a>
            </div>
            <h2><a href="single-post.html">{{$new->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new->user->firstname}}</a></li>
                <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                <li><i class="lnr lnr-eye"></i>872 Views</li>
            </ul>
            <p>{!! \Illuminate\Support\Str::words(strip_tags($new->description), 15, '...') !!}</p>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="news-post standart-post">
            <div class="post-image">
                <a href="single-post-2.html">
                    <img src="{{ $new_2->image }}" alt="">
                </a>
                <a href="#" class="category category-tech">{{$new_2->category_ref}}</a>
            </div>
            <h2><a href="single-post.html">{{$new_2->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new_2->user->firstname}}</a></li>
                <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                <li><i class="lnr lnr-eye"></i>872 Views</li>
            </ul>
            <p>{!! \Illuminate\Support\Str::words(strip_tags($new->description), 15, '...') !!}</p>
        </div>
    </div>
</div>