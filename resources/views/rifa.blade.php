@extends('layouts.public.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.nice-number.css') }}">
@endsection

@section('content')
<main class="cont-body int-mobile">
    <h1 class="ml2">{{ $propiedad->nombrePropiedad }}</h1>
    <br>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            
            <div class="contenedor-galeria swiper-slide">
                <div class="img1">
                    <div class="contenedor-videos wow zoomIn">
                        <video controls>
                            <source  src="{{ asset($propiedad->urlVideo) }}">
                        </video>
                        
                    </div>
                </div>
                <div class="mosaic">
                    @for ($i = 0; $i < count($imagenesPropiedad); $i++)
                        @if (($i+1)%7 == 0)
                            @break
                        @else
                            <a href="{{ asset($imagenesPropiedad[$i]->urlImagen) }}" data-lightbox="roadtrip"><img src="{{ asset($imagenesPropiedad[$i]->urlImagen) }}" alt=""></a> 
                        @endif
                    @endfor
                    
                </div>
            </div>

            <div class="contenedor-galeria swiper-slide">
                <div class="img1">
                    <a href="{{ asset($portada1->urlImagen) }}" data-lightbox="roadtrip"><img src="{{ asset($portada1->urlImagen) }}" alt=""></a> 
                </div>
                <div class="mosaic">
                    @for ($i = 7; $i < count($imagenesPropiedad); $i++)
                        @if (($i+1)%14 == 0)
                            @break
                        @else
                            <a href="{{ asset($imagenesPropiedad[$i]->urlImagen) }}" data-lightbox="roadtrip"><img src="{{ asset($imagenesPropiedad[$i]->urlImagen) }}" alt=""></a> 
                        @endif
                    @endfor
                </div>
            </div>
            <div class="contenedor-galeria swiper-slide">
                <div class="img1">
                    <a href="{{ asset($portada2->urlImagen) }}" data-lightbox="roadtrip"><img src="{{ asset($portada2->urlImagen) }}" alt=""></a> 
                </div>
                <div class="mosaic">
                    @for ($i = 14; $i < count($imagenesPropiedad); $i++)
                        @if (($i+1)%21 == 0)
                            @break
                        @else
                            <a href="{{ asset($imagenesPropiedad[$i]->urlImagen) }}" data-lightbox="roadtrip"><img src="{{ asset($imagenesPropiedad[$i]->urlImagen) }}" alt=""></a> 
                        @endif
                    @endfor
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
            <p class="tamanoLetra" id="totalBoletos">TOTAL: ${{ number_format($propiedad->valorRifa,0,',','.') }}.-</p>
            <div class="cont-botonesCompra">
                <button class="btnCompra" type="submit">Comprar ahora</button>
                <button class="btnCarrito" onclick="agregarPropiedadCarrito(event)">Agregar al carrito</button>
            </div>
        </form>
    </div> 
    <br>
    <div class="cont-detalles" id="cont-detalles">
        <p class="text-detail wow fadeInLeft" data-wow-delay="0.4s">{{ $propiedad->subtituloPropiedad }}</p>
        <p class="text-detail wow fadeInLeft" data-wow-delay="0.4s"><i class="fas fa-map-marker-alt"></i> {{ $propiedad->nombreComuna }},{{ $propiedad->nombreRegion }}</p>
        <ul class="share-detail margen">
            <li><a href=""><i class="fab fa-facebook-square wow bounceIn" data-wow-delay="0.4s"></i></a></li>
            <li><a href=""><i class="fab fa-twitter wow bounceIn" data-wow-delay="0.6s"></i></a></li>
        </ul>
        <hr>
        <br>
        <p class="text-detail wow fadeInLeft" data-wow-delay="0.6s">{!! $propiedad->descripcionDetalle !!}</p> <br>
        <ul class="text-detail wow fadeInLeft" data-wow-delay="0.7s">
            @foreach ($propiedadCaracteristicas as $propiedadCaracteristica)
                <li><i class="{{ $propiedadCaracteristica->itag }}"></i> {{ $propiedadCaracteristica->descripcionCaracterisitca }}</li>
            @endforeach
        </ul> <br>
        <a class="download" href="{{ asset($propiedad->pdfBasesLegales) }}" download="BasesLegalesMarinaGolf">Descargar bases legales</a>

    </div>
    <br>
    <div class="cont-matterport">
        <h2>Tour 3D</h2>
        @if ($propiedad->urlMattlePort)
            <iframe width='1020' height='680' src="{{ $propiedad->urlMattlePort }}" frameborder='0' allowfullscreen allow='xr-spatial-tracking'></iframe>
        @endif
    </div>

    <br>
    <div class="cont-premios-detail">
        <h2>Premios</h2>
        <div class="cont-premios">
            <img src="{{ asset('images/premio-mayor.png') }}" alt="">
            <img src="{{ asset('images/premios.png') }}" alt="">
            <img src="{{ asset('images/premio-final.png') }}" alt="">
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
<script src="{{ asset('js/scroll-btn.js') }}"></script>
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
<script src="{{ asset('js/lightbox.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-number.js') }}"></script>
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


<script>
    $(function(){
        $('input[type="number"]').niceNumber({
            onIncrement: function () {
                var cantidadTickets = document.getElementById('numero').value;
                var total = {{ $propiedad->valorRifa }} * cantidadTickets;
                total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                total = total.split('').reverse().join('').replace(/^[\.]/,'');
                document.getElementById('totalBoletos').innerHTML = 'TOTAL: $'+total+'.-';
            },
            onDecrement: function () {
                var cantidadTickets = document.getElementById('numero').value;
                var total = {{ $propiedad->valorRifa }} * cantidadTickets;
                total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                total = total.split('').reverse().join('').replace(/^[\.]/,'');
                document.getElementById('totalBoletos').innerHTML = 'TOTAL: $'+total+'.-';
            },
        });
        
    });
</script>
<script>
    function agregarPropiedadCarrito(e){
        e.preventDefault();
        var cantidad = document.getElementById('numero').value;
        var idPropiedad = {{ $propiedad->idPropiedad }};
        $.get('{{ asset('carrito-de-compra-agregar-ticket') }}/'+cantidad+'/'+idPropiedad,function(data, status){
            if(data.estadoJson == true){
                var total = {{ $propiedad->valorRifa }};
                total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                total = total.split('').reverse().join('').replace(/^[\.]/,'');
                document.getElementById('totalBoletos').innerHTML = 'TOTAL: $'+total+'.-';
                document.getElementById('numero').value = 1;
                if(document.getElementById('notificacion-span').style.display === 'block'){
                    document.getElementById('notificacion-span').innerHTML = data.cantidadCarrito;

                }else{
                    document.getElementById('notificacion-span').style.display = 'block';
                    document.getElementById('notificacion-span').innerHTML = data.cantidadCarrito;
                }
                alert('agregado con exito');
            }else{
                alert('Ha surgido un problema, porfavor intente mas tarde');

            }
        });
    }
</script>
@endsection