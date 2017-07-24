<header id="header">
  <div class="container">
  
    <div id="logo" class="pull-left">
      <a href="index.html"><img src="img/logo2sample.png" alt="" title="" /></img></a>
    </div>
      
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li><a href="#about">About Us</a></li>
        <li><a href="#features">Services</a></li>
        <li><a href="#portfolio">Facilities and Equipments</a></li>
        <li><a href="#team">Officers</a></li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
    </nav><!-- #nav-menu-container -->
    
    <nav class="nav social-nav pull-right hidden-sm-down">
      @if(Auth::guest())
        <button class="btn btn-default" data-toggle="modal" data-target="#login">Log In</button>
      @else
        <div class="dropdown">
          <a href="!#" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel">
            <li><a href="{{ route('admin',Auth::user()->username) }}">Admin Page</a></li>
            <li><a href="{{ route('adminSettings',Auth::user()->username) }}">Account Settings</a></li>
            <li>
              <a href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <span class="fa fa-sign-out"></span>  Logout
              </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="get" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </div>
      @endif
    </nav>
  </div>
</header>