
<header>
    <div class="cont-nav" id="contenido-cambio">
        <a href="{{ asset('/') }}"><img src="{{ asset('images/variantes logo rifopoly-05.png') }}" alt=""></a>
        <div class="toggle" onclick="toggleMenu()"></div>
        <ul class="navigation">
           <!-- <li><a href="propiedades.html">Propiedades</a></li> -->
            <li><a href="{{ asset('tienda-rifo-propiedades') }}">Propiedades</a></li>
           <!-- <li><a href="bases-legales.html">Bases Legales</a></li> -->
            <div class="contNotificacion">
                <li><a href="{{ asset('carrito-compra') }}">Carrito de Compra</a></li>
                @if (Session::has('carritoCompra'))
                    <span class="notificacion" id="notificacion-span">{{ count(Session::get('carritoCompra')) }}</span>
                @else
                    <span class="notificacion" id="notificacion-span" style="display: none"></span>
                @endif
            </div>

            <li><a href="{{ asset('/') }}#contacto">Contacto</a></li>
        </ul>
    </div>


    @yield('cont-header')
    
</header>