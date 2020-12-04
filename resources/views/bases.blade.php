@extends('layouts.public.app')
@section('content')
<header class="header">
    <div class="contenedor-menu logo-nav-contenedor">
        <a class="link-logo" href="{{ asset('/') }}" class="logo"><img class="img-logo" src="img/logo.png" alt=""></a>
   <span class="menu-icon" id="btnMenuIcon"><i class="fas fa-bars"></i></span> 
        <nav class="navegacion" id="navigation">
           <ul id="esconderMenu">
            <!--    <li><a href="#quienes-somos">Quienes Somos</a></li> -->
                  <!--  <li><a href="bases.html">Bases Legales</a></li> -->
                      <li><a href="{{ asset('propiedades') }}">Propiedad</a></li>
                <li><a href="{{ asset('rifa') }}">Rifa</a></li>
                <li><a href="{{ asset('galeria') }}">Galería</a></li>
                <li><a href="{{ asset('/') }}#contacto">Contacto</a></li>
           </ul>
   </nav>
    </div> 
</header>
  <main class="main">
        <div class="container">
    <br> 
   <div class="row align-items-center">
        <div class="col-lg-6 order-lg-1">
          <div class="p-5 linea padding">
                   <h2 class="display-4 azul ">Bases Legales</h2>
          </div>
        </div>
        <div class="col-lg-6 order-lg-2 ">
          <!--   <div class="p-5 linea-bottom">
         <p class="">Debes escoger la propiedad por la que deseas participar y 3 números por $20.000.- Cada uno. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> 

          </div>  -->
        </div>
      </div>
    
     </div>
     <br>

  <div class="contenedor-bases">
      <img class="base" src="{{ asset('assets/img/bases/1.png') }}" alt="">
       <img class="base" src="{{ asset('assets/img/bases/2.png') }}" alt="">
        <img class="base" src="{{ asset('assets/img/bases/3.png') }}" alt="">
         <img class="base" src="{{ asset('assets/img/bases/4.png') }}" alt="">
          <img class="base" src="{{ asset('assets/img/bases/5.png') }}" alt="">
           <img class="base" src="{{ asset('assets/img/bases/6.png') }}" alt="">
  </div>
  
  
  </main> <br> <br>
@endsection
