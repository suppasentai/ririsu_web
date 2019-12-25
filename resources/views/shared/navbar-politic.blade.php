<li class="nav-item">
    <a class="nav-link world" href="{{ route('categories.show', ['id' => $politics[0]->category->id])}}">{{__('Politic ')}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <div class="mega-posts-menu">
        <div class="posts-line">
            <div class="row">
                @foreach($politics as $politic)
                    <div class="col-lg-3 col-md-6">
                        <div class="news-post standart-post">
                            <div class="post-image">
                                <a href="{{ route('releases.show', ['slug' => $politic->slug])}}">
                                    <img src="{{$politic->image}}" alt="">
                                </a>
                                <a href="#" class="category category-world">{{$politic->category_ref}}</a>
                            </div>
                            <h2><a href="{{ route('releases.show', ['slug' => $politic->slug])}}">{{$politic->title}}</a></h2>
                            <ul class="post-tags">
                                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$politic->company->title}}</a></li>
                                    <li><i class="lnr lnr-eye"></i>{{views($politic)->count()}}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</li>