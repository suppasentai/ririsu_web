<!-- Posts-block -->
<div class="posts-block standard-box">
    <div class="title-section">
        <h1>Latest News <i class="lnr lnr-bookmark"></i></h1>
    </div>
    @for ($i = 0; $i < 6; $i+=2)
        @include('home.lasted_new', ['new' => $lasted_news[$i] , 'new_2' => $lasted_news[$i+1]])
    @endfor
    <div class="row">
        <div class="col-sm-6">
            <div class="news-post standart-post">
                <div class="post-image">
                    <a href="single-post-2.html">
                        <img src="{{ $lasted_news[6]->image }}" alt="">
                    </a>
                <a href="#" class="category category-travel">{{$lasted_news[6]->category_ref}}</a>
                </div>
                <h2><a href="single-post.html">{{$lasted_news[6]->title}}</a></h2>
                <ul class="post-tags">
                        <li><i class="lnr lnr-user"></i>{{__("by ")}}<a href="#">{!! $lasted_news[6]->user->firstname !!}</a></li>
                    <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                    <li><i class="lnr lnr-eye"></i>872 Views</li>
                </ul>
                <p>{!! \Illuminate\Support\Str::words(strip_tags($lasted_news[6]->description), 15, '...') !!}</p>
            </div>
        </div>
        <div class="col-sm-6">
            <h2>{{__("More ...")}}</h2>
            <ul class="list-news">
                @for ($i = 7; $i < count($lasted_news); $i++)
                    <li>
                        <h2><a href="single-post.html">{{$lasted_news[$i]->title}}</a></h2>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
</div>
<!-- End Posts-block -->