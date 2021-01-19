@extends('layouts.admin.app')
@section('title')
Usuarios
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Usuarios</h3> 
	</div>
	<div class="col-lg-12">
        <a href="{{ asset('administrador/usuarios/create') }}" class="btn btn-primary">Agregar Usuario</a>
    </div>
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered dt-responsive nowrap" id="datos" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre</th>
				      <th>Correo</th>
				      <th>Teléfono</th>
				      <th>Rut/DNI/Pasaporte</th>
				      <th>Tipo Usuario</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function () {
	$('#datos').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax":{
		"url": "{{ asset('datatable-usuarios') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idUsuario" },
			{ "data": "nombreUsuario" },
			{ "data": "correoUsuario" },
			{ "data": "telefonoUsuario" },
			{ "data": "rutUsuario" },
			{ "data": "idTipoUsuario" },
			{ "data": "options" }
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _END_ de _TOTAL_ Entradas",
			"infoEmpty": "No existen registros",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
			"first": "Primero",
			"last": "Ultimo",
			"next": "Siguiente",
			"previous": "Anterior"
		}
	},
	});
});
</script>
@endsection