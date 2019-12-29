@if(isset($politic))
    <div class="item">
        <div class="news-post image-post">
            <img src="{{$politic->image}}" alt="">
            <div class="hover-box">
                <a  class="category category-world">{{$politic->category_ref}}</a>
                <h2><a href="{{ route('releases.show', ['slug' => $politic->slug])}}">{{$politic->title}}</a></h2>
                <ul class="post-tags">
                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$politic->company->title}}</a></li>
                    <li><i class="lnr lnr-eye"></i>{{views($politic)->count()}}</li>
                </ul>
            </div>
        </div>
    </div>
@endif
@if(isset($politic))
    <div class="item">
        <div class="news-post image-post">
            <img src="{{$business->image}}" alt="">
            <div class="hover-box">
                <a href="#" class="category">{{$business->category_ref}}</a>
                <h2><a href="{{ route('releases.show', ['slug' => $business->slug])}}">{{$business->title}}</a></h2>
                <ul class="post-tags">
                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$business->company->title}}</a></li>
                    <li><i class="lnr lnr-eye"></i>{{views($business)->count()}}</li>
                </ul>
            </div>
        </div>
    </div>
@endif
@if(isset($politic))
    <div class="item">
        <div class="news-post image-post">
            <img src="{{$lifestyle->image}}" alt="">
            <div class="hover-box">
                <a href="#" class="category category-fashion">{{$lifestyle->category_ref}}</a>
                <h2><a href="{{ route('releases.show', ['slug' => $lifestyle->slug])}}">{{$lifestyle->title}}</a></h2>
                <ul class="post-tags">
                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$lifestyle->company->title}}</a></li>
                    <li><i class="lnr lnr-eye"></i>{{views($lifestyle)->count()}}</li>
                </ul>
            </div>
        </div>
    </div>
@endif
@if(isset($politic))
    <div class="item">
        <div class="news-post image-post">
            <img src="{{$education->image}}" alt="">
            <div class="hover-box">
                <a href="#" class="category category-food">{{$education->category_ref}}</a>
                <h2><a href="{{ route('releases.show', ['slug' => $education->slug])}}">{{$education->title}}</a></h2>
                <ul class="post-tags">
                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$education->company->title}}</a></li>
                    <li><i class="lnr lnr-eye"></i>{{views($education)->count()}}</li>
                </ul>
            </div>
        </div>
    </div>
@endif
@if(isset($politic))
    <div class="item">
        <div class="news-post image-post">
            <img src="{{$sport->image}}" alt="">
            <div class="hover-box">
                <a href="#" class="category category-sport">{{$sport->category_ref}}</a>
                <h2><a href="{{ route('releases.show', ['slug' => $sport->slug])}}">{{$sport->title}}</a></h2>
                <ul class="post-tags">
                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$sport->company->title}}</a></li>
                    <li><i class="lnr lnr-eye"></i>{{views($sport)->count()}}</li>
                </ul>
            </div>
        </div>
    </div>
@endif
@if(isset($politic))
    <div class="item">
        <div class="news-post image-post">
            <img src="{{$tech->image}}" alt="">
            <div class="hover-box">
                <a href="#" class="category category-tech">{{$tech->category_ref}}</a>
                <h2><a href="{{ route('releases.show', ['slug' => $tech->slug])}}">{{$tech->title}}</a></h2>
                <ul class="post-tags">
                    <li><i class="lnr lnr-apartment"></i><a href="#">{{$tech->company->title}}</a></li>
                    <li><i class="lnr lnr-eye"></i>{{views($tech)->count()}}</li>
                </ul>
            </div>
        </div>
    </div>
@endif
