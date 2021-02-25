<!DOCTYPE html>
<html lang="en">
   <head>
   <link rel="icon" href="{{ asset('img/favicon.jpg') }}">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
      <link rel="stylesheet" href="{{ asset('css/style.css')}}">
      <title>Sendok</title>
   </head>
   <body id="body-pd">
      <div class="l-navbar" id="navbar">
         <nav class="nav">
            <div>
               <div class="nav__brand">
                  <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle" ></ion-icon>
                  <br>
                  <a href="#" class="nav__logo"><img class="nav__logo" src="{{ asset('img/logo.png') }}"></img></a>
               </div>
               <div class="nav__list">
                  <a href="#" class="nav__link active">
                     <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                     <span class="nav__name">Dashboard</span>
                  </a>
                  <a href="#" class="nav__link">
                     <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                     <span class="nav__name">Crear Cliente</span>
                  </a>
                  <a href="#" class="nav__link">
                     <ion-icon name="pencil-outline" class="nav__icon"></ion-icon>
                     <span class="nav__name">Crear Producto</span>
                  </a>
                  <a href="#" class="nav__link">
                     <ion-icon name="book-outline" class="nav__icon"></ion-icon>
                     <span class="nav__name">Crear Propuesta</span>
                  </a>
               </div>
            </div>
            <a href="{{ route('logout') }}" class="nav__link" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
               <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
               <span class="nav__name">Cerrar Sesión</span>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </a>
         </nav>
      </div>
      <!-- Se toma el contenido de la vista home.blade -->
      <div id="dashboard">
         <main class="py-4">
            @yield('content')
         </main>
      </div>
      <!-- fin de vista home.blade -->
      <!-- ===== IONICONS ===== -->
      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
      <!-- ===== Javascript del menu desplegable del dashboard ===== -->
      <script src="{{ asset('js/dashboard.js')}}"></script>
   </body>
</html>