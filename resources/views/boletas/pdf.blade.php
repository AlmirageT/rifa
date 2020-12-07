<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Boleta</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h5>Boleta</h5>
            </div>
            <div style="line-height: 10%;">
                <p>Comprador: {{ $boleta->nombreUsuario }}</p>
                <p>Rut: {{ $boleta->rutUsuario }}</p>
                <p>Correo: {{ $boleta->correoUsuario }}</p>
                <p>Teléfono: {{ $boleta->telefonoUsuario }}</p>
            </div>
            <div class="col-lg-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Números Solicitados</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                          @foreach($numeros as $numero)
                            <p>{{ $numero->numero }} &nbsp;</p>
                          @endforeach
                      </td>
                      <td>${{ number_format($boleta->totalBoleta,0,',','.') }}</td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>