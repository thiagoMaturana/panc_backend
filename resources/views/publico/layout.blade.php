<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PANC APP</title>

  <!-- Favicons -->
  <link href="{{ asset('favicon.ico') }}" rel="icon">
  <link href="{{ asset('publico/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('publico/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('publico/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('publico/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('publico/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('publico/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('publico/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('publico/css/style.css') }}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

  <!-- =======================================================
  * Template Name: iPortfolio - v1.4.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{ asset('publico/img/logo.png') }}" alt="" class="img-fluid rounded-circle">
        @guest
        <h1 class="text-light">Panc App </h1>
        @else
        <h1 class="text-light text-center">{{ Auth::user()->name }} </h1>
        @if(Auth::user() && Auth::user()->isAdministrador())
        <p class="text-light text-center">Administrador</p>
        @endif
        @if(Auth::user() && Auth::user()->isComite())
        <p class="text-light text-center">Comitê de admissão</p>
        @endif
        @endguest


      </div>

      <nav class="nav-menu">
        <ul>
          @if(Auth::user() && (Auth::user()->isAdministrador() || Auth::user()->isComite()))
          <li><a href="{{ route('planta.paraAnalise') }}"><i class="bx bx-collection"> </i>Plantas para análise</a></li>
          @endif
          <li><a href="{{ route('planta.index') }}"><i class="bx bx-donate-blood"></i> <span>Plantas</span></a></li>

          @if(Auth::user())
          <li><a href="{{ route('planta.minhasPlantas') }}"><i class="bx bx-collection"> </i> 
          <span>Minhas plantas</span></a></li>
          
          <li><a href="{{ route('planta.create') }}"><i class="bx bx-add-to-queue"> </i> <span>Submeter planta</span></a></li>
          @endif

          <li><a href="{{ route('receita.index') }}"><i class="bx bx-donate-blood"></i> <span>Receitas</span></a></li>

          @if(Auth::user())
          <li><a href="{{ route('receita.minhasReceitas') }}"><i class="bx bx-collection"> </i> <span>Minhas receitas</span></a></li>

          <li><a href="{{ route('receita.create') }}"><i class="bx bx-add-to-queue"> </i> Cadastrar receita</a></li>
          @endif
          
          @if(Auth::user() && Auth::user()->isAdministrador())
          <li><a href="{{ route('user.index') }}"><i class="bx bx-lock"> </i> Painel Administrativo</a></li>
          @endif


          <li>
            @guest
            <a href="{{ route('login') }}"><i class='bx bx-log-in'></i>Login</a>

            @else
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();"><i class='bx bx-log-out'></i>
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            @endguest
          </li>

        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('publico/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('publico/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/typed.js/typed.min.js') }}"></script>
  <script src="{{ asset('publico/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('publico/js/main.js') }}"></script>

</body>

</html>