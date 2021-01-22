@extends('layouts.mails.app')

@section('title', 'Boleta')
@section('textoTituloPrincipal', 'TU COMPRA HA SIDO EXITOSA')
@section('textoTituloSecundario', 'Comprobante de compra de numeros de tickets')
@section('textoParrafoUno')
Muchas gracias por comprar tus números de la suerte. Te adjuntamos un comprobante de compra de los tickets que elegiste. La premiación se realizará de acuerdo a las bases legales que podrás siempre consultar en https://rifomipropiedad.com, en la Notaria Manquehual de Santiago mediante via LIVE STREAMING vía youtube. <br><br><br>

Encuentra tu comprobante de números a tu nombre adjunto a este correo. <br><br><br>

Y además: Comparte esta gran oportunidad con tus amigos, familiares, compañeros de trabajo o cercanos a ti! <br><br><br>

Saludos del equipo de rifomipropiedad.com
@endsection
@section('bodyDetalles')

    <p style="font-size: 12px; line-height: 28px; text-align: left; margin: 0;">
        <span style="font-size: 16px;">
            Comprador: {{ $usuario->nombreUsuario }}
        </span>
    </p>
    <p style="font-size: 12px; line-height: 28px; text-align: left; margin: 0;">
        <span style="font-size: 16px;">
            Rut: {{ $usuario->rutUsuario }}
        </span>
    </p>
    <p style="font-size: 12px; line-height: 28px; text-align: left; margin: 0;">
        <span style="font-size: 16px;">
            Correo: {{ $usuario->correoUsuario }}
        </span>
    </p>
    <p style="font-size: 12px; line-height: 28px; text-align: left; margin: 0;">
        <span style="font-size: 16px;">
            Teléfono: {{ $usuario->telefonoUsuario }}
        </span>
    </p>
    <div><br></div>
    <div class="card">
      <div class="container">
        <p style="font-size: 12px; line-height: 21px; text-align: center; margin: 0;">
            <strong>
                <span style="font-size: 22px; line-height: 39px;">Números</span>
            </strong><br/>
        </p>
        @foreach($numeros as $numero)
            <p style="font-size: 12px; line-height: 21px; margin: 0;">
                <span style="font-size: 16px; line-height: 39px;">{{ $numero->numero }}</span>
            </p>
        @endforeach
        <p style="font-size: 12px; line-height: 21px; text-align: center; margin: 0;">
            <strong>
                <span style="font-size: 22px; line-height: 39px;">Total</span>
            </strong><br/>
        </p>
        <p style="font-size: 12px; line-height: 21px; margin: 0;">
            <span style="font-size: 16px; line-height: 39px;">${{ number_format($boleta->totalBoleta,0,',','.') }}</span>
        </p>
      </div>
    </div>
@endsection

    {{--  
@section('bodyCita')
    <div style="background-color:#F3F3F1;width:100% !important;">
        <div style="border-top:0px solid transparent; border-left:30px solid #FFFFFF; border-bottom:0px solid transparent; border-right:30px solid #FFFFFF; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
            <div style="color:#555555;font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:120%;padding-top:60px;padding-right:60px;padding-bottom:60px;padding-left:60px;">
                <div style="font-family: 'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif; font-size: 12px; line-height: 14px; color: #555555;">

                    <p style="font-size: 14px; line-height: 21px; margin: 0;">
                        <span style="font-size: 18px;">
                            Tus credenciales de acceso son:
                            <br>
                            <br>
                            Usuario: <a href="mailto:" target="_blank"></a><br>
                            <br>
                            Contraseña: 
                        </span>
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
    --}}
