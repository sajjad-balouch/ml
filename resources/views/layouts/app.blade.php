<!DOCTYPE html>

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>{{env('APP_NAME')}}</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Event and Conference Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Eventre HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="eventre" />
  
  <!-- PLUGINS CSS STYLE -->
  <!-- Bootstrap -->
  <link href="{{asset('public/front/plugins/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('public/front/plugins/font-awsome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Magnific Popup -->
  <link href="{{asset('public/front/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
  <!-- Slick Carousel -->
  <link href="{{asset('public/front/plugins/slick/slick.css')}}" rel="stylesheet">
  <link href="{{asset('public/front/plugins/slick/slick-theme.css')}}" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{asset('public/front/css/style.css')}}" rel="stylesheet">

  <!-- FAVICON -->
  <link href="{{asset('public/front/images/favicon.png')}}" rel="shortcut icon">

</head>

<body class="body-wrapper">
<!--========================================
=            Navigation Section            =
=========================================-->
<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
  <div class="container-fluid p-0">
    <!-- logo -->
    <a class="navbar-brand" href="{{url('/')}}">
      <img src="{{asset('public/front/images/logo-1.png')}}" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown active">
          <a class="nav-link" href="{{url('/')}}">Home
            <span>/</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About
            <span>/</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#plans">Plans<span>/</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#sponsors">Sponsors<span>/</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#reg">Certified</a>
        </li>
      </ul>
      <a href="{{route('register')}}" class="ticket">
        <i class="fa fa-user fa-2x" style="color:white; margin-right: 10px;"></i>
        <span>Register Now</span>
      </a>
    </div>
  </div>
</nav>
<!--====  End of Navigation Section  ====-->
@yield('content')

<!--============================
=            Footer            =
=============================-->

<!-- Subfooter -->
<footer class="subfooter">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <div class="copyright-text">
          <p><a href="{{url('/')}}">Allied Funds</a> &copy; 2025</a></p>
        </div>
      </div>
      <div class="col-md-6">
        <a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
      </div>
    </div>
  </div>
</footer>


  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="{{asset('public/front/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('public/front/plugins/bootstrap/bootstrap.min.js')}}"></script>
  <!-- Shuffle -->
  <script src="{{asset('public/front/plugins/shuffle/shuffle.min.js')}}"></script>
  <!-- Magnific Popup -->
  <script src="{{asset('public/front/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
  <!-- Slick Carousel -->
  <script src="{{asset('public/front/plugins/slick/slick.min.js')}}"></script>
  <!-- SyoTimer -->
  <script src="{{asset('public/front/plugins/syotimer/jquery.syotimer.min.js')}}"></script>
  <script src="{{asset('public/front/js/script.js')}}"></script>
</body>

</html>
