@extends('layouts.admin.app')
@section('title')
Caracteristicas 
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div align="center">
                <h3>Caracteristicas</h3>
            </div>
        </div>
        <form action="{{ route('mantenedor-caracteristicas.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <input type="hidden" value="{{ $idPropiedad }}" name="idPropiedad">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Descripción Caracteristica</label>
                            <input type="text" name="descripcionCaracterisitca" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Tipo de Caracteristica</label>
                            <select name="idTipoCaracteristica" class="form-control" required>
                                <option value="">Seleccione tipo de caracteristica</option>
                                @foreach ($tiposCaracteristicas as $tipoCaracteristica)
                                    <option value="{{ $tipoCaracteristica->idTipoCaracteristica }}">{{ $tipoCaracteristica->nombreTipoCaracteristica }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-primary btn-block" type="submit">Agregar Premio</button>
                    </div>
                </div>
            </div>
        </form>

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
                        <th>Descripción Caracteristica</th>
                        <th>Tipo Caracteristica</th>
                        <th>Itag</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($propiedadesCaracteristicas as $propiedadCaracteristica)
                            <tr>
                                <td>{{ $propiedadCaracteristica->idPropiedadCaracteristica }}</td>
                                <td>{{  $propiedadCaracteristica->descripcionCaracterisitca  }}</td>
                                <td>{{ $propiedadCaracteristica->nombreTipoCaracteristica }}</td>
                                <td><i class="{{ $propiedadCaracteristica->itag }}"></i>   </td>
                                <td>
                                    <div class="dropdown">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu">
                                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $propiedadCaracteristica->idPropiedadCaracteristica }}">Editar</a>
                                        @include('admin.propiedades.caracteristicas.destroy')
                                    </div>
                                </div>
                                </td>
                                @include('admin.propiedades.caracteristicas.edit')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 200
    });

</script>
@endsection