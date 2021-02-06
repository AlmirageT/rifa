@extends('layouts.public.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.nice-number.css') }}">
@endsection

@section('content')
<main class="cont-body int-mobile">
    <h1 class="ml2">Escoge la rifa que quieres ganar</h1>
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
                                    <div class="swiper-slide"><img src="{{ asset($propiedad->fotoMapa) }}" alt="Mapa ubicación propiedad"></div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="info-propiedad">
                                <h3><strong>{{ $propiedad->nombrePropiedad }}</strong></h3>
                                <h4 id="nombreComuna{{ $propiedad->idPropiedad }}"><i class="fas fa-map-marker-alt"></i>{{ $propiedad->nombreComuna }}, {{ $propiedad->nombreRegion }}</h4>

                                <p>${{ number_format($propiedad->valorRifa,0,',','.') }}.-</p>
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
        document.getElementById('contenido-cambio').classList.remove('cont-nav');
        document.getElementById('contenido-cambio').classList.add('cont-nav-int');
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
                    title: "¡Agregado Correctamente!",
                    text: "El ticket ha sido agregado correctamente",
                    icon: "success",
                    button: "OK",
                });
            }else if(data.estadoJson == false){
                swal({
                    title: "¡Oops! ha surgido un imprevisto",
                    text: "No se pueden agregar mas de 15 tickets",
                    icon: "error",
                    button: ":c",
                });
            }else{
                swal({
                    title: "¡Oops! ha surgido un imprevisto",
                    text: "Esta propiedad no posee tickets asociados",
                    icon: "error",
                    button: ":c",
                });
            }
        });
    }
</script>
@endsection