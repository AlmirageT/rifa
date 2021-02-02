@extends('layouts.mails.app')

@section('title', 'Boleta')
@section('textoTituloPrincipal')
@if (count($numeros)>1)
LA COMPRA DE TUS TICKETS HA SIDO EXITOSA
@else
LA COMPRA DE TU TICKET HA SIDO EXITOSA
@endif

@endsection
@section('textoTituloSecundario')
@if (count($numeros)>1)
Comprobante de compra de numeros de tickets
@else
Comprobante de compra del numero del ticket
@endif
@endsection
@section('textoParrafoUno')
@if (count($numeros)>1)
Muchas gracias por comprar tus tickets. <br><br><br>
@else
Muchas gracias por comprar tu ticket. <br><br><br>
@endif
Adjunto encontrarás los tickets asociados a la rifa @if (count($propiedad)>1)
    @foreach ($propiedad as $propi)
        {{ $propi->nombrePropiedad }}
    @endforeach
@else
    {{ $propiedad->first()->nombrePropiedad }}
@endif. <br><br><br>
La premiación se realizará de acuerdo a las bases legales que podrás siempre consultar en {{ asset('/') }}, en la Notaria Manquehual de Santiago mediante via LIVE STREAMING vía youtube. <br><br><br>
Y además: Comparte esta gran oportunidad con tus amigos, familiares, compañeros de trabajo o cercanos a ti! <br><br><br>
Saludos del equipo.
<img src="{{ asset('images/iconos/logo.png') }}"/> <br><br><br>
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
    <p style="font-size: 12px; line-height: 28px; text-align: left; margin: 0;">
        <span style="font-size: 16px;">
            Fecha Transacción: {{ date("d-m-Y") }}
        </span>
    </p>
    <div><br></div>

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
