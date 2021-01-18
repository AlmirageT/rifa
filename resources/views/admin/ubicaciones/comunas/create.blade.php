
<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Comuna <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <form action="{{ route('mantenedor-comunas.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nueva Comuna
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre Comuna</label>
                            <input type="text" name="nombreComuna" class="form-control" placeholder="Ingrese un nombre" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Pais</label>
                            <select name="idPais" id="paises" class="form-control" required onchange="sacarRegionPorPais(this.value)">
                                <option value="">Seleccione País</option>
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->idPais }}">{{ $pais->nombrePais }}</option>
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
                                    <option value="{{ $region->idRegion }}">{{ $region->nombreRegion }}</option>
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
                                    <option value="{{ $provincia->idProvincia }}">{{ $provincia->nombreProvincia }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
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
