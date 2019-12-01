<!-- Posts-block -->
<div class="posts-block featured-box">
    <div class="title-section">
        <h1>{{__('You Might also Like')}}</h1>
    </div>
    <div class="owl-wrapper">
        <div class="owl-carousel" data-num="3">
            @foreach($similar_releases as $release)
                <div class="item">
                    <div class="news-post standart-post">
                        <div class="post-image">
                            <a href="{{ route('releases.show', ['slug' => $release->slug])}}">
                                <img src="{{$release->image}}" alt="">
                            </a>
                            <a href="#" class="category category-fashion">{{$release->category_ref}}</a>
                        </div>
                        <h2><a href="{{ route('releases.show', ['slug' => $release->slug])}}">{{$release->title}}</a></h2>
                        <ul class="post-tags">
                            <li><a href="#"><i class="lnr lnr-user"></i> {{__("Author:")}} <span>{{$release->user->first_name}}</span></a></li>
                            <li><i class="lnr lnr-eye"></i>{{views($release)->count()}}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Posts-block -->