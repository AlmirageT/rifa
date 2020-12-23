@extends('layouts.public.app')
<style type="text/css">
  .imagen-baseslegales{
    height: 200%;
    width: auto;
  }
</style>
@section('content')

  <main class="main">
      <div class="container">
        <br> 
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-1">
            <div class="p-5 linea padding">
                     <h2 class="display-4 azul ">Bases Legales</h2>
            </div>
          </div>
          
        </div>
    
     </div>
     <br>
  <div class="contenedor-bases">
         <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0004.jpg') }}" alt="">
          <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0005.jpg') }}" alt="">
           <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0006.jpg') }}" alt="">
           <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0007.jpg') }}" alt="">
       <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0008.jpg') }}" alt="">
        <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0009.jpg') }}" alt="">
         <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0010.jpg') }}" alt="">
          <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0011.jpg') }}" alt="">
           <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0012.jpg') }}" alt="">
           <img class="base imagen-baseslegales" src="{{ asset('img/bases/bases_legales_page-0013.jpg') }}" alt="">
  </div>
  
  
  </main> <br> <br>
@endsection
