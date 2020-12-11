@extends('layouts.public.app')
@section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.min.css') }}">
        
@endsection
@section('content')
<a class="btn-comprar-flotante" href="{{ asset('rifa') }}">Comprar <br>Números</a>

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
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel1.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel1.jpg') }}" alt="Terraza con vistas"></a>  
       <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel2.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel2.jpg') }}" alt="comedor"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel3.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel3.jpg') }}" alt="Departamento y Piscina"></a> 
         
    </div>
     <div class="contenedor-videos wow slideInLeft">
              <video autoplay muted loop class="">
           <source src="{{ asset('videos/departamento-lujo.mp4') }}" type="video/mp4">
       </video> 
          
      </div>
    <div class="contenedor-fotos">
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel4.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel4.jpg') }}" alt="Piscinaefecto infinito"></a> 
          <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel5.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel5.jpg') }}" alt="Campo de Golf"></a> 
           <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('img/rapel7.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('img/rapel7.jpg') }}" alt="Departamento con vistas"></a>
    </div>
    <div class="contenedor-videos wow slideInLeft">
              <video autoplay muted loop class="">
           <source src="{{ asset('videos/alrededores.mp4') }}" type="video/mp4">
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
      
    </div>

     </div>
     <br>


  
  </main> <br> <br>
@endsection
@section('scripts')
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
        <script src="{{ asset('js/lightbox.min.js') }}"></script>
@endsection