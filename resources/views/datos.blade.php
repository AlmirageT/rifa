@extends('layouts.public.app')
@section('content')

<main class="cont-body int-mobile">
    <div id="contacto"  class="cont-form-ticket">
        <div class="contenedor-form-ticket">
            <form method="post" action="{{ asset('comprar-numeros') }}" class="formulario-ticket">
                @csrf
                <h1 class="ml2">Tus Datos</h1>
                <label for="nombre" class="form-label"></label>
                <input type="text" id="nombre" name="nombreUsuario" class="form-input-ticket" placeholder="Tu Nombre">
                
                <label for="correo" class="form-label"></label>
                <input type="email" id="correo" name="correoUsuario" class="form-input-ticket" placeholder="Correo Electr&oacute;nico">
                
                <label for="fono" class="form-label"></label>
                <input type="number" id="fono" name="telefonoUsuario" class="form-input-ticket" placeholder="Tel&eacute;fono">
                
                <label for="rut" class="form-label"></label>
                <input type="text" id="rut" name="rutUsuario" class="form-input-ticket" placeholder="Tu Rut">
    
                <input type="submit" class="btn-submit-ticket" value="Finalizar Compra">
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
<script>
    $( document ).ready(function() {
        document.getElementById('contenido-cambio').classList.remove('cont-nav');
        document.getElementById('contenido-cambio').classList.add('cont-nav-int');
        
    });
</script>
@endsection
