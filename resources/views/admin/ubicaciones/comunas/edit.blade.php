@extends('layouts.admin.app')
@section('title')
Comunas
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12" align="center">
        <h3>Editar Comuna</h3> 
    </div>
</div>
<form action="{{ route('mantenedor-comunas.update',$comuna->idComuna) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">Nombre Comuna</label>
                <input type="text" name="nombreComuna" class="form-control" placeholder="Ingrese un nombre" required value="{{ $comuna->nombreComuna }}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Pais</label>
                <select name="idPais" id="paises" class="form-control" required onchange="sacarRegionPorPais(this.value)">
                    <option value="">Seleccione País</option>
                    @foreach ($paises as $pais)
                        @if ($pais->idPais == $comuna->idPais)
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
                <label>Región</label>
                <select name="idRegion" id="select_regiones" class="form-control" required onchange="sacarProvinciaPorRegion(this.value)">
                    <option value="">Seleccione Región</option>
                    @foreach ($regiones as $region)
                        @if ($region->idRegion == $comuna->idRegion)
                            <option value="{{ $region->idRegion }}" selected>{{ $region->nombreRegion }}</option>
                        @else
                            <option value="{{ $region->idRegion }}">{{ $region->nombreRegion }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Provincia</label>
                <select name="idProvincia" id="select_provincias" class="form-control" required >
                    <option value="">Seleccione provincia</option>
                    @foreach ($provincias as $provincia)
                        @if ($provincia->idProvincia == $comuna->idProvincia)
                            <option value="{{ $provincia->idProvincia }}" selected>{{ $provincia->nombreProvincia }}</option>
                        @else
                            <option value="{{ $provincia->idProvincia }}">{{ $provincia->nombreProvincia }}</option>
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
    const sacarProvinciaPorRegion = (region) => {
        $.get('{{ asset('provincias') }}/'+region, (data, status) => {
            var provincias = "<option value=''>Seleccione una provincia</option>";
            data.forEach(provincia => {
                provincias += `<option value="${provincia['idProvincia']}">${provincia['nombreProvincia']}</option>`;
            });
            document.getElementById('select_provincias').innerHTML = provincias;
        });
    }
</script>