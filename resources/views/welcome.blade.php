@extends('layouts.public.app')
@section('cont-header')
<a class="btn-comprar-flotante letras-btn" href="{{ asset('tienda-rifo-propiedades') }}">Comprar<br><i class="fas fa-shopping-cart" aria-hidden="true"></i> </a>

<div class="cont-header">
  <div class="cont-tittle">
      <h1 class="ml2">Rifa Departamento de Lujo</h1> <br>
      <p class="wow slideInLeft" data-wow-delay="0.6s">Confía en ti, cree en la suerte, desafía al destino y podrás ser el ganador ! Son 10 premios a repartir

      </p>
      <br> <br>
      <a href="{{ asset('tienda-rifo-propiedades') }}">Ver Propiedades <i class="far fa-building"></i></a> 
      <!--<a href="{{ asset('tienda-rifo-propiedades') }}">Quiero saber más</a>-->
  </div>

  <div class="cont-img wow fadeInUp" data-wow-delay="0.7s">
      <img src="{{ asset('images/GIF-home.gif') }}" alt="">
  </div>
</div>

<div class="circle"></div>
@endsection
@section('content')
<main class="cont-body ">
  <h2 class="wow fadeInRight">Este departamento puede ser tuyo</h2> 
  <div class="seccion1 swiper-container ">
      <div class="swiper-wrapper">
      <br>
        @foreach ($propiedades as $propiedad)
          @php
              $nombrePropiedad = str_replace(" ", "-", $propiedad->nombrePropiedad);
          @endphp
          <div class="cont-propiedades swiper-slide">
              <div class="cont-tour wow zoomIn" data-wow-delay="1s">
                  <h3>Tour 3D</h3>
                  <br>
                  <img src="{{ $propiedad->fotoPrincipal }}" alt="Propiedad en rifa">
                  <!--<iframe class="frame-mapa" src="{{ $propiedad->urlGoogleMaps }}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
              </div>

              <div class="cont-lista wow zoomIn" data-wow-delay="0.4s">
                  <h3>{{ $propiedad->nombrePropiedad }}</h3>
                  <h4><i class="fas fa-map-marker-alt"></i> {{ $propiedad->nombreComuna }},{{ $propiedad->nombreRegion }}</h4>
                  <p>{!! $propiedad->descripcionPropiedad !!}</p>
                  <p> <strong>Son {{ $propiedad->cantidadTotalPremios }} premios a repartir</strong> </p>
                  <br>
                  @if ($premios->where('idPropiedad',$propiedad->idPropiedad))
                    @php
                        $arraySinEdicion = $premios->where('idPropiedad',$propiedad->idPropiedad);
                        $primerValorPremios = $arraySinEdicion->shift();
                    @endphp
                    <ul>
                        <h4><i class="fas fa-award"></i> {{ $primerValorPremios['nombreTipoPremio'] }}</h4>
                        {!! $primerValorPremios['descripcion'] !!}
                    </ul> <br>
                    @foreach ($arraySinEdicion as $premio)
                      <ul>
                          <h4><i class="fas fa-money-bill-alt"></i> {{ $premio->nombreTipoPremio }}</h4>
                          {!! $premio->descripcion !!}
                      </ul><br>
                    @endforeach
                  @endif
                  <br> <br>
                  <a class="btn-tickets" href="{{ asset('rifo-propiedades/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedad->idPropiedad) }}">Quiero saber más</a>
                  <br> <br>
              </div>
          </div>
        @endforeach

      </div>
     <!-- <div class="swiper-pagination"></div> 
   <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div> -->
  </div>

  


</main>

<!--    <div class="contenedor-tarjetas-home">
<div class="tarjetas-home">
  <div class="imgBX">
<a href="detalle.html"> <img src="images/edificio - copia.jpg" alt=""> </a>
  </div>
  <div class="content-card-home">
<h2>Marina Golf Rapel</h2>
<p>Departamento de Lujo</p>
  </div>

</div>

<div class="tarjetas-home">
  <div class="imgBX">
      
<img src="images/edificio - copia.jpg" alt="">
  </div>
  <div class="content-card-home">
<h2>Card One</h2>
<p>Lorem ipsum, dolor</p>
  </div>
</div>

<div class="tarjetas-home">
  <div class="imgBX">
<img src="images/edificio - copia.jpg" alt="">
  </div>
  <div class="content-card-home">
<h2>Card One</h2>
<p>Lorem ipsum, dolor.</p>
  </div>
</div>

</div> -->


<div class="cont-seccion2">
  <div class="seccion-1">
      <img src="images/gif.gif" alt="" class="wow slideInLeft">
  </div>
  <div class="seccion-2">
      <h2 class="wow zoomIn">¿Cómo funciona Rifo Mi Propiedad?</h2>
      <p class="wow fadeInUp">Compra tu número a $20.000.- el sorteo será realizado en la notaría Manquehual, el cual será transmitido por Youtube Live, de este modo todos los compradores pueden asistir.</p>
  </div>
</div>

<div id="contacto"  class="cont-form">
  <div class="contenedor-form">
      <form action="{{ asset('enviar-consulta') }}" class="formulario-bottom" method="post">
        @csrf
          <h2 class="">CONTÁCTANOS</h2>
          <label for="nombre" class="form-label"></label>
          <input type="text" id="nombre" name="nombre" class="form-input-bottom" placeholder="Tu Nombre" required>
          
          <label for="correo" class="form-label"></label>
          <input type="email" name="correo" id="correo" class="form-input-bottom" placeholder="Correo Electr&oacute;nico">
          
          <label for="fono" class="form-label"></label>
          <input type="number" id="fono" name="fono" class="form-input-bottom" placeholder="Tel&eacute;fono">
          
          <label for="msg" class="azul form-label">Escribe tu mensaje a continuación</label>
          <textarea class="form-input" id="msg" cols="30" rows="5" name="consulta" > </textarea>
          
          <input type="submit" class="btn-submit-bottom" value="Solicita información">
      </form>
  </div>
</div>
@endsection
@section('scripts')
<script>
  
  var swiper = new Swiper('.swiper-container', {
      pagination: {
          el: '.swiper-pagination',
          type: 'progressbar',
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
  });
  
  

</script>

@endsection