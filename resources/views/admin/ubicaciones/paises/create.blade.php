
<button class="btn btn-primary" data-toggle="modal" data-target="#create">Agregar Pais <i class="fas fa-plus"></i></button>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <form action="{{ route('mantenedor-paises.store') }}" method="POST" files="true" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nuevo Pais
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Nombre pais</label>
                            <input type="text" required class="form-control" placeholder="Ingrese un nombre de pais" name="nombrePais">
                        </div>
                    </div>
                    <div class="col-lg-12">
						<div class="form-group">
							<label>Foto Perfil</label>
							<input type="file" name="fotoPais" class="form-control"  onchange="selectFile(event)">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<img id="myimage_create" height="200">
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
	function selectFile(event) {
	  var selectedFile = event.target.files[0];
	  var reader = new FileReader();

	  var imgtag = document.getElementById("myimage_create");
	  imgtag.title = selectedFile.name;

	  reader.onload = function(event) {
	    imgtag.src = event.target.result;
	  };

	  reader.readAsDataURL(selectedFile);
	}
</script>
