<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tickets</title>
    <script src="https://kit.fontawesome.com/9987974c2b.js" crossorigin="anonymous"></script>
</head>
<body>
   <br> <br>
    @foreach ($numeros as $numero)
    <section class="flex" style="padding: 10px 1117px 10px 0px;font-family: helvetica;">
            <div class="ticket" style="border: 1px solid #264492;width: 65%;height: 373px;border-radius: 20px;border-right: none;overflow: hidden;">
                <h6 style="margin-left: 10px;margin-top: 10px;width: 240px;color: #264492;text-align: center;align-content: center;border-radius: 20px;padding: 5px;border: 1px solid #264492;">Comprobante Compra: {{ $boleta->idBoleta }}</h6>
                <div class="contenedor-info" style="width: 90%;justify-content: space-between;padding: 10px 20px;background-color: #f5f5f5;border-radius: 20px;margin: auto;font-size: 12px;">
                    <div class="datos-cliente" style="width: 45%;">
                        <ul style="list-style: none;margin-left: -42px;">
                            <li>Nombre Cliente: </li>
                            <strong>{{ $usuario->nombreUsuario }}</strong>
                            <li>RUT/DNI/Pasaporte: </li>
                            <strong>{{ $usuario->rutUsuario }}</strong>
                            <li>Correo: </li>
                            <strong>{{ $usuario->correoUsuario }}</strong>
                            <li>Teléfono: </li>
                            <strong>{{ $usuario->telefonoUsuario }}</strong>
                        </ul>

                        <ul style="list-style: none;margin-left: -42px;">
                            <li>Fecha Envío: <strong>{{ date("d-m-Y") }}</strong></li>
                            <li>Fecha de Reserva: <strong>{{ date("d-m-Y",strtotime($boleta->created_at)) }}</strong></li>
                            <li>Fecha de Validación: <strong>{{ date("d-m-Y") }}</strong></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="contenedor-logo-tkt" style="width: 100%;bottom: 0;">
                    <img class="logo-tkt" style="width: 20%;margin: auto;margin-left: 20px;" src="{{ asset('images/iconos/logo.png') }}" alt="">
                </div>
            </div>
            <div class="prepicado" style="border: 1px solid #264492;width: 25%;height: 373px;border-radius: 20px;border-left-style: dashed;margin-top: -375px;margin-left: 484px;">
                <h6 style="margin-left: 10px;margin-top: 10px;width: 161px;color: #264492;text-align: center;align-content: center;border-radius: 20px;padding: 5px;border: 1px solid #264492;">Comprobante Compra: {{ $boleta->idBoleta }}</h6>
                <div class="contenedor-img" style="width: 100%;margin-top: 30px;">
                    <div class="contenedor-codebar" style="width: 100%;">
                        <img class="code-bar" style="width: 110px;margin: auto;margin-left: 40px;" src="data:image/png;base64, {!! base64_encode($qr) !!}" alt="">
                    </div>
                    <p class="texto-qr" style="margin: 20px;font-size: 12px;text-align: center;">Consulta la validez de tu comprobante escaneando el siguiente codigo QR</p>
                    <div class="contenedor-logo" style="width: 50%;margin: auto;">
                        <img class="logo-prepicado" style="width: 50%;display: block;margin: auto;" src="{{ asset('images/iconos/logo.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="contenedor-compra" style="width: 45%;margin-top: -274px;margin-left: 218px;">
                <div class="compra" style="background-color: #f5f5f5;width: 100%;border-radius: 20px;width: 60%;justify-content: space-between;/*! padding: -6px -34px; */background-color: #f5f5f5;border-radius: 20px;margin: auto;font-size: 12px; ">
                    
                    <p class="titulos" style="text-align: center;">Tickets Comprados</p>
                    <ul style="list-style: none;padding-left: 48px;">
                        <li>{{ $numero->numero }} <strong>${{ number_format($numero->valorNumero,0,',','.')}}</strong></li>
                        <li><strong>TOTAL: ${{ number_format($numero->valorNumero,0,',','.')}}</strong></li>
                    </ul>
                </div>
            </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </section>
    <br>
    @endforeach
</body>
</html>