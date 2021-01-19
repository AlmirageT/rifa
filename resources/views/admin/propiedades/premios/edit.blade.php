<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$premio->idPremio}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('mantenedor-premios.update',$premio->idPremio) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{ $idPropiedad }}" name="idPropiedad">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Premio
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Descripción Premio</label>
                            <textarea class="form-control summernote" name="descripcion" required>{{ $premio->descripcion }}</textarea>
    
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Tipo de Premio</label>
                            <select name="idTipoPremio" class="form-control" required>
                                <option value="">Seleccione tipo de premio</option>
                                @foreach ($tiposPremios as $tipoPremio)
                                    @if ($tipoPremio->idTipoPremio == $premio->idTipoPremio)
                                        <option value="{{ $tipoPremio->idTipoPremio }}" selected>{{ $tipoPremio->nombreTipoPremio }}</option>
                                    @else
                                        <option value="{{ $tipoPremio->idTipoPremio }}">{{ $tipoPremio->nombreTipoPremio }}</option>
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
