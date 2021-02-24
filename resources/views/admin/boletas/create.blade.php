
@extends('layouts.admin.app')
@section('title')
Rifo Mi Propiedad - Administrador
@endsection
@section('content')
        <br>
        <div class="row">
            <div class="col-lg-12" align="center">
                <h3>Crear Boletas</h3> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ route('mantenedor-boletas.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Nombre Comprador</label>
                                        <input type="text" required class="form-control" name="nombreUsuario">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Correo Comprador</label>
                                        <input type="email" required class="form-control" name="correoUsuario">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Teléfono Comprador</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select name="codigoPais" class="form-control">
                                                    @foreach ($codigosPaises as $codigoPais)
                                                        @if ($codigoPais->nombrePais == "Chile")
                                                            <option value="{{ $codigoPais->codigoPais }}" selected>{{ $codigoPais->codigoPais }}</option>
                                                        @else
                                                            <option value="{{ $codigoPais->codigoPais }}">{{ $codigoPais->codigoPais }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="number" class="form-control" name="telefonoUsuario" aria-describedby="basic-addon1" required>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Rut Comprador</label>
                                        <input type="text" required class="form-control" name="rutUsuario" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Cantidad Números</label>
                                        <input type="number" class="form-control" name="cantidadNumeros" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Propiedad</label>
                                        <select name="idPropiedad" class="form-control" required >
                                            <option value="">Seleccione Propiedad</option>
                                            @foreach ($propiedades as $propiedad)
                                                <option value="{{ $propiedad->idPropiedad }}">{{ $propiedad->nombrePropiedad }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary btn-block" type="submit">Enviar Boleta</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
