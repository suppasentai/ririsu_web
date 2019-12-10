<li class="nav-item">
    <a class="nav-link travel" href="#">{{__('Education ')}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <div class="mega-posts-menu">
        <div class="posts-line">
            <div class="row">
                @foreach($educations as $education)
                    <div class="col-lg-3 col-md-6">
                        <div class="news-post standart-post">
                            <div class="post-image">
                                <a href="{{ route('releases.show', ['slug' => $education->slug])}}">
                                    <img src="{{$education->image}}" alt="">
                                </a>
                                <a href="#" class="category category-travel">{{$education->category_ref}}</a>
                            </div>
                            <h2><a href="{{ route('releases.show', ['slug' => $education->slug])}}">{{$education->title}}</a></h2>
                            <ul class="post-tags">
                                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$education->company->title}}</a></li>
                                    <li><i class="lnr lnr-eye"></i>{{views($education)->count()}}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</li>