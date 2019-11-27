<!-- Sidebar -->
<div class="sidebar theiaStickySidebar">
    <ul class="author-list">
        <li>
            <div class="autor-box">
                @if(!Auth::user()->image)
                <img src="/images/user.png" alt="">
                @else
                <img src="{{__('Auth::user()->image')}}" alt="">
                @endif

                <div class="autor-content">

                    <div class="autor-title">
                        <h1><span>{{Auth::user()->name}}</span><a href="autor-details.html">{{Auth::user()->articles()->count()}}</a></h1>
                        <ul class="autor-social">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>

                </div>

            </div>

            <div class="autor-last-line">
                <ul class="autor-tags">
                    <li><span><i class="fa fa-align-justify" aria-hidden="true"></i>Category</span></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Politics</a></li>
                    <li><a href="#">Sport</a></li>
                </ul>
                <a href="#" class="autor-site">http://www.janesmith.com</a>
            </div>
        </li>
    </ul>
</div>