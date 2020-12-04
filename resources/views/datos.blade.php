<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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
    </body>
</html>
