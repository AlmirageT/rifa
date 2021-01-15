@extends('layouts.admin.app')
@section('title')
Regiones
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12" align="center">
		<h3>Regiones</h3> 
	</div>
	@include('admin.ubicaciones.regiones.create')
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="">
			<div class="table-responsive">
				<table class="table project-list-table table-nowrap table-centered table-borderless">
				  <thead>
				    <tr>
			          <th>ID</th>
				      <th>Nombre Region</th>
				      <th>Ordinal Region</th>
				      <th>Nombre Pais</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($regiones as $region)
					    <tr>
					      <td>{{ $region->idRegion }}</td>
					      <td>{{ $region->nombreRegion }}</td>
					      <td>{{ $region->ordinalRegion }}</td>
					      <td>{{ $region->nombrePais }}</td>
					      <td>
					      	<div class="dropdown">
		                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
		                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
		                        </a>
		                        <div class="dropdown-menu dropdown-menu">
		                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $region->idRegion }}">Editar</a>
		                            @include('admin.ubicaciones.regiones.destroy')
		                        </div>
		                    </div>
					      		
					      </td>
		                    @include('admin.ubicaciones.regiones.edit')
					    </tr>
					@endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection