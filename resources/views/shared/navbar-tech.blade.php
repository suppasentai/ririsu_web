<li class="nav-item">
    <a class="nav-link tech" href="#">{{__('Tech ')}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <div class="mega-posts-menu">
        <div class="posts-line">
            <div class="row">
                @foreach($techs as $tech)
                    <div class="col-lg-3 col-md-6">
                        <div class="news-post standart-post">
                            <div class="post-image">
                                <a href="{{ route('releases.show', ['slug' => $tech->slug])}}">
                                    <img src="{{$tech->image}}" alt="">
                                </a>
                                <a href="#" class="category category-tech">{{$tech->category_ref}}</a>
                            </div>
                            <h2><a href="{{ route('releases.show', ['slug' => $tech->slug])}}">{{$tech->title}}</a></h2>
                            <ul class="post-tags">
                                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$tech->company->title}}</a></li>
                                    <li><i class="lnr lnr-eye"></i>{{views($tech)->count()}}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</li>