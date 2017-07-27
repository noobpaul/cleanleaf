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
    <div class="mgb50"></div>
    <div class="container">
        <div class="row mgb15">
            <div class="col-lg-3">
                <img src="{{ asset($user->image) }}" class="img-responsive img-circle img-thumbnail ht50 mgr5"><span class="fs20">{{ $user->name }}</span>
            </div>
            <div class="col-lg-3 col-lg-offset-6">
                <div class="pull-right">
                    <a href="{{ url('/logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          <span class="fa fa-sign-out"></span>  Logout
                      </a>

                      <form id="logout-form" action="{{ url('/logout') }}" method="get" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                </div>
            </div>
        </div>

        @yield('content')

    </div>

    <!-- Required JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>

    @yield('scripts')
    
  </body>
</html>