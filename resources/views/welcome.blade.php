@extends('layouts.public.app')
@section('content')
<div class="btn-cookie">
    <label for="btn-cookie" class="cookie">C</label>
</div>
<input type="checkbox" id="btn-cookie">
<div class="contenedor-cookie">
  <div class="cont-cookie" id="scroll">
    <div class="container">
        
      <p><strong>Este sitio utiliza Cookies</strong><br>Algunas de estas cookies son esenciales, mientras que otras nos ayudan a mejorar su experiencia al proporcionar información sobre cómo se está utilizando el sitio.</p>
      <br>
      <button type="button" class="btn btn-light">Aceptar configuración recomendada</button>
      <hr class="hr">
      <p><strong>Cookies necesarias</strong><br>Las cookies necesarias permiten la funcionalidad principal, como la navegación de páginas y el acceso a áreas seguras. El sitio web no puede funcionar correctamente sin estas cookies, y solo pueden deshabilitarse cambiando las preferencias de su navegador.</p> <br>
      <hr class="hr">
               
      <p><strong>Analytics</strong><br>Las cookies analíticas nos ayudan a mejorar nuestro sitio web al recopilar e informar información sobre su uso.</p> 
                            
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">OFF/ON</label>
      </div><br>
      <hr class="hr">
      <p><strong>Marketing</strong><br>Utilizamos cookies de marketing para ayudarnos a mejorar la relevancia de las campañas publicitarias que recibe.
      </p> 
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch2">
        <label class="custom-control-label" for="customSwitch2">OFF/ON</label>
      </div><br>
      <hr class="hr">
      <p><strong>Social Sharing
        </strong><br>Utilizamos algunos complementos para compartir en redes sociales, para permitirle compartir ciertas páginas de nuestro sitio web en las redes sociales. Estos complementos colocan cookies para que pueda ver correctamente cuántas veces se ha compartido una página.
      </p> 
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch3">
        <label class="custom-control-label" for="customSwitch3">OFF/ON</label>
      </div> 
      <hr class="hr"> <br>
      <label for="btn-cookie" class="cerrar"><i class="far fa-times-circle"></i></label>
    </div>
  </div>
</div>
    
       <!--  TÉRMINO BARRA LATERAL  -->


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
      <img src="{{ asset('assets/img/slider1.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <!--  <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/img/slider2.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <!--  <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/img/slider3.jpg') }}" class="d-block w-100" alt="...">
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
      <img src="{{ asset('assets/img/slider-mobile1.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/img/slider-mobile2.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/img/slider-mobile3.jpg') }}" class="d-block w-100" alt="...">
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
 
 <br> <br>
      <div class="container">
    <br> 
   <div class="row align-items-center">
        <div class="col-lg-6 order-lg-1">
          <div class="p-5 linea padding">
                   <h2 class="display-4 azul ">Llegaste! Tú si sabes aprovechar las oportunidades.</h2>
          </div>
        </div>
        <div class="col-lg-6 order-lg-2 ">
          <div class="p-5 linea-bottom">
            <p class=""><strong>Confía en ti</strong>, cree en la suerte, desafía al destino y podrás ser el ganador de estos premios:</p>
            <p>Primer premio:<strong> Departamento de lujo en Marina del Golf Rapel,  una moto de agua, kit de palos de golf y $2.000.000.-</strong></p>
            <p>Segundo premio: <strong>$1.000.000.-</strong></p>
            <p>Tercer premio: <strong>$500.000.-</strong></p>

          </div>
        </div>
      </div>
     <br>
     </div>
  
   
    
      <br> <br>
 
  <section class="desktop">
    <br> 
   <div class="row align-items-center centrado">
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">          
          <div class="contenedor-hover">
            <a class="link" href="#"> <figure>
                  <img src="{{ asset('assets/img/rapel3.jpg') }}" alt="">
                  <div class="capa">
                      <h3>Piscina Efecto Infinito</h3>
                     <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                     <!-- <p><strong>VER DETALLES</strong></p> -->
                    
                  </div>
              </figure> </a> 
              
                         <a href="#">
                    <figure>
                  <img src="{{ asset('assets/img/rapel6.jpg') }}" alt="">
                  <div class="capa">
                      <h3>Bosques de Pino</h3>
                <!--      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                       <!-- <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
              
            
               <a href="#">   <figure>
                  <img src="{{ asset('assets/img/rapel5.jpg') }}" alt="">
                  <div class="capa">
                      <h3>Senderos</h3>
                  <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <!-- <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
               <a href="#">  <figure>
                  <img src="{{ asset('assets/img/rapel4.jpg') }}" alt="">
                  <div class="capa">
                      <h3>Campo de Golf</h3>
                  <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <!-- <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
        
          </div>
          
          </div>
        </div>
        <div class="col-lg-5 order-lg-2 beige">
          <div class="p-5">
            <h2 class="display-4 ">Esta propiedad puede ser tuya</h2>
            <p class="">Equipado con mobiliario en excelente estado. Seguridad 24 horas, piscina con efecto infinito, campo de golf de 9, bosques de pinos, senderos, juegos para niños y quinchos. Cercano al Club de Lago Rapel con restaurante familiar y servicio de arriendo de equipos para deportes náuticos.</p>
            <div class="contenedor-boton">
            <a href="{{ asset('propiedades') }}" class="btn btn-outline-dark" role="button" aria-pressed="true">Ver Todo</a>
            </div>
          </div>
        </div>
      </div>
     <br>
 </section>
 
 
  <section class="mobile">
  
    <br> 
   <div class="align-items-center centrado">
           <div class="col-lg-5 order-lg-2 beige">
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
            <a class="link" href="#"> <figure>
                  <img src="{{ asset('assets/img/rapel1.jpg') }}" alt="">
                  <div class="capa">
                      <h3>Piscina Efecto Infinito</h3>
                  <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p><strong>VER DETALLES</strong></p> -->
                    
                  </div>
              </figure> </a> 
              
             <a href="#">  <figure>
                  <img src="{{ asset('assets/img/rapel2.jpg') }}" alt="">
                  <div class="capa">
                      <h3>Campo de Golf</h3>
            <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
               <a href="#">   <figure>
                  <img src="{{ asset('assets/img/rapel3.jpg') }}" alt="">
                  <div class="capa">
                      <h3>Senderos</h3>
                     <!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p><strong>VER DETALLES</strong></p> -->
                  </div>
              </figure> </a>
                   <a href="#">
                    <figure>
                  <img src="{{ asset('assets/img/parcela4.jpg') }}" alt="">
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
        <div class="col-lg-6 order-lg-2">
          <div class="p-5  padding">
                   <h2 class="display-4 azul ">¿Cómo funciona Rifo Mi Propiedad?</h2>
          </div>
        </div>
        <div class="col-lg-6 order-lg-1 ">
          <div class="p-5">
            <p class="">Rifo Mi Propiedad cuenta con 15.000 números con un valor de $20.000.- cada uno, posteriormente se realizará el sorteo en la notaría Manquehual, el cual será transmitido por Youtube Live, de este modo todos los compradores pueden asistir. </p>

          </div>
        </div>
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
 
 <div id="contacto"  class="fondo-form">
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
