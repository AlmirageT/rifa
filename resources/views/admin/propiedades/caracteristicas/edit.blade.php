<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$propiedadCaracteristica->idPropiedadCaracteristica}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('mantenedor-caracteristicas.update',$propiedadCaracteristica->idPropiedadCaracteristica) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{ $idPropiedad }}" name="idPropiedad">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Caracteristica
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" value="{{ $idPropiedad }}" name="idPropiedad">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Descripción Caracteristica</label>
                            <input type="text" name="descripcionCaracterisitca" class="form-control" required value="{{ $propiedadCaracteristica->descripcionCaracterisitca }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Tipo de Caracteristica</label>
                            <select name="idTipoCaracteristica" class="form-control" required>
                                <option value="">Seleccione tipo de caracteristica</option>
                                @foreach ($tiposCaracteristicas as $tipoCaracteristica)
                                    @if ($tipoCaracteristica->idTipoCaracteristica == $propiedadCaracteristica->idTipoCaracteristica)
                                        <option value="{{ $tipoCaracteristica->idTipoCaracteristica }}" selected>{{ $tipoCaracteristica->nombreTipoCaracteristica }}</option>
                                    @else
                                        <option value="{{ $tipoCaracteristica->idTipoCaracteristica }}">{{ $tipoCaracteristica->nombreTipoCaracteristica }}</option>
                                    @endif
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
