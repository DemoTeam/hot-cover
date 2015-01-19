<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="{{ asset('images/site-icon.png') }}"/>
    <title>Hot cover</title>

    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/star-rating.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-markdown.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('css/like_and_dislike.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="{{ asset('css/1-col-portfolio.css') }}" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/star-rating.js') }}"></script>
    @include('partials.like_and_dislike')
    <script src="{{ asset('js/bootstrap-markdown.js') }}"></script>
    <script src="{{ asset('js/jquery.timeago.js') }}"></script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                    <a href='{{ URL::route("index") }}'><span class="glyphicon"><img src="{{ asset('images/logo-site.png') }}" style="max-width:45px;"></span></a>
                </a>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                {{ link_to_action('IndexController@index', 'Home', array(), array('class' => 'navbar-brand')) }}
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        {{ link_to_route('posts.index', 'Photos / Clips') }}
                    </li>
                    <li>
                        {{ link_to_route('questions.index', 'Tech / Q&A') }}
                    </li>
                </ul>
		        <ul class="nav pull-right navbar-nav">
            	  @if(!Auth::check())
              		<li>{{ HTML::link('signup', 'Sign up') }}</li> 
              		<li>{{ HTML::link('login', 'Login') }}</li>
            	  @else
                    @if(Auth::user()->type == "Admin")
                        <li>{{ HTML::link('/admin', "Admin's Page") }}</li>
                    @endif
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i>{{ link_to_route('leech_photos.index', 'My clipboad') }}</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i>{{ link_to_route('users.show', 'Profile') }}</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i>{{ link_to_route('users.edit', 'Settings', array(Auth::user()->id)) }}</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            {{ HTML::link('logout', 'Logout') }}<i class="fa fa-fw fa-power-off"></i>
                        </li>
                    </ul>
                </li>
            	  @endif
          	</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div>
            @if (Session::has('message'))
                <div class="flash bg-danger alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
        </div>
        <div>
            @yield('content')
        </div>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; HoangQuan Website 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
</body>

</html>
