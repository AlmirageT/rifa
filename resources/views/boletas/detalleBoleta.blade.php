<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
        @toastr_css
    </head>
    <body>
        <div class="container">
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12" align="center">
                            <h5>Datos Usuario</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre Comprador</label>
                                <input type="text" disabled class="form-control" value="{{ $boleta->nombreUsuario }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Correo Comprador</label>
                                <input type="text" disabled class="form-control" value="{{ $boleta->correoUsuario }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Rut Comprador</label>
                                <input type="text" disabled class="form-control" value="{{ $boleta->rutUsuario }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Teléfono Comprador</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+56</span>
                                  </div>
                                  <input type="text" disabled class="form-control" value="{{ $boleta->telefonoUsuario }}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" align="center">
                            <h5>Números</h5>
                        </div>
                        <div class="col-lg-12">
                            @foreach($numeros as $numero)
                                <p>{{ $numero->numero }}</p>
                            @endforeach
                        </div>
                        <div class="col-lg-12" align="center">
                            <h5>Datos Boleta</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Total</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                  </div>
                                  <input type="text" disabled class="form-control" aria-describedby="basic-addon1" value="{{ number_format($boleta->totalBoleta,0,',','.') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Estado</label>
                                @if($numeros->first()->idEstado == 1)
                                    <input type="text" disabled class="form-control" value="Disponible"> 
                                @else
                                    <input type="text" disabled class="form-control" value="Comprado"> 
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">Volver</a>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
        @toastr_js
        @toastr_render
    </body>
</html>
