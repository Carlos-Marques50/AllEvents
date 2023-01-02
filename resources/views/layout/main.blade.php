<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield("title")</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="{{ URL::asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('dist/css/adminlte.min.css')}}">
  <link rel="shortcut icon" href="{{asset('dist/img/logo.ico') }}" type='image/x-icon'>

</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{route("index")}}" class="navbar-brand">
        <img src="{{asset('dist/img/logo.ico')}}" alt="Carlos Marques-Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AllEvents</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">

          <li class="nav-item">
            <a href="{{route("index")}}" class="nav-link">Eventos</a>
          </li>
          
          <li class="nav-item">
            <a href="{{route("create")}}" class="nav-link">Criar Evento</a>
          </li> 
        
        @auth

          <li class="nav-item">
            <a href="{{route("dashboard")}}" class="nav-link">Meus Eventos</a>
          </li>

          <!--Logout(Adicionar Rota...)-->
          <li class="nav-item">
            <form action="{{route('sair')}}" method="post">
              @csrf
              <a href="{{route('sair')}}" class="nav-link" onclick="evento.preventDefault();this.closest('form').submit();">
                Sair
              </a>
            </form>
          </li>

        @endauth

        @guest
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Área Privada</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="login" class="dropdown-item">Login</a></li>
              <li><a href="register" class="dropdown-item">Cadastrar-se</a></li>
            </ul>
         </li>
        @endguest

        </ul>
          
        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3" method="GET" action="{{route("index")}}">
          
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="search" placeholder="Buscar Evento" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
  </nav>
  <!-- /.navbar -->

  @yield("content")
  
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Todos os directos reservados.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022-2023 <a href="https://www.facebook.com/marques.carlos.790">Carlos A.Marques</a></strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


</body>
</html>
