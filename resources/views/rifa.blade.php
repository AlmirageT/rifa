
        @extends('layouts.public.app')
        @section('content')
        <header class="header">
            <div class="contenedor-menu logo-nav-contenedor">
                <a class="link-logo" href="{{ asset('/') }}" class="logo"><img class="img-logo" src="{{ asset('assets/img/logo.png') }}" alt=""></a>
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
        <main class="main">
                <div class="container">
            <br> 
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                  <div class="p-5 linea padding">
                           <h2 class="display-4 azul ">Escoge tus números preferidos.</h2>
                  </div>
                </div>
                <div class="col-lg-6 order-lg-2 ">
                  <div class="p-5 linea-bottom">
                    <p class="">Debes escoger la propiedad por la que deseas participar y 3 números por $20.000.- Cada uno. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                  </div>
                </div>
              </div>
             <br>
            </div>
             <br>
          
        </main> <br> <br>
        <div class="container">
            <br>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ asset('comprar-numeros') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombreUsuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" name="correoUsuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+56</span>
                              </div>
                              <input type="text" class="form-control" name="telefonoUsuario" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Rut (Ingrese su rut sin puntos ni guion)</label>
                            <input type="text" name="rutUsuario" class="form-control" placeholder="Ingrese su rut sin puntos ni guion" onchange="formateaRut(this.value)" id="rut">
                        </div>
                        <div class="form-group">
                            <label>Números (100 - 15000) (Valor por número $20.000)</label>
                            <select class="js-example-basic-multiple form-control" id="numeros" name="numeros[]" multiple >
                                @foreach($numeros as $numero)
                                    <option value="{{ $numero->idNumero }}">{{ $numero->numero }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Total: <span id="total">$0</span></p>
                            <input type="hidden" id="totalOculto" name="totalOculto">
                        </div>
                        <div align="center">
                            <button class="btn btn-primary" type="submit">Comprar Número</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
@endsection
        @section('scripts')

        <script type="text/javascript">
            $(document).on('keypress', '.select2-search__field', function () {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                  event.preventDefault();
                }
            });
            $(document).ready(function(){
                $('.js-example-basic-multiple').select2({
                    language: "es",
                    placeholder: "Ingrese un numero",
                    minimumInputLength: 3,
                    ajax: {
                        url: '{{ asset('api/numeros') }}',
                        dataType: "json",
                        type: "GET",
                        data: function (params) {
                            var queryParameters = {
                                consulta: params.term
                            }
                            return queryParameters;
                        },
                        processResults: function (data) {
                            var myResults = [];
                            $.each(data, function (index, item) {
                                myResults.push({
                                    'id': item.idNumero,
                                    'text': item.numero
                                });
                            });
                            return {
                                results: myResults
                            };
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript">
            function formateaRut(rut) {
                if(isNaN(rut)){
                    alert("ingrese solo numeros");
                    document.getElementById('rut').value = '';
                }else{
                    var actual = rut.replace(/^0+/, "");
                    if (actual != '' && actual.length > 1) {
                        var sinPuntos = actual.replace(/\./g, "");
                        var actualLimpio = sinPuntos.replace(/-/g, "");
                        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
                        var rutPuntos = "";
                        var i = 0;
                        var j = 1;
                        for (i = inicio.length - 1; i >= 0; i--) {
                            var letra = inicio.charAt(i);
                            rutPuntos = letra + rutPuntos;
                            if (j % 3 == 0 && j <= inicio.length - 1) {
                                rutPuntos = "." + rutPuntos;
                            }
                            j++;
                        }
                        var dv = actualLimpio.substring(actualLimpio.length - 1);
                        rutPuntos = rutPuntos + "-" + dv;
                    }
                    document.getElementById('rut').value = rutPuntos;
                }
            }
            let $select = $('#numeros');
            $select.on('change', () => {
              let selecteds = [];

              // Buscamos los option seleccionados
              $select.children(':selected').each((idx, el) => {
                // Obtenemos los atributos que necesitamos
                selecteds.push({
                  id: el.id,
                  value: el.value
                });
              });
              
              //
              const cantidadNumeros = selecteds.length; 
              let total = 20000*cantidadNumeros;
              let valorFormatoCLP = Math.trunc(total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              document.getElementById('totalOculto').value = total;
              document.getElementById('total').innerHTML = '$'+valorFormatoCLP;
            });
        </script>
@endsection
