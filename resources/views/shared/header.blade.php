<header class="clearfix">
    <div class="top-line">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-9">
                    <ul class="info-list">
                        <li>
                        <span class="live-time"><i class="fa fa-calendar-o"></i>{{Carbon\Carbon::now()->isoFormat('dddd, MMMM Do YYYY')}}</span>
                        </li>
                        <li>
                            <a href="about.html">{{__("About Us")}}</a>
                        </li>
                        <li>
                            <a href="contact.html">{{__("Contact Us")}}</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-md-4 col-sm-3" id="header_control">
                    <ul class="social-icons">
                        @guest
                        <li>
                            <b><a href="{{route('create_step1')}}">{{__('Request Release')}}</a></b>
                        </li>
                        &nbsp;
                        <li>
                            <b><a href="#" data-toggle="modal" data-target="#loginModal">{{__('Login')}}</a></b>
                        </li>
                        @else
                        @if(Auth::user()->roles[0]->slug == 'company')
                            <li>
                                <a href="{{ route('my_acticles')}}" role="button">
                                    <b>{{ __('My Profile') }} <span class="caret"></span></b>
                                </a>
                            </li>
                        @elseif(Auth::user()->roles[0]->slug == 'editor')
                            <li>
                                <a href="{{ route('articlesFormStatus')}}" role="button">
                                    <b>{{ __('My Profile') }} <span class="caret"></span></b>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('my_account')}}" role="button">
                                    <b>{{ __('My Profile') }} <span class="caret"></span></b>
                                </a>
                            </li>
                        @endif
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
    <div class="header-banner-place p-0">
        <div class="row justify-content-center align-self-center">
            <a class="navbar-brand align-middle" href="{{route('home')}}" title="MiniberiMAG Politics">
            <img src="/images/banner-logo.png" alt="MiniberiMAG Politics">
            </a>
		</div>
	</div>
    @include('shared.navbar-header-box')

</header>
<!-- End Header -->