@extends('layouts.admin.app')
@section('title')
Provincias
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12" align="center">
        <h3>Editar Provincia</h3> 
    </div>
</div>
<form action="{{ route('mantenedor-provincias.update',$provincia->idProvincia) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">Nombre provincia</label>
                <input type="text" name="nombreProvincia" class="form-control" placeholder="Ingrese un nombre" required value="{{ $provincia->nombreProvincia }}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Pais</label>
                <select name="idPais" onchange="sacarRegionPorPais(this.value)" required class="form-control">
                    <option value="">Seleccione un país</option>
                    @foreach ($paises as $pais)
                        @if ($pais->idPais == $provincia->idPais)
                            <option value="{{ $pais->idPais }}" selected>{{ $pais->nombrePais }}</option>
                        @else
                            <option value="{{ $pais->idPais }}">{{ $pais->nombrePais }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Regiones</label>
                <select name="idRegion" id="select_regiones" class="form-control" required>
                    <option value="">Seleccione una region</option>
                    @foreach ($regiones as $region)
                        @if ($region->idRegion == $provincia->idRegion)
                            <option value="{{ $region->idRegion }}" selected>{{ $region->nombreRegion }}</option>
                        @else
                            <option value="{{ $region->idRegion }}">{{ $region->nombreRegion }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary btn-block">
            Actualizar
        </button>
    </div>
</form>
@endsection
<script>
    const sacarRegionPorPais = (pais) => {
        $.get('{{ asset('regiones') }}/'+pais, (data, status) => {
            var regiones = "<option value=''>Seleccione una región</option>";
            data.forEach(region => {
                regiones += `<option value="${region['idRegion']}">${region['nombreRegion']}</option>`;
            });
            document.getElementById('select_regiones').innerHTML = regiones;
        });
    }
</script>