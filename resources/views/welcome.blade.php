@extends('layouts.public.app')
@section('content')


 <a class="btn-comprar-flotante letras-btn" href="{{ asset('rifa') }}">Comprar<br>Números <br><i class="fas fa-shopping-cart"></i> </a>

<!-- BARRA DE NAVEGACIÓN -->

   <main class="main">
  
  <!-- CARRUSEL ESCRITORIO -->
  <div id="carouselExampleCaptions" class="carousel slide desktop" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/slider1.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <!--  <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slider2.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <!--  <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slider3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!--  <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <!-- CARRUSEL MOBILE -->

 <div id="carouselExampleCaptions" class="carousel slide mobile" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/slider-mobile1.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slider-mobile2.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slider-mobile3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 
<br> <br> <br>
      <div class="container">
    <br> 
         <h2 class="display-4 azul centrar-titulos "> <span class="min">Llegaste! Tú si sabes aprovechar las oportunidades</span></h2>
          <p class="wow zoomIn centrar-titulos" data-wow-delay="0.7s">Confía en ti, cree en la suerte, desafía al destino y podrás ser el ganador ! <strong>Son 10 premios a repartir</strong></p>
   <div class="row align-items-center">
        <div class="col-lg-6 order-lg-1 wow slideInLeft" data-wow-delay="0.4s">
          <div class="p-5 linea padding">
                 <p class="wow zoomIn" data-wow-delay="0.9s">Premio Mayor:</p>
            <ul class="wow zoomIn lista" data-wow-delay="0.9s">
                <li><i class="far fa-hand-point-right"></i> <strong>Departamento de lujo totalmente amoblado de 120 m2 aprox, 3 baños, con dos terrazas, estacionamiento, bodega tipo dormitorio y piscina infinita.</strong></li>
                <li><i class="far fa-hand-point-right"></i> <strong>2 acciones en el campo de golf
</strong></li>
                <li><i class="far fa-hand-point-right"></i> <strong>Kit equipo de golf
</strong></li>
                <li><i class="far fa-hand-point-right"></i> <strong>Moto de agua</strong></li>
                <li><i class="far fa-hand-point-right"></i> <strong>$2.000.000.-</strong></li>
            </ul> 
          </div>
        </div>
        <div class="col-lg-6 order-lg-2" >
          <div class="p-5 linea-bottom">
           
        
            
            <p class="wow zoomIn" data-wow-delay="1s">Tu suerte no termina aquí, puedes ganar:</p>
                <ul class="wow zoomIn lista" data-wow-delay="0.9s">
                <li><i class="fas fa-hand-point-right"></i> <strong>Primer Premio : $1.000.000.-</strong></li>
           <li><i class="fas fa-hand-point-right"></i> <strong>Segundo Premio : $1.000.000.-</strong></li>
           <li><i class="fas fa-hand-point-right"></i> <strong>Tercero Premio : $1.000.000.-</strong></li>
           <li><i class="fas fa-hand-point-right"></i> <strong>Cuarto Premio : $1.000.000.-</strong></li>
           <li><i class="fas fa-hand-point-right"></i> <strong>Quinto Premio : $1.000.000.-</strong></li>
           <li><i class="fas fa-hand-point-right"></i> <strong>Sexto Premio : $1.000.000.-</strong></li>
           <li><i class="fas fa-hand-point-right"></i> <strong>Séptimo Premio : $1.000.000.-</strong></li>
           <li><i class="fas fa-hand-point-right"></i> <strong>Octavo Premio : $1.000.000.-</strong></li>
            </ul>
            
            
            <p class="wow zoomIn" data-wow-delay="1.2s"><i class="fas fa-hand-sparkles"></i> Como te esforzaste y pusiste todo de tu parte, te daremos la oportunidad de ganar el último aliento que será un premio de<strong> $500.000.-</strong> </p>

          </div>
        </div>
      </div>
     <br>
     </div>
      <br> <br>
      <div class="container">
   <div class="contenedor-videos wow zoomIn">
         <video controls>
             <source  src="{{ asset('videos/marina-golf-rapel.mp4') }}">
         </video>
          
      </div> </div>
      <section class="desktop">
    <br> 
   <div class="row align-items-center centrado">
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">          
          <div class="contenedor-hover">
            <a class="link wow zoomIn" data-wow-delay="0.5s" href="#"> <figure>
                  <img src="{{ asset('img/rapel3.jpg') }}" alt="Piscina con efecto infinito">
                  <div class="capa">
                      <h3>Piscina Efecto Infinito</h3>
                     <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                     <!-- <p><strong>VER DETALLES</strong></p> -->
                    
                  </div>
              </figure> </a> 
              
                    <a class="wow zoomIn" data-wow-delay="0.7s" href="#">
                    <figure>
                  <img src="{{ asset('img/rapel6.jpg') }}" alt="Bosques de pino">
                  <div class="capa">
                      <h3>Bosques de Pino</h3>
                <!--      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                       <!-- <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
              
            
               <a class="wow zoomIn" data-wow-delay="0.9s" href="#">   <figure>
                  <img src="{{ asset('img/rapel5.jpg') }}" alt="Senderos">
                  <div class="capa">
                      <h3>Senderos</h3>
                  <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <!-- <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
               <a class="wow zoomIn" data-wow-delay="1.2s" href="#">  <figure>
                  <img src="{{ asset('img/rapel4.jpg') }}" alt="Campo de golf">
                  <div class="capa">
                      <h3>Campo de Golf</h3>
                  <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <!-- <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
        
          </div>
          
          </div>
        </div>
        <div class="col-lg-5 order-lg-2 beige wow zoomIn" data-wow-delay="1.4s">
          <div class="p-5">
            <h2 class="display-4"><span class="negrita-blanco">Esta propiedad puede ser tuya</span></h2>
            <p class="blanco">Equipado con mobiliario en excelente estado. Seguridad 24 horas, piscina con efecto infinito, campo de golf de 9, bosques de pinos, senderos, juegos para niños y quinchos. Cercano al Club de Lago Rapel con restaurante familiar y servicio de arriendo de equipos para deportes náuticos.</p>
            <div class="contenedor-boton">
            <a href="{{ asset('propiedades') }}" class="btn btn-outline-light" role="button" aria-pressed="true">Ver Todo</a>
            </div>
          </div>
        </div>
      </div>
     <br>
 </section>

 
  <section class="mobile">
  
    <br> 
   <div class="align-items-center centrado">
           <div class="col-lg-5 order-lg-2 beige wow zoomIn">
          <div class="p-5">
            <h2 class="display-4 ">Esta propiedad puede ser tuya</h2>
            <p class="">Equipado con mobiliario en excelente estado. Seguridad 24 horas, piscina con efecto infinito, campo de golf de 9, bosques de pinos, senderos, juegos para niños y quinchos. Cercano al Club de Lago Rapel con restaurante familiar y servicio de arriendo de equipos para deportes náuticos.</p>
            <div class="contenedor-boton">
            <a href="{{ asset('propiedades') }}" class="btn btn-outline-dark" role="button" aria-pressed="true">Ver Todo</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">          
          <div class="contenedor-hover">
            <a class="link wow zoomIn" href="#"> <figure>
                  <img src="{{ asset('img/rapel1.jpg') }}" alt="Piscina efecto infinito">
                  <div class="capa">
                      <h3>Piscina Efecto Infinito</h3>
                  <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p><strong>VER DETALLES</strong></p> -->
                    
                  </div>
              </figure> </a> 
              
             <a class="wow zoomIn" href="#">  <figure>
                  <img src="{{ asset('img/rapel2.jpg') }}" alt="Campo de Golf">
                  <div class="capa">
                      <h3>Campo de Golf</h3>
            <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
               <a class="wow zoomIn" href="#">   <figure>
                  <img src="{{ asset('img/rapel3.jpg') }}" alt="Senderos">
                  <div class="capa">
                      <h3>Senderos</h3>
                     <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
                   <a class="wow zoomIn" href="#">
                    <figure>
                  <img src="{{ asset('img/parcela4.jpg') }}" alt="Bosques de pino">
                  <div class="capa">
                      <h3>Bosques</h3>
                     <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
              
          </div>
          
          </div>
        </div>
    
      </div>
     <br>
   
 </section>
 
       <div class="container">
    <br> 
   <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2 wow slideInRight" data-wow-delay="1s">
          <div class="p-5 padding">
                   <h2 class="display-4 azul">¿Cómo funciona Rifo Mi Propiedad?</h2>
          </div>
        </div>
        <div class="col-lg-6 order-lg-1 wow zoomIn" data-wow-delay="1.5s">
          <div class="p-5">
            <p class="">Compra tu número a $20.000.- el sorteo será realizado en la notaría Manquehual, el cual será transmitido por Youtube Live, de este modo todos los compradores pueden asistir.</p>

          </div>
        </div>
      </div>
     <br>
     </div>

      <div class="container">
    <br> 
 
        
<h2 class="display-4 azul centrar-titulos wow zoomIn">Premios</h2>
      
     
<div class="contenedor-premios wow slideInUp">
     <div class="cont-premios"><img class="img-premios" src="{{ asset('img/premios.png') }}" alt="segundo premio">
          <p>
           <strong>Primer Premio : $1.000.000.-</strong> <br>
     <strong>Segundo Premio : $1.000.000.-</strong> <br>
           <strong>Tercero Premio : $1.000.000.-</strong> <br>
           <strong>Cuarto Premio : $1.000.000.-</strong> <br>
           <strong>Quinto Premio : $1.000.000.-</strong> <br>
           <strong>Sexto Premio : $1.000.000.-</strong> <br>
           <strong>Séptimo Premio : $1.000.000.-</strong> <br>
           <strong>Octavo Premio : $1.000.000.-</strong> <br>
          </p>
            </div>
      <div class="cont-premio-mayor"><img class="img-premios" src="{{ asset('img/premio-mayor.png') }}" alt="primer premio"><p><strong>Premio Mayor</strong><br><strong>Departamento de lujo totalmente amoblado de 120 m2 aprox, 3 baños, con dos terrazas, estacionamiento, bodega tipo dormitorio y piscina infinita.</strong><br><strong>2 acciones en el campo de golf
</strong><br><strong>Moto de agua</strong><br><strong>Kit equipo de golf
</strong><br><strong>$2.000.000.-</strong></p>
               
            </div>
      <div class="cont-premios"><img class="img-premios" src="{{ asset('img/premio-final.png') }}" alt="tercer premio"><strong>Último Premio</strong><br>$500.000.-</div>
 </div>
     <br>
     </div> 
 <!--
 <section class="contenedor-banner desktop">
<img class="img-banner" src="img/banner.jpg" alt="">
 </section>
 
 <section class="contenedor-banner mobile">
<img class="img-banner" src="img/banner-mobile.jpg" alt="">
 </section> -->
 
 <br>
 <div id="contacto"  class="fondo-form wow zoomIn">
  <section>
            <div class="contenedor-form">
            <form action="{{ asset('enviar-consulta') }}" class="formulario-bottom" method="post">
              @csrf
                 <h2 class="titulos azul">CONTÁCTANOS</h2>
     
                <label for="nombre" class="form-label"></label> 
                    <input type="text" id="nombre" name="nombre" class="form-input-bottom" placeholder="Tu Nombre" required>
 
                <label for="correo" class="form-label"></label>
                    <input type="email" id="correo" name="correo" class="form-input-bottom" placeholder="Correo Electr&oacute;nico" required>
 
                <label for="fono" class="form-label"></label> 
                    <input type="number" id="fono" name="fono" class="form-input-bottom" placeholder="Tel&eacute;fono" required>
                    
                     <label for="msg" class="azul form-label">Escribe tu mensaje a continuación</label> 
                    <textarea class="form-input" name="consulta" id="msg" cols="30" rows="5" required> </textarea>
 
    
                <input type="submit" class="btn-submit-bottom" value="Solicita información"> 
            </form>        
        </div>
 </section>
 </div>
  </main> <br> <br>
@endsection
