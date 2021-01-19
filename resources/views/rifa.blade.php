@extends('layouts.public.app')
@section('css')
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/lightbox.min.css">
<link rel="stylesheet" href="css/jquery.nice-number.css">
@endsection

@section('content')
<main class="cont-body int-mobile">

    <h1 class="ml2">Marina Golf Rapel</h1>
    <br>
    <div class="swiper-container">
        <div class="swiper-wrapper">
    <div class="contenedor-galeria swiper-slide">
        <div class="img1">
   <!-- <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a>  -->
    <div class="contenedor-videos wow zoomIn">
        <video controls>
            <source  src="videos/marina-golf.mp4">
        </video>
         
     </div>
    </div>
    <div class="mosaic">
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
    </div>
    </div>

    <div class="contenedor-galeria swiper-slide">
        <div class="img1">
    <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
    </div>
    <div class="mosaic">
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
        <a href="images/edificio.jpg" data-lightbox="roadtrip"><img src="images/edificio.jpg" alt=""></a> 
    </div>
    </div>
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>

<br>
<div class="flotante-compra" id="btn-flotante">
    <form action="">
        <label for="numero" class="tamanoLetra">Cantidad</label> <br> <br>
        <input type="number" id="numero" class="" placeholder="" value="1" min="1">
        <br> <br>
        
        <p class="tamanoLetra">TOTAL: $20.000.-</p>
        <div class="cont-botonesCompra">
        <button class="btnCompra" type="submit">Comprar ahora</button>
        <button class="btnCarrito" type="submit">Agregar al carrito</button>
    </div>
    </form>
</div> 
    <br>
    <div class="cont-detalles" id="cont-detalles">
    <p class="text-detail wow fadeInLeft" data-wow-delay="0.4s">Departamento de lujo en Marina Golf Rapel</p>
    <p class="text-detail wow fadeInLeft" data-wow-delay="0.4s"><i class="fas fa-map-marker-alt"></i> Las Cabras, Libertador Gral. Bernardo O.</p>
    <ul class="share-detail margen">
        <li><a href=""><i class="fab fa-facebook-square wow bounceIn" data-wow-delay="0.4s"></i></a></li>
        <li><a href=""><i class="fab fa-twitter wow bounceIn" data-wow-delay="0.6s"></i></a></li>
    </ul>
    <hr>
<br>
    <p class="text-detail wow fadeInLeft" data-wow-delay="0.6s">Disfruta de una vista privilegiada con lago y bosque de pinos los cuales puedes recorrer y desconectarte de la rutina. Incluye además acciones en el campo de golf. Este lugar es muy apetecido por sus atractivos turísticos y riquezas naturales tanto para chilenos como para extranjeros, ideal para vacacionar o arrendar por temporadas.
    </p> <br>
    <ul class="text-detail wow fadeInLeft" data-wow-delay="0.7s">
        <li><i class="fas fa-building"></i> Departamento de 113 m2.</li>
        <li><i class="fas fa-sun"></i> 2 terrazas con vistas a los alrededores.</li>
        <li><i class="fas fa-bed"></i> 3 amplios dormitorios y el principal en suite</li>
        <li><i class="fas fa-couch"></i> Living/Comedor</li>
        <li><i class="fas fa-utensils"></i> Cocina integrada con mesón en granito</li>
        <li><i class="fas fa-parking"></i> Estacionamiento</li>
        <li><i class="fas fa-puzzle-piece"></i> Bodega o dormitorio de servicio</li>
        <li><i class="fas fa-lock"></i> Seguridad 24 horas</li>
        <li><i class="fas fa-swimmer"></i> Piscina con efecto infinito</li>
        <li><i class="fas fa-golf-ball"></i> Campos de golf</li>
        <li><i class="fas fa-tree"></i> Bosque de pinos</li>
        <li><i class="fas fa-layer-group"></i> Ascensor habilitado</li>
    </ul> <br>
    <a class="download" href="pdf/bases_legales_page-0004.pdf" download="BasesLegalesMarinaGolf">Descargar bases legales</a>

</div>
<br>
<div class="cont-matterport">
    <h2>Tour 3D</h2>
<img src="images/edificio.jpg" alt="">
</div>

<br>
<div class="cont-premios-detail">
    <h2>Premios</h2>
    <div class="cont-premios">
        <img src="images/premio-mayor.png" alt="">
        <img src="images/premios.png" alt="">
        <img src="images/premio-final.png" alt="">
    </div>

    <br>

</div>

<div class="ubicacion">
    <br>
    <h2><strong>Ubicación</strong></h2> 
    <h3 class="sub-direccion">Las Cabras, Libertador Gral. Bernardo O.</h3> <br>
    <div class="cont-mapa">
        <iframe class="frame-mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7464.443652546437!2d-71.46166354992337!3d-34.15193580340286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9663963e24368e23%3A0x8d9d7499f19dea9d!2sMarina%20Golf%20Rapel!5e1!3m2!1ses-419!2scl!4v1606831320033!5m2!1ses-419!2scl" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <br>
</div>
</main>
<br>
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
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
<script src="js/scroll-btn.js"></script>
<script src="js/lightbox-plus-jquery.min.js"></script>
<script src="js/lightbox.min.js"></script>
<script src="js/jquery.nice-number.js"></script>

<script>
    $(function(){

$('input[type="number"]').niceNumber();

});
</script>
@endsection