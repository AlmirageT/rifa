<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$pais->idPais}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('mantenedor-paises.update',$pais->idPais) }}" method="POST" files="true" enctype="multipart/formdata">
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
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre pais</label>
                            <input type="text" required class="form-control" placeholder="Ingrese un nombre de pais" name="nombrePais" value="{{ $pais->nombrePais }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Foto Perfil</label>
                            <input type="file" name="fotoPais" class="form-control" onchange="onFileSelected(event)">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <img id="myimage_edit" height="200" src="{{ asset($pais->fotoPais) }}">
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
<script>
    function onFileSelected(event) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();

      var imgtag = document.getElementById("myimage_edit");
      imgtag.title = selectedFile.name;

      reader.onload = function(event) {
        imgtag.src = event.target.result;
      };

      reader.readAsDataURL(selectedFile);
    }
</script>
