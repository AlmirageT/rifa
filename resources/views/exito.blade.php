
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/variantes logo rifopoly-07.png') }}" type="image/jpg">

    <title>¡Compra Validada!</title>
  </head>
  <body>
<div class="position-relative overflow-hidden bg-light">
    <div class="col-md-8 p-lg-5 mx-auto my-5">
        <div class="row">
            <div class="col-md-12 col-12 text-center p-3">
                <a class="link-logo" href="{{ asset('/') }}" class="logo"><img class="img-logo" src="{{ asset('images/variantes logo rifopoly-05.png') }}" alt="" width="200" height="100"></a>
                <h1 class="display-4 font-weight-normal">¡Felicidades tu Compra ha Sido Validada!</h1>
            </div>
            <div class="col-md-12 col-12 text-center">
                <span class="svg-icon svg-icon-primary svg-icon-2x">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" style="width: 50px !important;height: 50px !important;">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
                            <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
                        </g>
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <div class="product-device box-shadow d-none d-md-block"></div>
    <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
</div>

<div class="container mt-md-10 mt-10 mb-0">
    <div class="card card-custom gutter-b">
        <div class="card-body pt-8 p-md-10 p-5">
            <h2 class="mb-5">Resumen</h2>
            <div class="col-lg-12">
                <p class="font-weight-bolder font-size-h4">Nombre Cliente</p>
            </div>
            <div class="col-lg-12">
               <p class=""> {{ $boleta->first()->nombreUsuario }}</p>
            </div>
            <div class="col-lg-12">
                <p class="font-weight-bolder font-size-h4">Correo Cliente</p>
            </div>
            <div class="col-lg-12">
                <p class="">{{ $boleta->first()->correoUsuario }}</p>
            </div>
            <div class="col-lg-12">
                <p class="font-weight-bolder font-size-h4">Rut Cliente</p>
            </div>
            <div class="col-lg-12">
                <p class="">{{ $boleta->first()->rutUsuario }}</p>
            </div>
            <div class="col-lg-12">
                <p class="font-weight-bolder font-size-h4">Teléfono Cliente</p>
            </div>
            <div class="col-lg-12">
                <p class="">{{ $boleta->first()->telefonoUsuario }}</p>
            </div>
            <div class="col-lg-12">
                <p class="font-weight-bolder font-size-h4">Tickets</p>
            </div>
            <div class="col-lg-12">
                @foreach($numeros as $numero)
                   <p class=""> {{ $numero->numero }} &nbsp;&nbsp;</p>
                @endforeach
            </div>
            <div class="col-lg-12">
                <p class="font-weight-bolder font-size-h4">Total</p>
            </div>
            <div class="col-lg-12">
                <p class="">${{ number_format($boleta->first()->totalBoleta,0,',','.') }}</p>
            </div>
        </div>
        {{-- 
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ asset('dashboard/mi-cuenta') }}" class="btn btn-primary btn-fixed-height font-weight-bold px-2 px-lg-5 mr-2">Finalizar</a>
        	<br>
        	<br>
        	<br>
            </div>
            <br>
        </div>
         --}}
        <br>
    </div>
    <br>
</div>
<br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
  <footer>
      <div align="center">
          <p>El Equipo de Rifopoly te Desea Suerte</p>
      </div>
  </footer>
</html>
