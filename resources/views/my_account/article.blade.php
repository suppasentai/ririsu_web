<div class="author-profile m-0">
    <div class="author-box">
        <div class="news-post large-post m-0">
            <img alt="" src="{{$article->image}}">
            <div class="author-content">
                <h5><a class="text-dark" href="{{ route('releases.show', ['$id' => $article->id])}}">{{ $article->title }}</a></h5>
                <ul class="post-tags">
                    <li><a href="#"><i class="lnr lnr-user"></i> {{__("Author:")}} <span>{{$article->user->first_name}}</span></a></li>
                    <li><a href="#"><i class="lnr lnr-book"></i><span>{{$article->updated_at}}</span></a></li>
                    <li class="badge badge-success text-white">{{$article->category_ref}}</li>
                </ul>
                <ul class="post-tags">
                    <li>Tags: <span class="badge badge-secondary text-white">{{$article->category_ref}}</span></li>
                </ul>
                    <a class="read-more" href="single-post.html">Edit <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <a class="read-more bg-danger" href="single-post.html">Delete <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>