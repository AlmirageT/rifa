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
        Rifopoly es una plataforma tecnológica que se dedica a la rifa de propiedades de lujo alrededor del mundo, de manera fácil y transparente, con un premio mayor y nueve premios en efectivo. <br>
        Mr. Rifopoly está convencido de que todos pueden desafiar a la suerte, sabe que las posibilidades de ganar son muy altas y por lo mismo quiere que todos participen. Siempre con un mensaje positivo, alegre y esperanzador.  <br>
        Además, uno de nuestros objetivos mediante esta rifa es poder ayudar a diferentes organizaciones que trabajan ayudando a la comunidad.  <br>
        ¡Te invitamos a participar!
    </p>
    <br>
    <p class="textoNosotros">¡Conoce nuestro equipo!</p>
    <br>
    <p class="textoNosotros"> Somos un equipo entretenido, dinámico y juvenil, conformado por profesionales de diferentes áreas que disfrutamos trabajar en equipo y unir diferentes metodologías de trabajo.</p>
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