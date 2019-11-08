<header class="clearfix">    
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
					<a href="#" class="open-menu"><i class="fa fa-align-justify" aria-hidden="true"></i></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <span class="navbar-brand live-time">&nbsp;{{Auth::user()->name}}</span>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item drop-link">
                                <img src="/images/logoreal6.png" alt="">
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

				<!-- vertical menu -->
				<div class="vertical-box">
					<h2><a class="text-white food" href="{{ route('my_account')}}">{{Auth::user()->name}}</a></h2>
					<a href="#" class="close-menu"><i class="fa fa-window-close" aria-hidden="true"></i></a>
					<ul class="vertical-menu">
                        <li>
                            <b><a href="{{ route('my_account')}}" role="button">
                                {{ __('News') }} <span class="caret"></span>
                            </a></b>
                        </li>
                        <li class="droper"><b><a href="#">{{__("Account")}}<i class="fa fa-angle-down" aria-hidden="true"></i></a></b>
							<ul class="level2 social-icons">
                                <li>
                                    <a href="{{ route('my_account_edit')}}" role="button">
                                        {{ __('Edit Profile') }} <span class="caret"></span>
                                    </a>
                                </li>
							</ul>
						</li>
						<li class="droper"><b><a href="#">{{__("Articles")}}<i class="fa fa-angle-down" aria-hidden="true"></i></a></b>
							<ul class="level2 social-icons">
                                <li>
                                    <a href="{{ route('articles.create')}}" role="button">
                                        {{ __('New Articles') }} <span class="caret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('my_acticles')}}" role="button">
                                        {{ __('My Articles') }} <span class="caret"></span>
                                    </a>
                                </li>
							</ul>
                        </li>
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