@extends('layouts.public.app')
@section('imagen-inicio')
<a href="{{ asset('/') }}"><img src="{{ asset('images/logo rifopoly_Mesa de trabajo 1.png') }}" alt=""></a>
@endsection
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<main class="cont-body int-mobile">
    <h1 class="ml2">Formas de Pago</h1>
    <br>
    <div class="contFormasPago">
        <p>Recuerda siempre agregar tu datos completos y seguirnos en redes sociales para que te enteres de las novedades  de la rifa, los números por cualquier forma de pago se seleccionan por sistema al azar, cada ticket tienen un código QR y se asocia al rut ingresado como titular:</p>
        <br>
        <div class="contCompraOnLine">
        <p><strong>1.Compra online</strong></p><form action="{{ asset('compra-ticket-directo') }}/{{ $propiedades->first()->idPropiedad }}" method="POST"> @csrf <input type="hidden" name="numero" value="1" min="1"> <button class="btnAqui" style="cursor: pointer">aquí</button></form>
        </div> <br>
        <p><strong>2.Transferencia electrónica o depósito.</strong>  <br> Puedes realizarlo siempre enviando comprobante de pago al WhatsApp y mail registrado.</p>
            <br>    
        <ul>
                <h4>Datos Bancarios</h4>
                <li>Nombre :INMOBILIARIA MOOCK SpA</li>
                <li>Rut: 76.454.378-5</li>
                <li>Numero de cuenta: 0220844303</li>
                <li>Banco Itau cuenta corriente</li>
                <li>Mail: tickets@rifomipropiedad.com</li>
            </ul> <br>
            <p> <strong>3.Compra física</strong>  <br>Puedes visitarnos para la compra en <strong>Avenida Tobalaba 4067 local 101, Providencia</strong>, a pasos del metro Francisco Bilbao, un asistente te ayudará.</p> 
    
    </div>
</main>
@endsection
@section('scripts')
<script>
    $( document ).ready(function() {
        /*
        document.getElementById('contenido-cambio').classList.remove('cont-nav');
        document.getElementById('contenido-cambio').classList.add('cont-nav-int');*/
        document.getElementById('contenido-cambio').style.color = "black";
        document.getElementById('contenido-cambio-1').style.color = "black";
        document.getElementById('contenido-cambio-2').style.color = "black";
    });
</script>
<script>
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml2');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: false})
    .add({
      targets: '.ml2 .letter',
      scale: [4,1],
      opacity: [0,1],
      translateZ: 0,
      easing: "easeOutExpo",
      duration: 950,
      delay: (el, i) => 70*i
    });
    $(document).ready(function() {
        // Inicializando WOW
        new WOW().init();
    });
  </script> 
@endsection