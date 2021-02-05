@extends('layouts.mails.app')

@section('title', 'Boleta')
@section('textoTituloPrincipal')
¡Hola {{ $usuario->nombreUsuario }} tu numero de la suerte ya está confirmado!
@endsection
@section('textoTituloSecundario')
¿Te imaginas ser el ganador?
@endsection
@section('textoParrafoUno')
Mr. Rifopoly te desea mucha suerte y cree que este puede ser el ticket ganador.
<br><br><br>
Te adjuntamos un comprobante de compra de los tickets que elegiste. La premiación se realizará en vivo mediante STREAMING por YouTube en la Notaría Manquehual de Santiago, de acuerdo a las bases legales que podrás consultar en {{ asset('/') }}. <br><br><br>
¡Y recuerda... compartir esta gran oportunidad con tus amigos y familiares! <br><br>
<img src="{{ asset('images/ticket_Mesa de trabajo 1 copia.jpg') }}" width="550"/> <br><br><br>
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
