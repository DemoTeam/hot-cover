
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hot videos</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/metro.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/1-col-portfolio.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Home</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/posts">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Hot Covers</a>
                    </li>
                    <li>
                        <a href="#">Hot Cosplay</a>
                    </li>
                    <li>
                        <a href="#">Questions & Answers</a>
                    </li>
                    <li>
                        {{ link_to_route('posts.create', 'Post new') }}
                    </li>
                </ul>
		<ul class="nav pull-right navbar-nav">
            	  @if(!Auth::check())
              		<li>{{ HTML::link('signup', 'Sign up') }}</li> 
              		<li>{{ HTML::link('login', 'Login') }}</li>
            	  @else
                    @if(Auth::user()->type == "Admin")
                        <li>{{ HTML::link('/admin', 'Admin Page') }}</li>
                    @endif
              		<li>{{ HTML::link('logout', 'Logout') }}</li>
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
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
