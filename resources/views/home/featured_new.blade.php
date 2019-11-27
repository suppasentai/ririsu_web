<div class="item">
    <div class="news-post standart-post">
        <div class="post-image">
            <a href="single-post-2.html">
                <img src="{{ $new->image }}" alt="">
            </a>
            <a href="#" class="category category-tech">{{$new->category_ref}}</a>
        </div>
        <h2><a href="single-post.html">{{$new->title}}</a></h2>
        <ul class="post-tags">
            <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{{$new->user->firstname}}</a></li>
            <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
            <li><i class="lnr lnr-eye"></i>872 Views</li>
        </ul>
    </div>
</div>