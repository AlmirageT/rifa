@extends('layouts.admin.app')
@section('title')
Tipos Estados
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Tipos Estados</h3> 
	</div>
	@include('admin.mantenedores.tiposEstados.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($tiposEstados as $tipoEstado)
					    <tr>
					      <td>{{ $tipoEstado->idTipoEstado }}</td>
					      <td>{{ $tipoEstado->nombreTipoEstado }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $tipoEstado->idTipoEstado }}">Editar</a>
		                			@include('admin.mantenedores.tiposEstados.destroy')
		                        </div>
		                    </div>
					      </td>
		                    @include('admin.mantenedores.tiposEstados.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
