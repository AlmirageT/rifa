@extends('layouts.mails.app')

@section('title', 'Bienvenido')

@section('bodyDetalles')
    <p style="font-size: 12px; line-height: 28px; text-align: left; margin: 0;">
        <span style="font-size: 16px;">
            Folio de boleta : {{ $boleta->idBoleta }}
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
        @foreach($numerosComprados as $numeroComprado)
            <p style="font-size: 12px; line-height: 21px; margin: 0;">
                <span style="font-size: 16px; line-height: 39px;">{{ $numeroComprado }}</span>
            </p>
        @endforeach
        <p style="font-size: 12px; line-height: 21px; text-align: center; margin: 0;">
            <strong>
                <span style="font-size: 22px; line-height: 39px;">Total</span>
            </strong><br/>
        </p>
        <p style="font-size: 12px; line-height: 21px; margin: 0;">
            <span style="font-size: 16px; line-height: 39px;">${{ number_format($total,0,',','.') }}</span>
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
