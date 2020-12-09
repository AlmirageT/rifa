@extends('layouts.public.app')
@section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightbox.min.css') }}">
        
@endsection
@section('content')

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
      <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel1.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel1.jpg') }}" alt="Terraza con vistas"></a>  
       <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel2.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel2.jpg') }}" alt="comedor"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel3.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel3.jpg') }}" alt="Departamento y Piscina"></a> 
         <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel4.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel4.jpg') }}" alt="Piscinaefecto infinito"></a> 
          <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel5.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel5.jpg') }}" alt="Campo de Golf"></a> 
           <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel7.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel7.jpg') }}" alt="Departamento con vistas"></a>
            <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel8.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel8.jpg') }}" alt="Terraza con quincho"></a>  
       <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel9.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel9.jpg') }}" alt="Deportes acuáticos"></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/rapel3.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/rapel3.jpg') }}" alt="Departamento con vistas"></a> 

        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img1.jpeg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img1.jpeg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img2.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img2.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img3.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img3.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img4.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img4.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img5.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img5.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img6.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img6.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img7.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img7.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img8.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img8.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img9.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img9.jpg') }}" alt=""></a> 
        <a class="link-foto" data-lightbox="roadtrip" href="{{ asset('assets/img/img10.jpg') }}"><img class="galeria wow zoomIn" src="{{ asset('assets/img/img10.jpg') }}" alt=""></a> 

            
    </div>
    
    
    
    
     </div>
     <br>


  
  </main> <br> <br>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/lightbox-plus-jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
@endsection