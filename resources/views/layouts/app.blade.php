<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') | Ikatan Alumni STABA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('css/one-page-wonder.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ url('images/logo.png') }}" alt="IKASTABA"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Tentang
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item"><a href="{{ url('tentang/selayang-pandang') }}">Selayang Pandang</a></li>
                  <li class="dropdown-item"><a href="{{ url('tentang/sambutan-ketua-ika') }}">Sambutan Ketua IKA</a></li>
                  <li class="dropdown-item"><a href="{{ url('tentang/ad-art') }}">AD/ART</a></li>
                  <li class="dropdown-item"><a href="{{ url('tentang/struktur-organisasi') }}">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Alumni
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item"><a href="{{ url('alumni/direktori') }}" class="nav-item">Direktori</a></li>
                  <li class="dropdown-item"><a href="{{ url('alumni/str-kta') }}" class="nav-item">Persyaratan STR/KTA</a></li>
                  <li class="dropdown-item"><a href="{{ url('alumni/str-mkti') }}" class="nav-item">Surat Tanda Registrasi MTKI</a></li>
                  <li class="dropdown-item"><a href="{{ url('alumni/register-email') }}" class="nav-item">Registrasi Email</a></li>
                </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('kontak')}}">Kontak</a>
            </li>
            @if(Auth::guest())
            <li class="nav-item">
                <a href="#" class="nav-link" role="button" data-toggle="modal" data-target="#login-modal"><span class="fa fa-user"></span>Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('register')}}"><span class="fa fa-sign-in">Register</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ url('dashboard')}}"><span class="fa fa-user">My Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('logout')}}"><span class="fa fa-sign-out">Logout</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>


    <header>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                @foreach(\App\Models\Banner::getHome(3) as $banner)
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                @endforeach
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                @foreach(\App\Models\Banner::getHome(3) as $banner)
                <div class="carousel-item active">
                  <img src="https://www.garnerheadjoints.com/wp-content/uploads/2014/08/headerlight.jpg" alt="">
                </div>

                <div class="carousel-item">
                  <img src="https://boredbyhappiness.files.wordpress.com/2013/08/vancouver1.jpg" alt="">
                </div>

                <div class="carousel-item">
                  <img src="http://tophitz.co.uk/wp-content/uploads/2017/03/Red-Right-Hand-Bamboozle-EP-Cover-Art-3000x500.jpg" alt="">
                </div>
                @endforeach
              </div>

              <!-- Left and right controls -->
              <a class="carousel-item-prev" href="#myCarousel" data-slide="prev">
                <span class="fa fa-next"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-item-next" href="#myCarousel" data-slide="next">
                <span class="fa fa-back"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Ikatan Alumni Sekolah Tinggi Bakti Asih Bandung</p>
        <p class="m-0 text-center text-white">Copyright &copy; 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    
                    <span>Login</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-remove" aria-hidden="true"></span>
                    </button>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form" action="{{ url('login') }}" method="post">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <span class="fa fa-chevron-right"></span>
                                <span id="text-login-msg">Email dan password.</span>
                            </div>
                            <input id="login_username" class="form-control" name="email" type="text" placeholder="Email" required>
                            <input id="login_password" class="form-control" name="password" type="password" placeholder="Password" required>
                            {{ csrf_field() }}
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember me
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-md btn-block">Login</button>
                            </div>
                            <div>
                                <a href="{{ url('password/reset') }}" class="btn btn-link">Lupa Password?</a>
                                <a href="{{ url('register') }}" class="btn btn-link">Register</a>
                            </div>
                        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>
    <!-- END # MODAL LOGIN -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  </body>

</html>
