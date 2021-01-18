<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu Administrador</li>
                <li>
                    <a href="{{ asset('administrador') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><!--</i><span class="badge badge-pill badge-info float-right">03</span>-->
                        <span>Dashboard</span>
                    </a>
                    <!--<ul class="sub-menu" aria-expanded="false">
                        <li><a href="index.html">Default</a></li>
                        <li><a href="dashboard-saas.html">Saas</a></li>
                        <li><a href="dashboard-crypto.html">Crypto</a></li>
                    </ul>-->
                </li>
                <li class="menu-title">Apps</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/usuarios') }}"><i class="fas fa-align-justify"></i> Usuarios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Propiedad</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/propiedades') }}"><i class="fas fa-align-justify"></i> Propiedades</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Transacciones</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/transacciones/boletas') }}"><i class="fas fa-align-justify"></i> Boletas</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/transacciones/boletas/compradas') }}"><i class="far fa-newspaper"></i> Boletas Compradas</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/transacciones/boletas/validadas') }}"><i class="fas fa-align-justify"></i> Boletas Validadas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Mantenedores</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/mantenedores/estados') }}"><i class="fas fa-align-justify"></i> Estados</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/mantenedores/tipo-estados') }}"><i class="far fa-newspaper"></i> Tipo Estados</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/mantenedores/tipo-premios') }}"><i class="fas fa-align-justify"></i> Tipo Premios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Ubicación</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/ubicaciones/paises') }}"><i class="fas fa-align-justify"></i> Paises</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/ubicaciones/regiones') }}"><i class="far fa-newspaper"></i> Regiones</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/ubicaciones/provincias') }}"><i class="fas fa-align-justify"></i> Provincias</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/ubicaciones/comunas') }}"><i class="fas fa-align-justify"></i> Comunas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Parametros Generales</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('administrador/parametros-generales') }}"><i class="fas fa-align-justify"></i> Parametros Generales</a></li>
                    </ul>
                </li>
                <!--Link a vista parametros generales. -->
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-help-circle"></i>
                        <span>Documentos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ asset('napalm/subir-documentos') }}"><i class="bx bxs-home"></i> Subir Documento</a></li>
                    </ul>
                </li> --}}
                
                <!--Link a vista Comunas. -->
                
                <!--Link a vista Configuracion -> notarias, empresas -->
                

                <!--Link Empresas -->
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>