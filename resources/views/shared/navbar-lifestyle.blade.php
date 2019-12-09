<li class="nav-item">
    <a class="nav-link food" href="#">{{__('Lifestyle ')}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <div class="mega-posts-menu">
        <div class="posts-line">
            <div class="row">
                @foreach($lifestyles as $lifestyle)
                    <div class="col-lg-3 col-md-6">
                        <div class="news-post standart-post">
                            <div class="post-image">
                                <a href="{{ route('releases.show', ['slug' => $lifestyle->slug])}}">
                                    <img src="{{$lifestyle->image}}" alt="">
                                </a>
                                <a href="#" class="category category-food">{{$lifestyle->category_ref}}</a>
                            </div>
                            <h2><a href="{{ route('releases.show', ['slug' => $lifestyle->slug])}}">{{$lifestyle->title}}</a></h2>
                            <ul class="post-tags">
                                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$lifestyle->company->title}}</a></li>
                                    <li><i class="lnr lnr-eye"></i>{{views($lifestyle)->count()}}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</li>