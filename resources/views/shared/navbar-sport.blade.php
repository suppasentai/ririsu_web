<li class="nav-item">
    <a class="nav-link sport" href="{{ route('categories.show', ['id' => $sports[0]->category->id])}}">{{__('Sport ')}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <div class="mega-posts-menu">
        <div class="posts-line">
            <div class="row">
                @foreach($sports as $sport)
                    <div class="col-lg-3 col-md-6">
                        <div class="news-post standart-post">
                            <div class="post-image">
                                <a href="{{ route('releases.show', ['slug' => $sport->slug])}}">
                                    <img src="{{$sport->image}}" alt="">
                                </a>
                                <a href="#" class="category category-sport">{{$sport->category_ref}}</a>
                            </div>
                            <h2><a href="{{ route('releases.show', ['slug' => $sport->slug])}}">{{$sport->title}}</a></h2>
                            <ul class="post-tags">
                                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$sport->company->title}}</a></li>
                                    <li><i class="lnr lnr-eye"></i>{{views($sport)->count()}}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</li>