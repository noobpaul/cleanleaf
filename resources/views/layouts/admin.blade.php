<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Clean Leaf International Corporation</title>

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <meta property="og:title" content="">
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        <meta property="og:site_name" content="">
        <meta property="og:description" content="">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="">
        <meta name="twitter:title" content="">
        <meta name="twitter:description" content="">
        <meta name="twitter:image" content="">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('home') }}" data-toggle="tooltip" title="Home"><img alt="CLean Leaf Logo" src="{{ asset('img/logo3.png') }}" class="ht100 center-block mgv15"></a>
                </div>
            </div>
            <div class="row mgb5">
                <div class="col-lg-12">
                    <img src="{{ asset($user->image) }}" class="img-responsive img-circle img-thumbnail ht30 mgr5">{{ $user->name }}
                    <div class="pull-right">
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out"></span>  Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="get" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li id="dashboard"><a href="{{ route('admin',$user->username) }}"><span class="fa fa-tachometer"></span> Dashboard</a></li>
                                <li><a data-toggle="collapse" href="#collapse1"><span class="fa fa-file-text"></span> Documents
                                @if(!$notifs->isEmpty())
                                 <span class="badge">{{ $notifs->count() }}</span>
                                @endif
                                <span class="caret"></span></a></li>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li id="jobOrder"><a href="{{ route('adminJobOrder',$user->username) }}" class="pdl30"><span class="fa fa-pencil-square"></span> Job Order
                                        @if(!$notifs->isEmpty())
                                         <span class="badge">{{ $notifs->count() }}</span>
                                        @endif
                                        </a></li>
                                    </ul>
                                </div>
                                <li id="articles"><a href="#"><span class="fa fa-book"></span> Articles</a></li>
                                <li id="accountExec"><a href="#"><span class="fa fa-address-book"></span> Account Executives</a></li>
                                @if($user->isAdmin())
                                <li id="website"><a href="#"><span class="fa fa-globe"></span> Website</a></li>
                                <li id="register"><a href="{{ route('adminRegisterView',Auth::user()->username) }}"><span class="fa fa-user"></span> Register Account</a></li>
                                @endif
                                <li id="settings"><a href="{{ route('adminSettings',$user->username) }}"><span class="fa fa-gear"></span> Settings</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">

                    @yield('content')

                </div>
            </div>
        </div>

        <!-- Required JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>

        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
        </script>

        @yield('scripts')

    </body>
</html>