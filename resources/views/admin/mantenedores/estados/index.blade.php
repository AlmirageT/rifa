@extends('layouts.admin.app')
@section('title')
Estados
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Estados</h3> 
	</div>
	@include('admin.mantenedores.estados.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre de Estado</th>
				      <th>Tipo de Estado</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($estados as $estado)
					    <tr>
					      <td>{{ $estado->idEstado }}</td>
					      <td>{{ $estado->nombreEstado }}</td>
					      <td>{{ $estado->nombreTipoEstado }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
					      			<a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $estado->idEstado }}">Editar</a>
		                			@include('admin.mantenedores.estados.destroy')
		                        </div>
		                    </div>
					      </td>
		                    @include('admin.mantenedores.estados.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
