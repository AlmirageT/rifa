@extends('layouts.public.app')

@section('content')
<main class="cont-body int-mobile">
  <h1 class="">Cada vez más cerca de ganar</h1>
  <br>
  
  <div class="cont-infoCarrito">
    <div class="resumenPropiedades"> 
      <div class="desglose">
        <div class="img-thumnail">
          <img src="images/edificio - copia.jpg" alt="">
        </div>
        <div class="cont-resumen-compra">
          <div class="resumen-compra">
            <h5>Departamento Marina Golf</h5>
            <p>Departamento de lujo</p>
          </div>
          <div class="resumen-compra">
            <h5>Precio Ticket</h5>
            <p>$20.000.-</p>
          </div>
  <div class="resumen-compra1">
    <form action="">
      <label for="numero" class="tamanoLetra"></label> <br> <br>
      <input type="number" id="numero" class="" placeholder="" value="1" min="1">
    
  </form>
  
  </div>
  <div class="resumen-compra2">
    <button class="btnTrash" type="submit"><i class="fas fa-trash-alt"></i></button>
  </div>
  </div>
  </div>
  <br>
  <div class="desglose">
    <div class="img-thumnail">
      <img src="images/edificio - copia.jpg" alt="">
    </div>
    <div class="cont-resumen-compra">
      <div class="resumen-compra">
      <h5>Departamento Marina Golf</h5>
      <p>Departamento de lujo</p>
    </div>
    <div class="resumen-compra">
      <h5>Precio Ticket</h5>
      <p>$20.000.-</p>
    </div>
    <div class="resumen-compra1">
      <form action="">
        <label for="numero" class="tamanoLetra"></label> <br> <br>
        <input type="number" id="numero" class="" placeholder="" value="1" min="1">
      
    </form>
    
    </div>
    <div class="resumen-compra2">
      <button class="btnTrash" type="submit"><i class="fas fa-trash-alt"></i></button>
    </div>
    </div>
    </div>
  <br>
    <div class="desglose">
      <div class="img-thumnail">
        <img src="images/edificio - copia.jpg" alt="">
      </div>
      <div class="cont-resumen-compra">
        <div class="resumen-compra">
        <h5>Departamento Marina Golf</h5>
        <p>Departamento de lujo</p>
      </div>
      <div class="resumen-compra">
        <h5>Precio Ticket</h5>
        <p>$20.000.-</p>
      </div>
      <div class="resumen-compra1">
        <form action="">
          <label for="numero" class="tamanoLetra"></label> <br> <br>
          <input type="number" id="numero" class="" placeholder="" value="1" min="1">
        
      </form>
      
      </div>
      <div class="resumen-compra2">
        <button class="btnTrash" type="submit"><i class="fas fa-trash-alt"></i></button>
      </div>
      </div>
      </div>
    </div>
  
  <div class="total">
    <h5>Resumen de la compra</h5>
  <p>TOTAL: $00.000.-</p>
  <button class="btnCompraCarrito" type="submit">Continuar compra</button>
  </div>
  
  </div>
  <br> <br>
  
    <br> <br>
  
  
  
  <br>
  
  
  
  
   </main>
@endsection
@section('scripts')
<script>
  $( document ).ready(function() {
      document.getElementById('contenido-cambio').classList.remove('cont-nav');
      document.getElementById('contenido-cambio').classList.add('cont-nav-int');
      
  });
  </script>
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
<script src="js/jquery.nice-number.js"></script>
    <script>
        $(function(){
    
    $('input[type="number"]').niceNumber();
    
    });
    </script>
@endsection