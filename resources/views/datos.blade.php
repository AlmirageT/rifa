        @extends('layouts.public.app')
        @section('content')
<header class="header">
            <div class="contenedor-menu logo-nav-contenedor">
                <a class="link-logo" href="index.html" class="logo"><img class="img-logo" src="{{ asset('assets/img/logo.png') }}" alt=""></a>
           <span class="menu-icon" id="btnMenuIcon"><i class="fas fa-bars"></i></span> 
                <nav class="navegacion" id="navigation">
                   <ul id="esconderMenu">
                     <!--    <li><a href="#quienes-somos">Quienes Somos</a></li> -->
                 <!--  <li><a href="bases.html">Bases Legales</a></li> -->
                          <li><a href="{{ asset('propiedades') }}">Propiedad</a></li>
                <li><a href="{{ asset('rifa') }}">Rifa</a></li>
                <li><a href="{{ asset('galeria') }}">Galería</a></li>
                <li><a href="{{ asset('/') }}#contacto">Contacto</a></li>
                   </ul>
           </nav>
            </div> 

        </header>
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>HAZ UNA TRANSFERENCIA</h4><br>
                            <p>
                                Muchas gracias por tu preferencia. Para activar tus números simplemente haz una transferencia a la siguiente cuenta bancaria e indica el numero de boleta en las notas de tu transferencia. <br>  <br>  
                                Una vez realices el pago, validaremos el ingreso y te enviaremos un email con tu comprobante de compra y los números asociados a tu transacción. <br> <br>
                                Suerte!!

                            </p>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5><strong>Datos bancarios</strong></h5><br>
                                            <p><strong>Fintual AGF S.A</strong></p>
                                            <p><strong>Cuenta Corriente - Banco Security</strong></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Cuenta: <strong id="p1">91749860</strong></p>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <a style="color: blue;cursor: pointer;" onclick="copiarAlPortapapeles('p1')">copiar</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Rut: <strong id="p2">76.810.627-4</strong></p>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <a style="cursor: pointer;color: blue" onclick="copiarAlPortapapeles('p2')">copiar</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Email: <strong id="p3">r2d2@fintual.com</strong></p>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <a style="cursor: pointer;color: blue" onclick="copiarAlPortapapeles('p3')">copiar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12"><br></div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                   <div class="row">
                                        <div class="col-lg-6">
                                            <h5><strong>Números</strong></h5>
                                        </div>
                                        <div class="col-lg-6" align="right">
                                            <h5><strong>Total</strong></h5>
                                        </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    @foreach($numerosComprados as $numero)
                                                        <div class="col-lg-3">
                                                           <p>{{ $numero }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        <div class="col-lg-6" align="right">
                                            <p> ${{ number_format($total,0,',','.') }}</p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{  url()->previous() }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

        <script type="text/javascript">
            function copiarAlPortapapeles(id_elemento) {
              var aux = document.createElement("input");
              aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
              document.body.appendChild(aux);
              aux.select();
              document.execCommand("copy");
              document.body.removeChild(aux);
              alert("Texto Copiado");
            }
        </script>
