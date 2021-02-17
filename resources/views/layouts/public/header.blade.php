
<header>
    <div class="cont-nav" >
        @yield('imagen-inicio')
        
        <div class="toggle" onclick="toggleMenu()" id="colorNegro"></div>
        <ul class="navigation">
           <!-- <li><a href="propiedades.html">Propiedades</a></li> -->
            <li><a href="{{ asset('tienda-rifo-propiedades') }}" id="contenido-cambio">Premios</a></li>
            <li><a href="{{ asset('nosotros') }}" id="contenido-cambio-3">Nosotros</a></li>
           <!-- <li><a href="bases-legales.html">Bases Legales</a></li> -->
            <div class="contNotificacion">
                <li><a href="{{ asset('formas-de-pago') }}" id="contenido-cambio-1">Formas de Pago</a></li>
                {{--  
                <li><a href="{{ asset('carrito-compra') }}" >Carrito de Compra</a></li>
                @if (Session::has('carritoCompra'))
                    <span class="notificacion" id="notificacion-span" >{{ count(Session::get('carritoCompra')) }}</span>
                @else
                    <span class="notificacion" id="notificacion-span" style="display: none"></span>
                @endif--}}
            </div>

            <li><a href="{{ asset('/') }}#contacto" id="contenido-cambio-2">Contacto</a></li>
        </ul>
    </div>

    @yield('cont-header')
    
</header>