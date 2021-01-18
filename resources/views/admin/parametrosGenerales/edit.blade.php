<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$parametroGeneral->idParametroGeneral}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('mantenedor-parametros-generales.update',$parametroGeneral->idParametroGeneral) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Estado
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    x
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre parametro general</label>
                            <input type="text" name="nombreParametroGeneral" class="form-control" placeholder="Ingrese un nombre" required value="{{ $parametroGeneral->nombreParametroGeneral }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Valor parametro general</label>
                            <input type="text" name="valorParametroGeneral" class="form-control" placeholder="Ingrese un valor" required value="{{ $parametroGeneral->valorParametroGeneral }}">

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
