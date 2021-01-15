<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$region->idRegion}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('mantenedor-regiones.update') }}/{{ $region->idRegion }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Editar Región
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Nombre región</label>
                                <input type="text" name="nombreRegion" class="form-control" placeholder="Ingrese un nombre" required value="{{ $region->nombreRegion }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Ordinal Región</label>
                                <input type="text" name="ordinalRegion" class="form-control" placeholder="Ingrese el ordinal de la región" value="{{ $region->ordinalRegion }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Pais</label>
                                <select name="idPais" required class="form-control">
                                    <option value="">Ingrese un pais</option>
                                    @foreach ($paises as $pais)
                                        @if ($pais->idPais == $region->idPais)
                                            <option value="{{ $pais->idPais }}" selected>{{ $pais->nombrePais }}</option>
                                        @endif
                                        <option value="{{ $pais->idPais }}">{{ $pais->nombrePais }}</option>
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
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
