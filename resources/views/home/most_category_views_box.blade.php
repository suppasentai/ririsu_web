<div class="item">
    <div class="news-post image-post">
        <img src="{{$politic->image}}" alt="">
        <div class="hover-box">
            <a href="#" class="category category-world">{{$politic->category_ref}}</a>
            <h2><a href="single-post.html">{{$politic->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$politic->company->title}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($politic)->count()}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="item">
    <div class="news-post image-post">
        <img src="{{$business->image}}" alt="">
        <div class="hover-box">
            <a href="#" class="category">{{$business->category_ref}}</a>
            <h2><a href="single-post.html">{{$business->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$business->company->title}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($business)->count()}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="item">
    <div class="news-post image-post">
        <img src="{{$fashion->image}}" alt="">
        <div class="hover-box">
            <a href="#" class="category category-fashion">{{$fashion->category_ref}}</a>
            <h2><a href="single-post.html">{{$fashion->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$fashion->company->title}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($fashion)->count()}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="item">
    <div class="news-post image-post">
        <img src="{{$education->image}}" alt="">
        <div class="hover-box">
            <a href="#" class="category category-food">{{$education->category_ref}}</a>
            <h2><a href="single-post.html">{{$education->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$education->company->title}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($education)->count()}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="item">
    <div class="news-post image-post">
        <img src="{{$sport->image}}" alt="">
        <div class="hover-box">
            <a href="#" class="category category-sport">{{$sport->category_ref}}</a>
            <h2><a href="single-post.html">{{$sport->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$sport->company->title}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($sport)->count()}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="item">
    <div class="news-post image-post">
        <img src="{{$tech->image}}" alt="">
        <div class="hover-box">
            <a href="#" class="category category-tech">{{$tech->category_ref}}</a>
            <h2><a href="single-post.html">{{$tech->title}}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-apartment"></i>{{__("by ")}}<a href="#">{{$tech->company->title}}</a></li>
                <li><i class="lnr lnr-eye"></i>{{views($tech)->count()}}</li>
            </ul>
        </div>
    </div>
</div>