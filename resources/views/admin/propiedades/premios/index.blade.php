@extends('layouts.admin.app')
@section('title')
Premios 
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div align="center">
                <h3>Premios</h3>
            </div>
        </div>
        <form action="{{ route('mantenedor-premios.store') }}" method="POST" file="true" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <input type="hidden" value="{{ $idPropiedad }}" name="idPropiedad">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Descripción Premio</label>
                            <textarea class="form-control summernote" name="descripcion" required></textarea>
    
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Tipo de Premio</label>
                            <select name="idTipoPremio" class="form-control" required>
                                <option value="">Seleccione tipo de premio</option>
                                @foreach ($tiposPremios as $tipoPremio)
                                    <option value="{{ $tipoPremio->idTipoPremio }}">{{ $tipoPremio->nombreTipoPremio }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Imagen/GIF Premio</label>
                            <input type="file" class="form-control" name="imagenPremio">
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
                        <th>Descripción Premio</th>
                        <th>Tipo de Premio</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($premios as $premio)
                            <tr>
                                <td>{{ $premio->idPremio }}</td>
                                <td>{!! $premio->descripcion !!}</td>
                                <td>{{ $premio->nombreTipoPremio }}</td>
                                <td><img src="{{ asset($premio->imagenPremio) }}" width="100" /></td>
                                <td>
                                    <div class="dropdown">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu">
                                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#edit{{ $premio->idPremio }}">Editar</a>
                                        @include('admin.propiedades.premios.destroy')
                                    </div>
                                </div>
                                </td>
                                @include('admin.propiedades.premios.edit')
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