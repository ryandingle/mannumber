<header class="main-header">
    <a href="{{ url('/') }}" class="logo">
        <span class="logo-mini"><b>M</b>N</span>
        <span class="logo-lg"><b>{{ config('app.name', 'Laravel') }}</b></span>
    </a>
    <nav class="navbar navbar-fixed-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <b class="name">{{ Auth::user()->name }} <span class="caret"></span></b>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('account') }}">
                            <i class="fa fa-user"></i>&nbsp;&nbsp;Account 
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout 
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>