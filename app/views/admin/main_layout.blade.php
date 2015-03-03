<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sportluv</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('theme/css/clean-blog.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/custom.css')}}" rel="stylesheet">

    <link href="{{asset('theme/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/jquery-ui.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('additional_styles')

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top admin-nav">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::route('index')}}">Sport~Luv</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::guest())
                    <li>
                        <a href="{{URL::route('admin_add_post')}}">Create Post </a>
                    </li>
                    <li>
                        <a href="{{URL::route('admin_home')}}">View Posts</a>
                    </li>
                    <li>
                        <a href="{{URL::route('admin_logout')}}">Sign Out</a>
                    </li>
                @else
                    <li>
                        <a href="{{URL::route('index')}}">Blog </a>
                    </li>
                    <li>
                        <a href="#">Discussion Forum</a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
@yield('content')

<!-- jQuery -->
<script src="{{asset('theme/js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('theme/js/bootstrap.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('theme/js/clean-blog.js')}}"></script>

{{--Date Picker jAVASCRIPT--}}
<script src="{{asset('theme/js/jquery-ui.min.js')}}"></script>

{{--Date Picker jAVASCRIPT--}}
<script src="{{asset('theme/js/jquery-ui.min.js')}}"></script>

@yield('additional_scripts')

</body>
</html>
