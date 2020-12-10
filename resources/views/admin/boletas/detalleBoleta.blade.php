@extends('layouts.admin.app')

@section('content')
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
                            @switch($boleta->idEstado)
                                @case(1)
                                    <input type="text" disabled class="form-control" value="Disponible"> 
                                @break
                                @case(2)
                                    <input type="text" disabled class="form-control" value="Comprado"> 
                                @break
                                @case(3)
                                    <input type="text" disabled class="form-control" value="Validado"> 
                                @break
                                @case(4)
                                    <input type="text" disabled class="form-control" value="Liberada"> 
                                @break
                            @endswitch
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">Volver</a>
                    </div>
                </div>
            </div>
        </div>                
    </div>
@endsection

