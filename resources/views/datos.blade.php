@extends('layouts.public.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/jquery.nice-number.css') }}">
@endsection
@section('imagen-inicio')
<a href="{{ asset('/') }}"><img src="{{ asset('images/logo rifopoly_Mesa de trabajo 1.png') }}" alt=""></a>
@endsection
@section('content')

<main class="cont-body int-mobile">
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
    <h1 class="ml2">Cada vez más cerca de ganar</h1>
  <br>
  
  <div class="cont-infoCarrito">
    <div class="resumenPropiedades" id="resumenPropiedades">
      @if (Session::has('carritoCompra'))
        @foreach (Session::get('carritoCompra') as $key => $propiedadTicket)
          <div class="desglose">
            <div class="img-thumnail">
              @if ($propiedadTicket['imagenPropiedad'])
                <img src="{{ asset($propiedadTicket['imagenPropiedad']) }}" alt="">
              @else
              @endif
            </div>
            <div class="cont-resumen-compra">
              <div class="resumen-compra">
                <h5>{{ $propiedadTicket['nombrePropiedad'] }}</h5>
                {{-- <p>Departamentodelujo</p> --}}
              </div>
              <div class="resumen-compra">
                <h5>Precio Ticket</h5>
                <p>${{ number_format($propiedadTicket['valorRifa'],0,',','.') }}.-</p>
              </div>
              <div class="resumen-compra1">
                <form action="">
                  <label for="numero" class="tamanoLetra"></label> <br> <br>
                  <input type="number" id="{{ $propiedadTicket['idPropiedad'] }}" class="number-text-data" placeholder="" value="{{ $propiedadTicket['cantidad'] }}" min="1">
                </form>
              </div>
              <div class="resumen-compra2">
                <a class="btnTrash" href="{{ asset('eliminar-ticket-carrito') }}/{{ $propiedadTicket['idPropiedad'] }}" ><i class="fas fa-trash-alt"></i></a>
              </div>
            </div>
          </div>
          <br>
          <br>
        @endforeach
      @else
        <div class="desglose">
          <h1>No hay tickets comprados</h1>
        </div>
        <br>
        <br>
        <br>
        <br>
      @endif 
      <br>
    </div>
  
    <div class="total" id="totalResumen">
      @if (Session::has('total'))
        <form action="{{ asset('paso-final-compra-ticket') }}" method="get">
          <h5>Resumen de la compra</h5>
          <p id="totalFInal">TOTAL: ${{ number_format(Session::get('total'),0,',','.') }}.-</p>
          {{-- 
          <button class="btnCompraCarrito" type="submit">Continuar compra</button> --}}
        </form>
      @else
        <h5>Resumen de la compra</h5>
        <p>TOTAL: $00.000.-</p>
      @endif
      
    </div>
  
  </div>
<style>
  select {
    background: transparent;
    border: none;
    font-size: 14px;
    height: 37px;
    padding: 5px;
    width: 78px;
    position: absolute;
  }
  @media (min-width:1367px) and (max-width:1920px){
    .valor-numero{
      margin-left: 91px;
      width: 94.5% !important;
    }
  }
  @media (min-width:1000px) and (max-width:1366px){
    .valor-numero{
      margin-left: 91px;
      width: 92% !important;
    }
  }
  @media (min-width:640px) and (max-width:999px){
    .valor-numero{
      margin-left: 91px;
      width: 85% !important;
    }
  }
  @media (min-width:600px) and (max-width:639px){
    .valor-numero{
      margin-left: 91px;
      width: 78% !important;
    }
  }
  @media (min-width:516px) and (max-width:600px){
    .valor-numero{
      margin-left: 91px;
      width: 71% !important;
    }
  }
  @media (min-width:400px) and (max-width:515px){
    .valor-numero{
      margin-left: 91px;
      width: 77% !important;
    }
  }
  @media (min-width:300px) and (max-width:400px){
    .valor-numero{
      margin-left: 91px;
      width: 67% !important;
    }
  }
  
</style>

    <div id="contacto"  class="cont-form-ticket">
        <div class="contenedor-form-ticket">
              <form method="post" action="{{ asset('comprar-numeros') }}" class="formulario-ticket" target="_blank">
                @csrf
                <h1 class="ml2">Tus Datos</h1>
                <div align="center">
                  <small>Te llegará a tu correo y celular un mensaje donde podrás descargar el Ticket</small>
                </div>
                <label for="nombre" class="form-label"></label>
                <input type="text" id="nombre" name="nombreUsuario" class="form-input-ticket" placeholder="Tu Nombre"required >
                
                <label for="correo" class="form-label"></label>
                <input type="email" id="correo" name="correoUsuario" class="form-input-ticket" placeholder="Correo Electr&oacute;nico" required>
                
                <label for="fono" class="form-label"></label>
                <select name="codigoPais" >
                  @foreach ($codigosPaises as $codigoPais)
                      @if ($codigoPais->nombrePais == "Chile")
                        <option value="{{ $codigoPais->codigoPais }}" selected>{{ $codigoPais->codigoPais }}</option>
                      @else
                        <option value="{{ $codigoPais->codigoPais }}">{{ $codigoPais->codigoPais }}</option>
                      @endif
                  @endforeach
                </select>
                <input type="number" id="fono" name="telefonoUsuario" class="form-input-ticket valor-numero" placeholder="Tel&eacute;fono 987654321" min="111111111" max="999999999999999999" required>
                
                <label for="rut" class="form-label"></label>
                <input type="text" id="rut" name="rutUsuario" class="form-input-ticket" placeholder="RUT/DNI/Pasaporte" required>
    
                <button type="submit" class="btn-submit-ticket" id="desabilitarBoton" >Finalizar Compra</button>
              </form>
        </div>
    </div>
</main>
<br>
<br>
<br>
<br>
<br>
@endsection
@section('scripts')
<script src="{{ asset('js/jquery.nice-number.js') }}"></script>
<script>
    $(function(){
      
      $('.number-text-data').niceNumber({
          onIncrement: function ($currentInput, amount, settings) {
            $.get("{{ asset('obetener-valor-tickets') }}/"+$currentInput[0]['id']+"/"+amount,function(data, status){
              var total = data['nuevoValor'];
              total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
              total = total.split('').reverse().join('').replace(/^[\.]/,'');
              document.getElementById('totalFInal').innerHTML = 'TOTAL: $'+total+'.-';;
            });
          },
          onDecrement: function ($currentInput, amount, settings) {
            $.get("{{ asset('restar-valor-tickets') }}/"+$currentInput[0]['id']+"/"+amount,function(data, status){
              var total = data['nuevoValor'];
              total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
              total = total.split('').reverse().join('').replace(/^[\.]/,'');
              document.getElementById('totalFInal').innerHTML = 'TOTAL: $'+total+'.-';;
            });
          },
      });
      
    });
  </script>
<script>
    $( document ).ready(function() {
        /*
        document.getElementById('contenido-cambio').classList.remove('cont-nav');
        document.getElementById('contenido-cambio').classList.add('cont-nav-int');*/
        if(screen.width >=1025 ){
          document.getElementById('contenido-cambio').style.color = "black";
          document.getElementById('contenido-cambio-1').style.color = "black";
          document.getElementById('contenido-cambio-2').style.color = "black";
          document.getElementById('contenido-cambio-3').style.color = "black";
          document.getElementById('contenido-cambio-4').style.color = "black";
          document.getElementById('contenido-cambio-5').style.color = "black";
      }
      if(screen.width < 1025){
          document.getElementById('colorNegro').style = 'filter: invert(0%);';
      }

        timeout();

    });
    function timeout() {
        setTimeout(function () {
            $.get('{{ asset('revisar-estado-boleta') }}',function(data, status) {
                if(data == true){
                    window.location.href='{{ asset('felicidades-por-su-compra') }}';
                }else{
                  document.getElementById('resumenPropiedades').innerHTML = '';
                  document.getElementById('totalResumen').innerHTML = '';
                  document.getElementById('resumenPropiedades').innerHTML = `
                    <div class="desglose">
                      <h1>No hay tickets comprados</h1>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                  `;
                  document.getElementById('totalResumen').innerHTML = `
                    <h5>Resumen de la compra</h5>
                    <p>TOTAL: $00.000.-</p>
                  `;

                }
            });
            timeout();
        }, 10000);
    }


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
