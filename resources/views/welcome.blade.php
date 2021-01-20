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
      <img src="{{ asset('images/gif2.gif') }}" alt="">
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
          <div class="cont-propiedades swiper-slide">
              <div class="cont-tour wow zoomIn" data-wow-delay="1s">
                  <h3>Tour 3D</h3>
                  <br>
                  <img src="images/edificio.jpg" alt="">
              </div>

              <div class="cont-lista wow zoomIn" data-wow-delay="0.4s">
                  <h3>Marina Golf Rapel</h3>
                  <p><i class="fas fa-map-marker-alt"></i> Las Cabras, Libertador Gral. Bernardo O.</p>
                  <p>Departamento de lujo totalmente amoblado de 113 m2 aprox, 3 baños, con dos terrazas, estacionamiento, bodega tipo dormitorio y piscina con efecto infinito.</p>
                  <p> <strong>Son 10 premios a repartir</strong> </p>
                  <br>
                  <ul>
                      <h4>Premio Mayor</h4>
                      <li>Departamento de lujo</li>
                      <li>2 acciones en el campo de golf</li>
                      <li>Kit palos de golf</li>
                      <li>Moto de agua</li>
                      <li>$2.000.000.- en efectivo</li>
                  </ul> <br>
                  <ul>
                      <h4>Primer Premio</h4>
                      <li>$2.000.000.- en efectivo</li>
                  </ul><br>
                  <ul>
                      <h4>Segundo Premio</h4>
                      <li>8 Premios de <strong>$1.000.000.-</strong></li>
                  </ul>
                  <br> <br>
                  <a class="btn-tickets" href="{{ asset('tienda-rifo-propiedades') }}">Quiero saber más</a>
                  <br> <br>
              </div>
          </div>

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