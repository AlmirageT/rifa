@extends('layouts.public.app')
@section('content')
 <a class="btn-comprar-flotante letras-btn" href="{{ asset('rifa') }}">Comprar<br>Números <br><i class="fas fa-shopping-cart"></i> </a>


  <main class="main">
        <div class="container">
    <br> 
   <div class="row align-items-center">
        <div class="col-lg-6 order-lg-1">
          <div class="p-5 linea padding">
                   <h2 class="display-4 azul wow slideInLeft" data-wow-delay="0.4s">La Propiedad</h2>
          </div>
        </div>
        <div class="col-lg-6 order-lg-2 ">
          <!--   <div class="p-5 linea-bottom">
         <p class="">Debes escoger la propiedad por la que deseas participar y 3 números por $20.000.- Cada uno. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> 

          </div>  -->
        </div>
      </div>
     </div>
     <br> <br>
<div class="container">
    <h3></h3>
    
        <div class="row align-items-center">
            <div class="col-lg-7 wow slideInLeft">
            <h2 class="nombre-proyecto"><strong>Departamento Marina del Golf Rapel</strong></h2>
            <h4>Por $20.000.-</h4>
           <!-- <p class="texto-ubicacion">Propiedad tasada en 6.305UF</p> -->
            <p>Disfruta el lujo de tener tu propio campo de golf. Este lugar es muy apetecido por sus atractivos turísticos y riquezas naturales tanto por chilenos como para extranjeros, ideal para vacacionar o arrendar por temporadas. </p>
            <h5 class="nombre-proyecto">Características</h5>
            <ul class="list-caracteristicas">
                <li>Departamento de 113 m2</li>
                <li>2 Terrazas</li>
                <li>3 Dormitorios y 3 baños</li>
                <li>Living/Comedor</li>
                <li>Cocina integrada con mesón en granito</li>
                <li>1 Estacionamiento</li>
                <li>Bodega o dormitorio de servicio</li>
                <li>Seguridad 24 horas</li>
                <li>Piscina efecto infinito</li>
                 <li>Campo de Golf</li>
                 <li>Bosque de pinos</li>
            </ul> 
            <a href="{{ asset('rifa') }}" class="btn btn-success" role="button" aria-pressed="true">Comprar mis números</a>
            <br> <br>
        </div> 
            <!-- SLIDER -->
        <section class="col-lg-5 space wow slideInLeft">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img  src="{{ asset('img/rapel1.jpg') }}" class="d-block w-100 slide" alt="Terraza con vistas">
                </div>
                
                <div class="carousel-item">
                    <img src="{{ asset('img/rapel2.jpg') }}" class="d-block w-100" alt="Comedor">
                </div>
                
                <div class="carousel-item">
                    <img src="{{ asset('img/rapel3.jpg') }}" class="d-block w-100" alt="Departamento y piscina">
                </div>
            </div>
            
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div> 
        </section> 
        </div>

    <br>
    
</div>

        <div class="ubicacion"> <br>
        <h5 class="nombre-proyecto mapa"><strong>Ubicación</strong></h5> 
        <p class="mapa color"><strong>Las Cabras, Libertador Gral. Bernardo O.</strong></p>
        <div class="cont-mapa">
          <iframe class="frame-mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7464.443652546437!2d-71.46166354992337!3d-34.15193580340286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9663963e24368e23%3A0x8d9d7499f19dea9d!2sMarina%20Golf%20Rapel!5e1!3m2!1ses-419!2scl!4v1606831320033!5m2!1ses-419!2scl" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <br>
    </div>

  
  </main> <br> <br>
@endsection
