        @if (Route::has('login'))
            <style>
                .main-nav a {color:#fff; font-weight:600;}
                .nav>li {display:inline-block!important;}
            </style>
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
            <div style="height:95px;background:#003e7e;border-bottom:10px solid #0076c0;">
                <div style="position:absolute;top:5px;left:5px;"><a href="/home"><img src="{{asset('images/FAA_logo.png')}}" width="75" /><img src="{{asset('images/NDP_logo.png')}}" width="75" style="margin-left:10px;"/></a></div>
                <a href="/home"><h1 style="position:absolute;top:5px;left:180px;color:#fff;">FAA - NDP</h1></a>
                <div style="float:right;padding-top:20px;padding-right:20px;" class="main-nav">
                    <ul class="nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/reclass') }}">Reclass Tool</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                        </li>
                        <!--<a href="{{ url('/users') }}">User Management</a>-->
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <!--<a href="{{ route('register') }}">Register</a>-->
                    @endauth
                    </ul>
                </div>
            </div>
        @endif
