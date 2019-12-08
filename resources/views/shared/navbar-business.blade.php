<li class="nav-item">
    <a class="nav-link fashion" href="#">{{__('Business ')}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <div class="mega-posts-menu">
        <div class="posts-line">
            <div class="row">
                @foreach($businesses as $business)
                    <div class="col-lg-3 col-md-6">
                        <div class="news-post standart-post">
                            <div class="post-image">
                                <a href="{{ route('releases.show', ['slug' => $business->slug])}}">
                                    <img src="{{$business->image}}" alt="">
                                </a>
                                <a href="#" class="category category-fashion">{{$business->category_ref}}</a>
                            </div>
                            <h2><a href="single-post.html">{{$business->title}}</a></h2>
                            <ul class="post-tags">
                                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$business->company->title}}</a></li>
                                    <li><i class="lnr lnr-eye"></i>{{views($business)->count()}}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</li>