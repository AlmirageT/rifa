@extends('layouts.public.app')
@section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.min.css') }}">
        
@endsection
@section('content')
 <a class="btn-comprar-flotante letras-btn" href="{{ asset('rifa') }}">Comprar<br>Números <br><i class="fas fa-shopping-cart"></i> </a>


  <main class="main">
        <div class="container">
    <br> 
   <div class="row align-items-center">
        <div class="col-lg-6 order-lg-1 wow slideInLeft">
          <div class="p-5 linea padding">
                   <h2 class="display-4 azul ">Galería</h2>
          </div>
        </div>
        <div class="col-lg-6 order-lg-2 wow slideInUp">
        <div class="p-5 linea-bottom">
         <p class="">Disfruta el lujo de tener tu propio campo de golf. Este lugar es muy apetecido por sus atractivos turísticos y riquezas naturales tanto por chilenos como para extranjeros, ideal para vacacionar o arrendar por temporadas. </p> 

          </div>  
        </div>
      </div>
    
    <br>
    <div class="contenedor-fotos">
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/edificio.jpg') }}"><img class="galeria wow slideInUp" src="img/edificio.jpg" alt="Terraza con quincho"></a>  
       <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/comedor.jpg') }}"><img class="galeria wow slideInUp" src="img/comedor.jpg" alt="Deportes acuáticos"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/vista-terraza.jpg') }}"><img class="galeria wow slideInUp" src="img/vista-terraza.jpg" alt="Departamento con vistas"></a> 
         
    </div>
     <div class="contenedor-videos wow slideInLeft">
              <video autoplay muted loop class="">
           <source src="{{ asset('videos/departamento-lujo1.mp4') }}" type="video/mp4">
       </video> 
          
      </div>
    <div class="contenedor-fotos">
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/campos-golf.jpg') }}"><img class="galeria wow zoomIn" src="img/campos-golf.jpg" alt="Piscinaefecto infinito"></a> 
          <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/living.jpg') }}"><img class="galeria wow zoomIn" src="img/living.jpg" alt="Campo de Golf"></a> 
           <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/panoramica.jpg') }}"><img class="galeria wow zoomIn" src="img/panoramica.jpg" alt="Departamento con vistas"></a>
    </div>
    <div class="contenedor-videos wow slideInLeft">
              <video autoplay muted loop class="">
           <source src="{{ asset('videos/alrededores1.mp4') }}" type="video/mp4">
       </video> 
          
      </div> 
    <div class="contenedor-fotos">
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel8.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel8.jpg') }}" alt="Terraza con quincho"></a>  
       <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel9.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel9.jpg') }}" alt="Deportes acuáticos"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel3.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel3.jpg') }}" alt="Departamento con vistas"></a> 
    </div>
    <div class="contenedor-fotos">
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img1.jpeg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img1.jpeg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img2.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img2.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img3.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img3.jpg') }}" alt=""></a> 
    </div>
    <div class="contenedor-fotos">
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img4.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img4.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img5.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img5.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img6.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img6.jpg') }}" alt=""></a> 
    </div>
    <div class="contenedor-fotos">
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img7.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img7.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img8.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img8.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img9.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img9.jpg') }}" alt=""></a> 
    </div>
    <div class="contenedor-fotos">
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/img10.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/img10.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0819.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0819.JPG') }}" alt="comedor de vidrio"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0828.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0828.JPG') }}" alt="terraza"></a> 
    </div>

    <div class="contenedor-fotos">
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0829.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0829.JPG') }}" alt="galeria"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0833-2.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0833-2.JPG') }}" alt="sillon"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0834.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0834.JPG') }}" alt="cocina americana"></a> 
    </div>

    <div class="contenedor-fotos">
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0846.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0846.JPG') }}" alt="interior cocina"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0836.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0836.JPG') }}" alt="horno cocina"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0842.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0842.JPG') }}" alt="refrigerador"></a> 
    </div>

    <div class="contenedor-fotos">
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0854-2.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0854-2.JPG') }}" alt="cama 1 plaza"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0848.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0848.JPG') }}" alt="pieza"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0853.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0853.JPG') }}" alt="camas 1 plaza"></a> 
    </div>

    <div class="contenedor-fotos">
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0859.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0859.JPG') }}" alt="baño"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0867.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0867.JPG') }}" alt="living"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0870.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0870.JPG') }}" alt="sala central"></a> 
    </div>

    <div class="contenedor-fotos">
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0874.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0874.JPG') }}" alt="divan"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0912.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0912.JPG') }}" alt="cama 2 plazas"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0913.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0913.JPG') }}" alt="w.c"></a> 
    </div>

    <div class="contenedor-fotos">
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/IMG_0916.JPG') }}"><img class="galeria wow zoomIn" src="{{ asset('img/IMG_0916.JPG') }}" alt="balneareo"></a> 
    </div>
     </div>
     <br>


  
  </main> <br> <br>
@endsection
@section('scripts')
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
        <script src="{{ asset('js/lightbox.min.js') }}"></script>
@endsection