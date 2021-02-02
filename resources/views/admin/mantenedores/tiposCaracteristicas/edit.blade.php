<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$tipoCaracteristica->idTipoCaracteristica}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('mantenedor-tipos-caracteristicas.update',$tipoCaracteristica->idTipoCaracteristica) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Caracteristica
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nombre Caracteristica</label>
                            <input type="text" name="nombreTipoCaracteristica" class="form-control" placeholder="Ingrese un nombre" required value="{{ $tipoCaracteristica->nombreTipoCaracteristica }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">itag</label>
                            <input type="text" name="itag" class="form-control" placeholder="Ingrese un nombre" required value="{{ $tipoCaracteristica->itag }}">
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
