@extends('layouts.public.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.nice-number.css') }}">
@endsection
@section('imagen-inicio')
<a href="{{ asset('/') }}"><img src="{{ asset('images/logo rifopoly_Mesa de trabajo 1.png') }}" alt=""></a>
@endsection
@section('boton-comprar')
<form action="{{ asset('compra-ticket-directo') }}/{{ $propiedades->first()->idPropiedad }}" method="POST">
    @csrf
    <input type="hidden" name="numero" value="1" min="1">
    <button class="btn-comprar-flotanteProp letras-btn" style="cursor: pointer">Comprar <i class="fas fa-shopping-cart" aria-hidden="true"></i></button>
</form>
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
    <h1 class="ml2">Gana estos premios con ${{ number_format($propiedades->first()->valorRifa,0,',','.') }}</h1>
    <br>
    @if(count($propiedades)>1)
        <form class="form-buscar wow slideInLeft" data-wow-delay="0.4s" action="{{ asset('tienda-rifo-propiedades') }}" method="POST">
            @csrf
            <input class="form-control-buscar lg-12" type="search" placeholder="Buscar" aria-label="Search" name="buscadorDeRifa">
            <button class="btn-buscar" type="submit">Buscar</button>
        </form>
    @endif
    
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
           <p><i class="fas fa-map-marker-alt"></i> Ubicaci??n</p>
           <p>Lorem ipsum dolor sit amet consectetur.</p>
           <div>
               <ul>
                   <li><i class="fas fa-home"></i> x.xxx UF</li>
                   <li><i class="fas fa-bed"></i> 3 Dorm</li>
                   <li><i class="fas fa-bath"></i> 2 Ba??os</li>
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
            <p><i class="fas fa-map-marker-alt"></i> Ubicaci??n</p>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            <div>
                <ul>
                    <li><i class="fas fa-home"></i> x.xxx UF</li>
                    <li><i class="fas fa-bed"></i> 3 Dorm</li>
                    <li><i class="fas fa-bath"></i> 2 Ba??os</li>
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
            <p><i class="fas fa-map-marker-alt"></i> Ubicaci??n</p>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            <div>
                <ul>
                    <li><i class="fas fa-home"></i> x.xxx UF</li>
                    <li><i class="fas fa-bed"></i> 3 Dorm</li>
                    <li><i class="fas fa-bath"></i> 2 Ba??os</li>
                    <li><i class="fas fa-gift"></i> Regalos Sorpresa</li>
                </ul>
            </div>
     </div> <br>
     <a class="btn-tickets-int" href="detalle.html">Detalles</a>
     </div>
    <br>
        </div> -->
        <div class="infinite-scroll" >

            <div class="cont-propiedades1">
                @if (count($propiedades)>0)
                    @foreach ($propiedades as $propiedad)
                    @php
                        $nombrePropiedad = str_replace(" ", "-", $propiedad->nombrePropiedad);
                    @endphp
                        <div class="propiedades wow fadeInUpBig">
                            <div class="slide-img swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img src="{{ asset($propiedad->fotoPrincipal) }}" alt="Propiedad a rifar"></div>
                                    <div class="swiper-slide"><img src="{{ asset($propiedad->fotoMapa) }}" alt="Mapa ubicaci??n propiedad"></div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            {{--  
                            <div class="info-propiedad">
                                <h3><strong>{{ $propiedad->nombrePropiedad }}</strong></h3>
                                <h4 id="nombreComuna{{ $propiedad->idPropiedad }}"><i class="fas fa-map-marker-alt"></i>{{ $propiedad->nombreComuna }}, {{ $propiedad->nombreRegion }}</h4>

                                <p> <strong> ${{ number_format($propiedad->valorRifa,0,',','.') }}.-</strong></p>
                                <p>{!! $propiedad->descripcionPropiedad !!}</p>
                                <br>
                                <p class="titlePremios">{{ $propiedad->cantidadTotalPremios }} premios a repartir</p>
                                <div class="cont-premios-prop">
                                    @if ($premios->where('idPropiedad',$propiedad->idPropiedad))
                                        @php
                                            $arraySinEdicion = $premios->where('idPropiedad',$propiedad->idPropiedad);
                                            $primerValorPremios = $arraySinEdicion->shift();
                                        @endphp
                                        <ul class="premios-list">
                                            <p class="titlePremioSingular"><i class="fas fa-award"></i> {{ $primerValorPremios['nombreTipoPremio'] }}</p> 
                                            <li>{!! $primerValorPremios['descripcion'] !!}</li>
                                        </ul>
                                        @foreach ($arraySinEdicion as $premio)
                                        <ul class="premios-list">
                                            <p class="titlePremioSingular"><i class="fas fa-money-bill-alt"></i> {{ $premio->nombreTipoPremio }}</p> 
                                            <li> {!! $premio->descripcion !!}</li>
                                        </ul>
                                        @endforeach
                                        
                                    @endif
                                </div>
                                <br>
                                <div class="cont-botones"> <br>
                                    <a class="btn-tickets-int" href="{{ asset('rifo-propiedades/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedad->idPropiedad) }}">Detalles</a>
                                    //aca va un comentado en el form
                                    <form class="form-btn" action="{{ asset('compra-ticket-directo-detalle') }}/{{ $propiedad->idPropiedad }}" method="POST">
                                        @csrf
                                        <button class="buttonComprarAhora" style="cursor:pointer;" type="sumbit">Comprar ahora</button>
                                        <button class="buttonComprarAhora" style="cursor:pointer;" onclick="agregarPropiedadCarrito(event)">Agregar al carrito</button>
                                    </form>
                                    <div class="width">
                                        <ul class="share-detail">
                                            @if ($propiedad->urlFacebook)
                                                <li><a target="_blank" href="{{ $propiedad->urlFacebook }}"><i class="fab fa-facebook-square wow bounceIn" data-wow-delay="0.4s"></i></a></li>
                                            @endif
                                            @if ($propiedad->urlInstagram)
                                                <li><a target="_blank" href="{{ $propiedad->urlInstagram }}"><i class="fab fa-instagram wow bounceIn" data-wow-delay="0.6s"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <br>
                            </div>--}}
                            <div class="info-propiedad">
                                <p><strong>Premio Mayor</strong></p>
                                    @php
                                        $arraySinEdicion = $premios->where('idPropiedad',$propiedad->idPropiedad);
                                        $primerValorPremios = $arraySinEdicion->shift();
                                    @endphp
                                    <div class="contPremioMayor">
                                        <img src="{{ asset($primerValorPremios->imagenPremio) }}" alt="">
                                        <ul class="premios-list">
                                            <li>Departamento de lujo de 113 m2</li>
                                            <li>Moto de agua</li>
                                            <li>Kit palos de golf</li>
                                            <li>$2.000.000.- en efectivo</li>
                                        </ul>    
                                    </div>
                                    <br>
                                    <div class="cont-botones"> <br>
                                        <a class="btn-tickets-int" href="{{ asset('rifo-propiedades/detalle') }}?nombrePropiedad={{ $nombrePropiedad }}&idPropiedad={{ Crypt::encrypt($propiedad->idPropiedad) }}">Detalles premio mayor</a>
                        <!--
                        <form class="form-btn" action="">
                            <button class="buttonComprarAhora">Comprar ahora</button>
                            <button class="buttonComprarAhora">Agregar al carrito</button>
                        </form> -->
                                        <div class="width">
                                            <ul class="share-detail">
                                                <li><a target="_blank" href="{{ $propiedad->urlFacebook }}"><i class="fab fa-facebook-square wow bounceIn" data-wow-delay="0.4s"></i></a></li>
                                                <li><a target="_blank" href="{{ $propiedad->urlInstagram }}"><i class="fab fa-instagram wow bounceIn" data-wow-delay="0.6s"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <br>
                            </div>
                        </div>
                        <div class="propiedades wow fadeInUpBig">
                            <div class="slide-img swiper-container">
                                <div class="swiper-wrapper">
                                </div>
                            </div> 
                            @php
                                $segundoValorPremios = $arraySinEdicion->shift();
                            @endphp
                            <div class="info-propiedad">
                                <p><strong>Segundo Premio</strong></p>
                                <div class="contPremioMayor">
                                    <img src="{{ asset($segundoValorPremios->imagenPremio) }}" alt="">
                                    <ul class="premios-list">
                                        <li>$2.000.000.- en efectivo</li>
                                    </ul>  
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="propiedades wow fadeInUpBig">
                            <div class="contTercerPremio">
                                <div class="tercerPremio">
                                    <img src="{{ asset($arraySinEdicion->first()->imagenPremio) }}" alt="">
                                    <p><strong>Tercer Premio</strong></p>
                                    <p>$1.000.000.- en efetivo</p>
                                </div>
                                <div class="tercerPremio">
                                    <img src="{{ asset($arraySinEdicion->first()->imagenPremio) }}" alt="">
                                    <p><strong>Cuarto Premio</strong></p>
                                    <p>$1.000.000.- en efetivo</p>
                                </div>
                                <div class="tercerPremio">
                                    <img src="{{ asset($arraySinEdicion->first()->imagenPremio) }}" alt="">
                                    <p><strong>Quinto Premio</strong></p>
                                    <p>$1.000.000.- en efetivo</p>
                                </div>
                                <div class="tercerPremio">
                                    <img src="{{ asset($arraySinEdicion->first()->imagenPremio) }}" alt="">
                                    <p><strong>Sexto Premio</strong></p>
                                    <p>$1.000.000.- en efetivo</p>
                                </div>
                                <div class="tercerPremio">
                                    <img src="{{ asset($arraySinEdicion->first()->imagenPremio) }}" alt="">
                                    <p><strong>S??ptimo Premio</strong></p>
                                    <p>$1.000.000.- en efetivo</p>
                                </div>
                                <div class="tercerPremio">
                                    <img src="{{ asset($arraySinEdicion->first()->imagenPremio) }}" alt="">
                                    <p><strong>Octavo Premio</strong></p>
                                    <p>$1.000.000.- en efetivo</p>
                                </div>
                                <div class="tercerPremio">
                                    <img src="{{ asset($arraySinEdicion->first()->imagenPremio) }}" alt="">
                                    <p><strong>Noveno Premio</strong></p>
                                    <p>$1.000.000.- en efetivo</p>
                                </div>
                                <div class="tercerPremio">
                                    <img src="{{ asset($arraySinEdicion->first()->imagenPremio) }}" alt="">
                                    <p><strong>D??cimo Premio</strong></p>
                                    <p>$1.000.000.- en efetivo</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="propiedades wow fadeInUpBig">
                    <div class="info-propiedad">
                        No se encontraron propiedades
                    </div>
                </div>
                @endif
            </div>
            {{ $propiedades->links() }}
        </div>
    </main>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
@foreach($propiedades as $propiedad)
    <script>
        const prop = @json($propiedad->idPropiedad);

        if(screen.width < 766 && screen.width > 675){
            const nombreComuna = @json($propiedad->nombreComuna);
            const nombreRegion = @json(substr($propiedad->nombreRegion,0,28));
            
            document.getElementById('nombreComuna'+prop).innerHTML = '';
            document.getElementById('nombreComuna'+prop).innerHTML = `<i class="fas fa-map-marker-alt"></i>${nombreComuna}, ${nombreRegion}...`;
        }
        if(screen.width < 675 && screen.width > 558){
            const nombreComuna = @json($propiedad->nombreComuna);
            const nombreRegion = @json(substr($propiedad->nombreRegion,0,18));
            
            document.getElementById('nombreComuna'+prop).innerHTML = '';
            document.getElementById('nombreComuna'+prop).innerHTML = `<i class="fas fa-map-marker-alt"></i>${nombreComuna}, ${nombreRegion}...`;
        }
        if(screen.width < 558){
            const nombreComuna = @json($propiedad->nombreComuna);
            const nombreRegion = @json(substr($propiedad->nombreRegion,0,8));
            
            document.getElementById('nombreComuna'+prop).innerHTML = '';
            document.getElementById('nombreComuna'+prop).innerHTML = `<i class="fas fa-map-marker-alt"></i>${nombreComuna}, ${nombreRegion}...`;
        }
    </script>
@endforeach

<script>
    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
    });
</script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            debug: true,
            loadingHtml: '<div align="center"><img src="{{ asset('img/loading.gif') }}" alt="Loading..." /></div>',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: '.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
<script>
    function agregarPropiedadCarrito(e){
        e.preventDefault();
        var idPropiedad = {{ $propiedad->idPropiedad }};
        $.get('{{ asset('carrito-de-compra-agregar-ticket') }}/'+1+'/'+idPropiedad,function(data, status){
            if(data.estadoJson == true){
                if(document.getElementById('notificacion-span').style.display === 'block'){
                    document.getElementById('notificacion-span').innerHTML = data.cantidadCarrito;

                }else{
                    document.getElementById('notificacion-span').style.display = 'block';
                    document.getElementById('notificacion-span').innerHTML = data.cantidadCarrito;
                }
                
                $('body, html').animate({
                    scrollTop: '0px'
                }, 300);

                swal({
                    title: "??Agregado Correctamente!",
                    text: "El ticket ha sido agregado correctamente",
                    icon: "success",
                    button: "OK",
                });
            }else if(data.estadoJson == false){
                swal({
                    title: "??Oops! ha surgido un imprevisto",
                    text: "No se pueden agregar mas de 15 tickets",
                    icon: "error",
                    button: ":c",
                });
            }else{
                swal({
                    title: "??Oops! ha surgido un imprevisto",
                    text: "Esta propiedad no posee tickets asociados",
                    icon: "error",
                    button: ":c",
                });
            }
        });
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