<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css2/bootstrap377.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Comprobante de compra</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-1">
            <img src="/images/variantes logo rifopoly-05.png" width="150">
        </div>
        <div class="col-lg-3 offset-6">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Fecha Envio:</th>
                        <td>{{ $hoy = date("d-m-Y") }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha de Reserva:</th>
                        <td>{{ date("d-m-Y", strtotime($boleta->created_at)) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha Validación:</th>
                        <td>{{ $hoy = date("d-m-Y") }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <h3 class="text-center"><strong>Comprobante de Compra: </strong></h3>
    <!-- Datos del propietario -->
    <div class="row">
        <div class="col-lg-12">
            <p><strong>Cliente: {{ $usuario->nombreUsuario }}</strong></p>
            <p><strong>RUT/DNI/Pasaporte: {{ $usuario->rutUsuario }}</strong></p>
            <p><strong>Correo: {{ $usuario->correoUsuario }}</strong></p>
            <p><strong>Teléfono: {{ $usuario->telefonoUsuario }}</strong></p>
        </div>
    </div>
    <hr>
    <!-- Datos de la propiedad -->
    <div class="row">
        <div class="col-lg-12">
            <table class="table" style="font-size: 18px;">
                <thead>
                    <tr>
                        <th>Tickets Comprados</th>
                        <th>Propiedad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($numeros as $numero)
                        <tr>
                            <td>{{ $numero->numero }}</td>
                            <td>
                                @if($propiedad->where('idPropiedad',$numero->idPropiedad)->first()->idPropiedad == $numero->idPropiedad)
                                {{ $propiedad->first()->nombrePropiedad }}
                                @endif
                            </td>
                            <td>$ {{ number_format($numero->valorNumero,0,',','.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td>$ {{ number_format($boleta->totalBoleta,0,',','.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <footer style="background-color: white">
        <div class="text-center">
            
            <img src="data:image/png;base64, {!! base64_encode($qr) !!}">
        </div>
        <div class="text-center" align="center">
            <p>Consulta la validez de tu comprobante escaneando el siguiente codigo QR</p>
        </div>
    </footer>
</body>
</html>
