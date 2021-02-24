@extends('layouts.admin.app')
@section('title')
Actualizar Usuario
@endsection

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Actualizar Usuario</h3>
			</div>
		</div>
        <form action="{{ route('mantenedor-usuarios.update',$usuario->idUsuario) }}" method="POST" file="true" enctype="multipart/form-data">
            @method('PUT')
        	@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombreUsuario" class="form-control" placeholder="Ingrese Nombre" required value="{{ $usuario->nombreUsuario }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="email" name="correoUsuario" class="form-control" placeholder="Ingrese correo" required value="{{ $usuario->correoUsuario }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <select name="codigoPais" class="form-control">
                                        @foreach ($codigosPaises as $codigoPais)
                                            @if ($codigoPais->codigoPais == $usuario->codigoPais)
                                                <option value="{{ $codigoPais->codigoPais }}" selected>{{ $codigoPais->codigoPais }}</option>
                                            @else
                                                <option value="{{ $codigoPais->codigoPais }}">{{ $codigoPais->codigoPais }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                  </div>
                                  <input type="number" class="form-control" name="telefonoUsuario" aria-describedby="basic-addon1" required value="{{ $usuario->telefonoUsuario }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">RUT/DNI/Pasaporte</label>
                                <input type="text" name="rutUsuario" class="form-control" placeholder="Ingrese RUT/DNI/Pasaporte" required value="{{ $usuario->rutUsuario }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Tipo de Usuario</label>
                                <select name="idTipoUsuario" class="form-control" required onchange="contrasenaUsuario(this.value)">
                                    <option value="">Seleccione</option>
                                    @if ($usuario->idTipoUsuario == null)
                                        <option value="usuario" selected>comprador</option>
                                        @foreach ($tiposUsuarios as $tipoUsuario)
                                            <option value="{{ $tipoUsuario->idTipoUsuario }}">{{ $tipoUsuario->nombreTipoUsuario }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($tiposUsuarios as $tipoUsuario)
                                            @if ($usuario->idTipoUsuario == $tipoUsuario->idTipoUsuario)
                                                <option value="usuario">comprador</option>
                                                <option value="{{ $tipoUsuario->idTipoUsuario }}" selected>{{ $tipoUsuario->nombreTipoUsuario }}</option>
                                            @else
                                                <option value="{{ $tipoUsuario->idTipoUsuario }}" selected>{{ $tipoUsuario->nombreTipoUsuario }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                    
                                </select>
                            </div>
                        </div>
                        @php
                            if($usuario->idTipoUsuario == null){
                                $display = 'none';
                            }else{
                                $display = 'block';
                            }   
                        @endphp
                        <div class="col-lg-12" style="display: {{ $display }}" id="contrasena">
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="password" name="password" class="form-control" placeholder="************">
                            </div>
                        </div>
					</div>
				</div>
				<div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Agregar Usuario</button>
                </div>
        </form>
	</div>
</div>
@endsection
@section('scripts')
<script>
    function contrasenaUsuario(valorSelect){
        if(valorSelect == "usuario"){
            document.getElementById('contrasena').style.display = 'none';
        }else{
            document.getElementById('contrasena').style.display = 'block';
        }
    }
</script>
@endsection
