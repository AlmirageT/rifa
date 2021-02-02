<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$estado->idEstado}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('mantenedor-estados.update',$estado->idEstado) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Estado
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nombre Estado</label>
                            <input type="text" name="nombreEstado" class="form-control" placeholder="Ingrese un nombre" required value="{{ $estado->nombreEstado }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Tipo de Estado</label>
                            <select name="idTipoEstado" class="form-control" required>
                                <option value="">Seleccione tipo estado</option>
                                @foreach ($tiposEstados as $tipoEstado)
                                    @if ($estado->idTipoEstado == $tipoEstado->idTipoEstado)
                                        <option value="{{ $tipoEstado->idTipoEstado }}" selected>{{ $tipoEstado->nombreTipoEstado }}</option>
                                    @else
                                        <option value="{{ $tipoEstado->idTipoEstado }}">{{ $tipoEstado->nombreTipoEstado }}</option>
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
