@extends('layouts.admin.app')
@section('title')
Crear Usuario
@endsection

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Crear Usuario</h3>
			</div>
		</div>
        <form action="{{ route('mantenedor-usuarios.store') }}" method="POST" file="true" enctype="multipart/form-data">
        	@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombreUsuario" class="form-control" placeholder="Ingrese Nombre" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="email" name="correoUsuario" class="form-control" placeholder="Ingrese correo" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+56</span>
                                  </div>
                                  <input type="number" class="form-control" name="telefonoUsuario" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">RUT/DNI/Pasaporte</label>
                                <input type="text" name="rutUsuario" class="form-control" placeholder="Ingrese RUT/DNI/Pasaporte" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Tipo de Usuario</label>
                                <select name="idTipoUsuario" class="form-control" required onchange="contrasenaUsuario(this.value)">
                                    <option value="">Seleccione</option>
                                    <option value="usuario">comprador</option>
                                    @foreach ($tiposUsuarios as $tipoUsuario)
                                        <option value="{{ $tipoUsuario->idTipoUsuario }}">{{ $tipoUsuario->nombreTipoUsuario }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" style="display: none" id="contrasena">
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
