<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>PANC APP</title>

    <link href="/sass/app.scss" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn-sm order-1 order-lg-0 px-3" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="index.html">Panc App</a>
        <ul class="navbar-nav ml-auto ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    @guest
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    @endif

                    @else
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                                        document.getElementById('logout-form').submit();">
                        {{ _('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Plantas</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlantas" aria-expanded="false" aria-controls="collapsePlantas">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Plantas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePlantas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href=" {{ route('planta.listAll') }} ">Listar</a>
                                <a class="nav-link" href="{{ route('planta.create') }} ">Cadastrar</a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">Receitas</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReceitas" aria-expanded="false" aria-controls="collapseReceitas">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Receitas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseReceitas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href=" {{ route('receita.listAll') }} ">Listar</a>
                                <a class="nav-link" href=" {{ route('receita.create') }} ">Cadastrar</a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">Usuários</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Usuários
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseUsuarios" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href=" {{ route('user.listAll') }} ">Listar</a>
                                <a class="nav-link" href=" {{ route('user.create') }} ">Cadastrar</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
    <script src="assets/jquery/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>  
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/datatables-demo.js"></script>
</body>

</html>