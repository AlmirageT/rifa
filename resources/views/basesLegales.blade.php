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
    <h1 class="ml2">Bases Legales</h1>
    <br>
    
    <div class="cont-bl">
        <img src="images/bases/bases_legales_page-0004.jpg" alt="">
        <img src="images/bases/bases_legales_page-0005.jpg" alt="">
        <img src="images/bases/bases_legales_page-0006.jpg" alt="">
        <img src="images/bases/bases_legales_page-0007.jpg" alt="">
        <img src="images/bases/bases_legales_page-0008.jpg" alt="">
        <img src="images/bases/bases_legales_page-0009.jpg" alt="">
        <img src="images/bases/bases_legales_page-0010.jpg" alt="">
        <img src="images/bases/bases_legales_page-0011.jpg" alt="">
        <img src="images/bases/bases_legales_page-0012.jpgs" alt="">
    </div>
</main>

@endsection

@section('scripts')
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
    
</script>
@endsection