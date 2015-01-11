<html>
  <head><link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.2.0/css/bootstrap.css"></head>
  {{ HTML::style('css/common.css')}}
  <header class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner navbar-inner-customize">
      <div class="container wrap-header wrap-header-customize">
        {{ HTML::link('#', 'Logo') }}
        <nav>
          <ul class="nav pull-right">
            @if(!Auth::check())
              {{ HTML::link('signup', 'Sign up') }} |
              {{ HTML::link('login', 'Login') }}
            @else
              {{ HTML::link('users', 'Users') }}|
              {{ HTML::link('posts', 'Posts') }}|
              {{ HTML::link('logout', 'Logout') }}
            @endif
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <body style="padding-top: 50px">
    <div class="container">
        @if (Session::has('message'))
            <div class="flash bg-danger alert">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
        @yield('main')
    </div>
    <div>
      <div id="wrap">@yield('content')</div>
    </div>
  </body>
</html>
