<header class="header">
    <div class="contenedor-menu logo-nav-contenedor">
        <a class="link-logo" href="{{ asset('/') }}" class="logo"><img class="img-logo" src="{{ asset('img/logo.png') }}" alt=""></a>
   <span class="menu-icon" id="btnMenuIcon"><i class="fas fa-bars"></i></span> 
        <nav class="navegacion" id="navigation">
           <ul id="esconderMenu">
                     <!--    <li><a href="#quienes-somos">Quienes Somos</a></li> -->
              <!--  <li><a href="bases.html">Bases Legales</a></li> -->
                <li><a href="{{ asset('propiedades') }}">Propiedad</a></li>
                <li><a href="{{ asset('bases-legales') }}">Bases Legales</a></li>
                <li><a href="{{ asset('rifa') }}">Compra tus Números</a></li>
                <li><a href="{{ asset('galeria') }}">Galería</a></li>
                <li><a href="{{ asset('/') }}#contacto">Contacto</a></li>
           </ul>
   </nav>
    </div> 
</header>