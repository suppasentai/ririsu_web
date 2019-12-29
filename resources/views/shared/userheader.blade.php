<header class="clearfix">  
    <div class="top-line">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-9">
                    <ul class="info-list social-icons text-left">
                        <li><a href="{{route("home")}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back to Homepage</i></a>
                        </li>
                        <li>
                        <span class="live-time"><i class="fa fa-calendar-o"></i>{{Carbon\Carbon::now()->isoFormat('dddd, MMMM Do YYYY')}}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-3">
                    <ul class="social-icons">
                        @guest
                        <li>
                            <b><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></b>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('my_account')}}" role="button">
                                <b>{{ __('My Profile') }} <span class="caret"></span></b>
                            </a>
                        </li>
                        <li>
                            <b><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></b>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>  
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a href="#" class="open-menu p-0"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="navbar-brand live-time">&nbsp;{{(Auth::user()->email)}}</span></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-auto">
                    @if(!Auth::user()->hasAccess(['system']))
                    <li class="nav-item">
                        <a class="nav-link sport" href="{{ route('followed_companies')}}">
                            {{ __('Followed Companies') }}&nbsp;
                        </a>
                    </li>
                    @endif

                                        
                    <li class="nav-item">
                        <a class="nav-link food" href="{{ route('my_account')}}">
                            {{ __('Your News') }}&nbsp;
                        </a>
                    </li>

                    @if(!Auth::user()->hasAccess(['system']))
                    <li class="nav-item">
                        <a class="nav-link fashion" href="{{ route('follow_recom')}}">
                            {{ __('Follow more company') }}&nbsp;
                        </a>
                    </li>
                    @endif
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search for..." aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
            <!-- vertical menu -->
            <div class="vertical-box" style=" overflow: hidden;">
                <h2><a class="text-white food" href="{{ route('my_account')}}">{{Auth::user()->email}}</a></h2>
                <a href="#" class="close-menu"><i class="fa fa-window-close" aria-hidden="true"></i></a>
                <ul class="vertical-menu social-icons">
                    
                    <li class="droper"><b><a href="#">{{__("Account Control")}}<i class="fa fa-angle-down" aria-hidden="true"></i></a></b>
                        <ul class="level2 social-icons">
                            <li>
                                <a href="{{ route('my_account_edit')}}" role="button">
                                    {{ __('Edit Profile') }} <span class="caret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('password_edit')}}" role="button">
                                    {{ __('Change Password') }} <span class="caret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cold_start')}}" role="button">
                                    {{ __('Industries/ Tags') }} <span class="caret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @can('release.draft')
                    <li class="droper"><b><a href="#">{{__("Articles Control")}}<i class="fa fa-angle-down" aria-hidden="true"></i></a></b>
                        <ul class="level2 social-icons">
                            @can('release.create')
                            <li>
                                <a href="{{ route('create_articles')}}" role="button">
                                    {{ __('New Articles') }} <span class="caret"></span>
                                </a>
                            </li>
                            @endcan
                            <li>
                                <a class='pr-5' href="{{ route('my_acticles')}}" role="button">
                                    {{ __('My Articles') }} <span class="caret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('articlesFormStatus')}}" role="button">
                                    {{ __('Drafts ') }} <span class="caret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('release.publish')
                    <li class="droper"><b><a href="#">{{__("Admin Control")}}<i class="fa fa-angle-down" aria-hidden="true"></i></a></b>
                        <ul class="level2 social-icons">
                            <li>
                                <a href="{{ route('tags.index')}}" role="button">
                                    {{ __('Tags') }} <span class="caret"></span>
                                </a>
                            </li>
                            <li>
                                <a class='pr-5' href="{{ route('companies.index')}}" role="button">
                                    {{ __('Companies') }} <span class="caret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    
                    <li>
                        <b><a href="{{ route('home')}}" role="button">
                            {{ __('Back to Homepage') }} <span class="caret"></span>
                        </a></b>
                    </li>
                    <li>
                        <b><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a></b>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <h2>{{__("Our Social Network")}}</h2>
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <!-- End vertical menu -->
    </nav>
</header>
    <!-- End Header -->

    