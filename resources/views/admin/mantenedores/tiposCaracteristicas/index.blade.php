@extends('layouts.admin.app')
@section('title')
Tipo Caracteristica
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Tipo Caracteristica</h3> 
	</div>
	@include('admin.mantenedores.tiposCaracteristicas.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre Caracteristica</th>
				      <th>itag</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($tiposCaracteristicas as $tipoCaracteristica)
					    <tr>
					      <td>{{ $tipoCaracteristica->idTipoCaracteristica }}</td>
					      <td>{{ $tipoCaracteristica->nombreTipoCaracteristica }}</td>
					      <td>{{ $tipoCaracteristica->itag }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipoCaracteristica->idTipoCaracteristica }}">Editar</a>
		                			@include('admin.mantenedores.tiposCaracteristicas.destroy')
		                        </div>
		                    </div>
					      </td>
		                    @include('admin.mantenedores.tiposCaracteristicas.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
