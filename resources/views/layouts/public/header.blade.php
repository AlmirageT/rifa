
<header>
    <div class="cont-nav" id="contenido-cambio">
        <a href="{{ asset('/') }}"><img src="images/iconos/logo.png" alt=""></a>
        <div class="toggle" onclick="toggleMenu()"></div>
        <ul class="navigation">
           <!-- <li><a href="propiedades.html">Propiedades</a></li> -->
            <li><a href="{{ asset('tienda-rifo-propiedades') }}">Propiedades</a></li>
           <!-- <li><a href="bases-legales.html">Bases Legales</a></li> -->
            <li><a href="{{ asset('carrito-compra') }}">Carrito de Compra</a></li>
            <li><a href="{{ asset('/') }}#contacto">Contacto</a></li>
        </ul>
    </div>


    @yield('cont-header')
    
</header>