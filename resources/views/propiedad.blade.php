@extends('layouts.public.app')
@section('css')
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/lightbox.min.css">
<link rel="stylesheet" href="css/jquery.nice-number.css">
@endsection

@section('content')
<main class="cont-body int-mobile">
    <h1 class="ml2">Escoge la rifa que quieres ganar</h1>
    <br>
    <form class="form-buscar wow slideInLeft" data-wow-delay="0.4s">
        <input class="form-control-buscar lg-12" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn-buscar" type="submit">Buscar</button>
      </form>
    <br>
    
      <!--  <div class="cont-tarjetas">
    <div class="tarjeta wow fadeInUpBig" data-wow-delay="0.6s"> 
       <div>
           <ul class="share">
               <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
               <li><a href=""><i class="fab fa-twitter"></i></a></li>
           </ul>
           <p class="precio">$20.000.-</p>
           <img src="images/edificio.jpg" alt="">
        </div>
       <div class="text-tarjeta">
           <h3>Lorem, ipsum.</h3>
           <p><i class="fas fa-map-marker-alt"></i> Ubicación</p>
           <p>Lorem ipsum dolor sit amet consectetur.</p>
           <div>
               <ul>
                   <li><i class="fas fa-home"></i> x.xxx UF</li>
                   <li><i class="fas fa-bed"></i> 3 Dorm</li>
                   <li><i class="fas fa-bath"></i> 2 Baños</li>
                   <li><i class="fas fa-gift"></i> Regalos Sorpresa</li>
               </ul>
           </div>
    </div> <br>
    <a class="btn-tickets-int" href="detalle.html">Detalles</a>
    </div> <br>
    <div class="tarjeta wow fadeInUpBig" data-wow-delay="0.8s">
        <div>
            <ul class="share">
                <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
            </ul>
            <p class="precio">$20.000.-</p>
            <img src="images/edificio.jpg" alt="">
         </div>
        <div class="text-tarjeta">
            <h3>Lorem, ipsum.</h3>
            <p><i class="fas fa-map-marker-alt"></i> Ubicación</p>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            <div>
                <ul>
                    <li><i class="fas fa-home"></i> x.xxx UF</li>
                    <li><i class="fas fa-bed"></i> 3 Dorm</li>
                    <li><i class="fas fa-bath"></i> 2 Baños</li>
                    <li><i class="fas fa-gift"></i> Regalos Sorpresa</li>
                </ul>
            </div>
     </div> <br>
     <a class="btn-tickets-int" href="detalle.html">Detalles</a>
     </div> <br>
    
     <div class="tarjeta wow fadeInUpBig" data-wow-delay="1s">
        <div>
            <ul class="share">
                <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
            </ul>
            <p class="precio">$20.000.-</p>
            <img src="images/edificio.jpg" alt="">
         </div>
        <div class="text-tarjeta">
            <h3>Lorem, ipsum.</h3>
            <p><i class="fas fa-map-marker-alt"></i> Ubicación</p>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            <div>
                <ul>
                    <li><i class="fas fa-home"></i> x.xxx UF</li>
                    <li><i class="fas fa-bed"></i> 3 Dorm</li>
                    <li><i class="fas fa-bath"></i> 2 Baños</li>
                    <li><i class="fas fa-gift"></i> Regalos Sorpresa</li>
                </ul>
            </div>
     </div> <br>
     <a class="btn-tickets-int" href="detalle.html">Detalles</a>
     </div>
    <br>
        </div> -->
        <div class="cont-propiedades1">
            <div class="propiedades wow fadeInUpBig">
                <div class="slide-img swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="images/edificio - copia.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/edificio - copia.jpg" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="info-propiedad">
                    <p><strong>Marina Golf Rapel</strong></p>
                    <p><i class="fas fa-map-marker-alt"></i> Las Cabras, Libertador Gral. Bernardo O.</p>
                    <p>$20.000.-</p>
                    <p>Equipado con mobiliario en excelente estado. Seguridad 24 horas, piscina con efecto infinito, campo de golf de 9, bosques de pinos, senderos, juegos para niños y quinchos. Cercano al Club de Lago Rapel con restaurante familiar y servicio de arriendo de equipos para deportes náuticos.</p>
                    <br>
                    <p class="titlePremios">10 premios a repartir</p>
                    <div class="cont-premios-prop">
                        <ul class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-award"></i> Premio Mayor</p> 
                            <li>Departamento de lujo de 113 m2</li>
                            <li>Moto de agua</li>
                            <li>Kit palos de golf</li>
                            <li>$2.000.000.- en efectivo</li>
                        </ul>
                        <div class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-money-bill-alt"></i> Primer Premio</p> 
                            <p>$2.000.000.- en efectivo</p>
                        </div>
                        <div class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-money-bill-alt"></i> Segundo Premio</p>  
                            <p>8 premios de $1.000.000.- en efectivo</p>
                        </div>
                    </div>
                    <br>
                    <div class="cont-botones"> <br>
                        <a class="btn-tickets-int" href="{{ asset('rifa') }}">Detalles</a>
                        <div class="width">
                            <ul class="share-detail">
                                <li><a href=""><i class="fab fa-facebook-square wow bounceIn" data-wow-delay="0.4s"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram wow bounceIn" data-wow-delay="0.6s"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        
            <div class="propiedades wow fadeInUpBig">
                <div class="slide-img swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="images/edificio - copia.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/edificio - copia.jpg" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="info-propiedad">
                    <p><strong>Marina Golf Rapel</strong></p>
                    <p><i class="fas fa-map-marker-alt"></i> Las Cabras, Libertador Gral. Bernardo O.</p>
                    <p>$20.000.-</p>
                    <p>Equipado con mobiliario en excelente estado. Seguridad 24 horas, piscina con efecto infinito, campo de golf de 9, bosques de pinos, senderos, juegos para niños y quinchos. Cercano al Club de Lago Rapel con restaurante familiar y servicio de arriendo de equipos para deportes náuticos.</p>
                    <br>
                    <p class="titlePremios">10 premios a repartir</p>
                    <div class="cont-premios-prop">
                        <ul class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-award"></i> Premio Mayor</p> 
                            <li>Departamento de lujo de 113 m2</li>
                            <li>Moto de agua</li>
                            <li>Kit palos de golf</li>
                            <li>$2.000.000.- en efectivo</li>
                        </ul>
                        <div class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-money-bill-alt"></i> Primer Premio</p> 
                            <p class="">$2.000.000.- en efectivo</p>
                        </div>
                        <div class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-money-bill-alt"></i> Segundo Premio</p>  
                            <p class="">8 premios de $1.000.000.- en efectivo</p>
                        </div>
                    </div>
                    <br>
                    <div class="cont-botones"> <br>
                        <a class="btn-tickets-int" href="detalle.html">Detalles</a>
                        <div class="width">
                            <ul class="share-detail">
                                <li><a href=""><i class="fab fa-facebook-square wow bounceIn" data-wow-delay="0.4s"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram wow bounceIn" data-wow-delay="0.6s"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        
            <div class="propiedades wow fadeInUpBig">
                <div class="slide-img swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="images/edificio - copia.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/edificio - copia.jpg" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="info-propiedad">
                    <p><strong>Marina Golf Rapel</strong></p>
                    <p><i class="fas fa-map-marker-alt"></i> Las Cabras, Libertador Gral. Bernardo O.</p>
                    <p>$20.000.-</p>
                    <p>Equipado con mobiliario en excelente estado. Seguridad 24 horas, piscina con efecto infinito, campo de golf de 9, bosques de pinos, senderos, juegos para niños y quinchos. Cercano al Club de Lago Rapel con restaurante familiar y servicio de arriendo de equipos para deportes náuticos.</p>
                    <br>
                    <p class="titlePremios">10 premios a repartir</p>
                    <div class="cont-premios-prop">
                        <ul class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-award"></i> Premio Mayor</p> 
                            <li>Departamento de lujo de 113 m2</li>
                            <li>Moto de agua</li>
                            <li>Kit palos de golf</li>
                            <li>$2.000.000.- en efectivo</li>
                        </ul>
                        <div class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-money-bill-alt"></i> Primer Premio</p> 
                            <p>$2.000.000.- en efectivo</p>
                        </div>
                        <div class="premios-list">
                            <p class="titlePremioSingular"><i class="fas fa-money-bill-alt"></i> Segundo Premio</p>  
                            <p>8 premios de $1.000.000.- en efectivo</p>
                        </div>
                    </div>
                    <br>
                    <div class="cont-botones"> <br>
                        <a class="btn-tickets-int" href="detalle.html">Detalles</a>
                        <div class="width">
                            <ul class="share-detail">
                                <li><a href=""><i class="fab fa-facebook-square wow bounceIn" data-wow-delay="0.4s"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter wow bounceIn" data-wow-delay="0.6s"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
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
        dynamicBullets: true,
      },
    });
</script>
@endsection