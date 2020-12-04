<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '266149197994866');
          fbq('track', 'PageView');
        </script>

        <noscript><img height="1" width="1" style="display:none"
          src="https://www.facebook.com/tr?id=266149197994866&ev=PageView&noscript=1"/>
        </noscript>
<!-- End Facebook Pixel Code -->
  
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180685280-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-180685280-1');
        </script>
        <meta charset="UTF-8">
    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="{{ asset('assets/img/favicon_atotal.png') }}" type="{{ asset('assets/image/jpg') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
        
        <title>Rifo Mi Propiedad</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-mobile.css') }}">
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
      
        <script src="https://kit.fontawesome.com/9987974c2b.js" crossorigin="anonymous"></script>
        @toastr_css
    </head>
    <body>
        <header class="header">
            <div class="contenedor-menu logo-nav-contenedor">
                <a class="link-logo" href="index.html" class="logo"><img class="img-logo" src="{{ asset('assets/img/logo.png') }}" alt=""></a>
           <span class="menu-icon" id="btnMenuIcon"><i class="fas fa-bars"></i></span> 
                <nav class="navegacion" id="navigation">
                   <ul id="esconderMenu">
                     <!--    <li><a href="#quienes-somos">Quienes Somos</a></li> -->
                 <!--  <li><a href="bases.html">Bases Legales</a></li> -->
                          <li><a href="propiedades.html">Propiedad</a></li>
                        <li><a href="rifa.html">Rifa</a></li>
                        <li><a href="galeria.html">Galería</a></li>
                  <li><a href="index.html#contacto">Contacto</a></li>
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
        <footer>
            <section class="container"> 
               <hr>
                <div class="row">  
                    <div class=" col-lg-3" style="width: 15rem;">
                        <div class="card-body">
                            <h5 class="card-title letras-footer">Rifo Mi Propiedad</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id vitae doloremque illum officiis quis possimus inventore, esse error magnam. In iste vero id eum quod voluptates aut quidem cum mollitia.</p>
                        </div> 
                    </div>
               
                         <div class=" col-lg-3" style="width: 15rem;">
                        <div class="card-body">
                            <h5 class="card-title letras-footer ">Ubicación</h5>
                            <p>Av. Providencia 1650 OF 601 - Providencia</p>
                            <h5 class="card-title letras-footer">Hablemos</h5>
                            <p>600 656 0250</p>
                        </div> 
                    </div> 
               
                    <div class="col-lg-3" style="width: 15rem;">
                       <!--     <div class="card-body">
                            <div class="card-title letras-footer">
                                <h5 class="">Sitios de interés</h5>
                                <ul class="contenedor-links">
                                    <li><a href="https://isbast.com/"> Isbast</a></li> 
                                    <li><a href="../college-1.1/index.html">College Iquimica</a></li> 
                                    <li><a href="http://parsimonia.cl/">Parsimonia</a></li> 
                                    <li><a href="https://iquimica.cl/">Iquimica</a></li>
                                </ul>  
                            </div>
                            
                        </div>  -->
                               <h5 class="letras-footer">RRSS</h5>
                            <ul class="contenedor-links flex">
                                <li><a target="_blank" href="#"><i class="fab rrss-icon fa-instagram"></i></a></li>
                                <li><a target="_blank" href="#"><i class="fab rrss-icon fa-facebook-square"></i></a></li>            
                            </ul>
                    </div> 

                    <div class="col-lg-3" style="width: 15rem;" >
                        <div class="card-body">
                            <a href="index.html"> <img class="logo-footer" src="{{ asset('assets/img/logo.png') }}" alt="iquimica"></a>
                        </div> 
                    </div>
                </div> 
            </section>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>

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
        @toastr_js
        @toastr_render
    </body>
</html>
