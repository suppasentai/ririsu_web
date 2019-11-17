<div class="news-post article-post">
    <div class="row">
        <div class="col-sm-4">
            <div class="post-image">
                    <a href="{{ route('releases.show', ['$id' => $release->id])}}">
                        <img src="{{ $article->image }}" alt="">
                    </a>
                <a class="category category-tech" href="#">{{ $article->category_ref }}</a>
            </div>
        </div>
        <div class="col-sm-8">
            <h2><a href="#">{{ $article->title }}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-user"></i>{{__("by")}} <a href="#">{{$article->user->first_name}}</a></li>
                <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                <li><i class="lnr lnr-eye"></i>872 Views</li>
            </ul>
            <p>{!! \Illuminate\Support\Str::words(strip_tags($article->description), 50, '...') !!}</p>
        </div>
    </div>
</div>
