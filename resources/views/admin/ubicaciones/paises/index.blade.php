@extends('layouts.admin.app')
@section('title')
Paises
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Paises</h3> 
	</div>
	@include('admin.ubicaciones.paises.create')
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
				      <th>Foto</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($paises as $pais)
					    <tr>
					      <td>{{ $pais->idPais }}</td>
					      <td>{{ $pais->nombrePais }}</td>
					      <td>
					      	@if($pais->fotoPais)
					      		<img src="{{ asset($pais->fotoPais) }}" width="100" height="100">
					      	@else
					      		no posee imagen
					      	@endif
					      </td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
		                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $pais->idPais }}">Editar</a>
		                            @include('admin.ubicaciones.paises.destroy')
		                        </div>
		                    </div>
					      		
					      </td>
		                    @include('admin.ubicaciones.paises.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection