@extends('layouts.admin.app')
@section('title')
Propiedades
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Propiedades</h3> 
	</div>
	<div class="col-lg-12">
        <a href="{{ asset('administrador/propiedades/create') }}" class="btn btn-primary">Agregar Propiedad</a>
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
				      <th>Nombre Propiedad</th>
				      <th>Foto Principal</th>
				      <th>Caracteristicas</th>
				      <th>Foto Mapa</th>
				      <th>Descripción Propiedad</th>
				      <th>m2 Construidos</th>
				      <th>m2 Superficie</th>
				      <th>m2 Terraza</th>
				      <th>Video</th>
				      <th>Mattleport</th>
				      <th>Dirección Propiedad</th>
				      <th>Numeración Propiedad</th>
				      <th>Pais</th>
				      <th>Región</th>
				      <th>Provincia</th>
				      <th>Comuna</th>
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
		"url": "{{ asset('datatable-propiedades') }}",
		"dataType": "json",
		"type": "POST",
		"data":{ _token: "{{csrf_token()}}"}
	},
		"columns": [
			{ "data": "idPropiedad" },
			{ "data": "nombrePropiedad" },
			{ "data": "fotoPrincipal" },
			{ "data": "caracteristicasPropiedad" },
			{ "data": "fotoMapa" },
			{ "data": "descripcionPropiedad" },
			{ "data": "mConstruidos" },
			{ "data": "mSuperficie" },
			{ "data": "mTerraza" },
			{ "data": "urlVideo" },
			{ "data": "urlMattlePort" },
			{ "data": "direccionPropiedad" },
			{ "data": "numeracionPropiedad" },
			{ "data": "idPais" },
			{ "data": "idRegion" },
			{ "data": "idProvincia" },
			{ "data": "idComuna" },
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