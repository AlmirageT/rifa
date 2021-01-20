@extends('layouts.admin.app')
@section('title')
Imagenes Propiedades
@endsection
@section('css')
<link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Subir Imagenes</h3>
			</div>
		</div>
		<div class="card-body">
			<form action="{{ asset('administrador/propiedades/img-propiedad') }}/{{ $idPropiedad }}" class="dropzone" method="POST">
				@csrf
	            <div class="fallback">
	                <input name="file" type="file" multiple="multiple">
	            </div>
	            <div class="dz-message needsclick">
	                <div class="mb-3">
	                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
	                </div>
	                <h4>Ingrese imagenes a subir</h4>
	            </div>
	        </form>
        </div>
        
    </div>
    @if (count($imagenesPropiedades)>0)
        <div class="row">
            <div class="col-lg-12" align="center"> <h3> Galeria de Imagenes </h3> <br></div>
            @foreach ($imagenesPropiedades as $imagenPropiedad)
                <div class="col-lg-3">
                    <div class="card ">
						<div class="card-body">
							<img src="{{ asset($imagenPropiedad->urlImagen) }}" class="img-fluid"/>
						</div>
						<div class="card-footer">
							<a href="{{ asset('administrador/propiedades/eliminar-imagen') }}/{{ $imagenPropiedad->idImagenPropiedad }}" class="btn btn-danger">Eliminar</a>
						</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
@endsection