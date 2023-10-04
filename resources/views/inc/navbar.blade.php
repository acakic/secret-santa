<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="https://justraspberry.com" target="_blank">
                <img src="/images/logo.svg" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/candidates">Candidates</a></li>
            </ul>
            <div>
                <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                    <!-- Authentication Links -->
                    <li><a href="/imsantato">I'm Santa to</a></li>
                    <li><a href="#">{{Auth::user()->name}}</a></li>
                    <li><a href="/logout"
                       onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
