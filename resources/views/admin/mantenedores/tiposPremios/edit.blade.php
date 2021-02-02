<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$tipoPremio->idTipoPremio}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('mantenedor-tipos-premios.update',$tipoPremio->idTipoPremio) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Tipo Premio
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nombre Tipo Premio</label>
                            <input type="text" name="nombreTipoPremio" class="form-control" placeholder="Ingrese un nombre" required value="{{ $tipoPremio->nombreTipoPremio }}">
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
