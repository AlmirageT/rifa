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
<br>
<main class="cont-body int-mobile">
    <h1 class="ml2 tituloNosotros">Conócenos</h1>
    <br>
    <p class="textoNosotros">
        Rifopoly es la primera plataforma tecnológica en Chile que rifa propiedades de lujo, en donde las posibilidades de ganar son reales. Es transparente porque el sorteo se transmitirá en vivo el 3 de septiembre desde la notaría ante notario y testigos, puedes descargar las bases legales. <br>
        El sorteo vigente consiste en un Premio Mayor que es un departamento en Rapel a pasos del lago, incluye mobiliario, dos acciones en el campo de golf, palos de golf, moto de agua, estacionamiento, bodega, y $2.000.000 en efectivo. Un segundo lugar con premio de $2.000.000 y otros ocho premios más de $1.000.000.   <br>
        Junto a Mr. Rifopoly compartiremos alegría, esperanza y buena suerte para que puedas desafiar al destino y ser el ganador.
    </p>
    <br>
    <p class="textoNosotros">

        Somos un equipo de profesionales de distintas áreas,usamos la tecnología como herramienta, dinámicos y alegres. Queremos compartir los fondos con organizaciones de caridad.</p>
    <br>
    <p class="textoNosotros"> ¡Te invitamos a participar!</p>
    <br>
    <img class="imgNosotros" src="{{ asset('images/conocenos.jpg') }}" alt="">
    
</main>
@endsection
@section('scripts')
    <script>
        $( document ).ready(function() {
            if(screen.width >=1025 ){
                document.getElementById('contenido-cambio').style.color = "black";
                document.getElementById('contenido-cambio-1').style.color = "black";
                document.getElementById('contenido-cambio-2').style.color = "black";
                document.getElementById('contenido-cambio-3').style.color = "black";
            }
            if(screen.width < 1025){
                document.getElementById('colorNegro').style = 'filter: invert(0%);';
            }
        });
    </script>
@endsection