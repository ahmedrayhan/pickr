<nav class="navbar navbar-default navbar-static-top" style="margin-bottom:0;">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Home
            </a>

        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav ">
                <li><a href="{{url('/search/wedding')}}">Wedding</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/search/family')}}">Family</a></li>
                        <li><a href="{{url('/search/corporate')}}">Corporate</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Commercial<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/search/product')}}">Product</a></li>
                        <li><a href="{{url('/search/advertisement')}}">Advertisement</a></li>
                    </ul>
                </li>
                <li><a href="{{url('/search/fashion')}}">Fashion</a></li>
            </ul>
            {!! Form::open(['url'=>'/search/photographer','class'=>'navbar-form navbar-left','role'=>'search']) !!}
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search photographer...">
                        <span class="input-group-btn"><button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button></span>
                    </div>
                </div>
            {!! Form::close()  !!}

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Sign In</a></li>
                    <li><a href="{{ url('/register') }}">Sign Up</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav-image" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative;padding-left: 40px;">
                            <img id="ndp" src="{{asset('images/avatars/'.Auth::user()->id.'/avatar.jpg')}}" class="nav-img err-img">
                            &nbsp;&nbsp;{{ Auth::user()->name }}<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{url('/profile')}}"><span style="margin-right: 10px;"><i class=" fa fa-user-circle" aria-hidden="true"></i></span>My Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                 <span style="margin-right: 10px;"><i class=" fa fa-power-off" aria-hidden="true"></i></span>Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>