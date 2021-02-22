@extends('layouts.admin.app')
@section('title')
Imagenes Propiedades
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
@endsection
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Subir Imagenes</h3>
			</div>
		</div>
		<div class="card-body">
			{{--  
			<form action="{{ asset('administrador/propiedades/img-propiedad') }}/{{ $idPropiedad }}" class="dropzone" method="POST">
				@csrf
	            <div class="fallback">
	                <input name="file" type="file" multiple="multiple">
	            </div>
	            <div class="dz-message needsclick">
	                <div class="mb-3">
	                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
	                </div>
	                <h4>Ingrese imagenes a subir</h4>
	            </div>
	        </form>--}}
			<div id="dZUpload" class="dropzone"
			paramName: "file",>
				<div class="text-center">Agrega las fotos aqui...</div>
				<div class="dz-default dz-message"></div>
			</div>
        </div>
        
    </div>
    @if (count($imagenesPropiedades)>0)
        <div class="row">
            <div class="col-lg-12" align="center"> <h3> Galeria de Imagenes </h3> <br></div>
            @foreach ($imagenesPropiedades as $imagenPropiedad)
                <div class="col-lg-3">
                    <div class="card ">
						<div class="card-body">
							<img src="{{ asset($imagenPropiedad->urlImagen) }}" class="img-fluid"/>
						</div>
						<div class="card-footer">
							<a href="{{ asset('administrador/propiedades/eliminar-imagen') }}/{{ $imagenPropiedad->idImagenPropiedad }}" class="btn btn-danger">Eliminar</a>
						</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="https://unpkg.com/cropperjs"></script>
<script type="text/javascript">
	Dropzone.autoDiscover = false;
	$(document).ready(function () {
		$("#dZUpload").dropzone({
			transformFile: function(file, done) { 
				//crea el editor de la imagen
				var editor = document.createElement('div');
				editor.style.position = 'fixed';
				editor.style.left = 0;
				editor.style.right = 0;
				editor.style.top = 0;
				editor.style.bottom = 0;
				editor.style.zIndex = 9999;
				editor.style.backgroundColor = '#000';
				document.body.appendChild(editor);

				// crea boton de confirmacion
				var buttonConfirm = document.createElement('button');
				buttonConfirm.style.position = 'absolute';
				buttonConfirm.style.left = '10px';
				buttonConfirm.style.top = '10px';
				buttonConfirm.style.zIndex = 9999;
				buttonConfirm.textContent = 'Confirm';
				editor.appendChild(buttonConfirm);
				buttonConfirm.addEventListener('click', function() {    
					// obtener la nueva imagen que devuelve Cropper.js
					var canvas = cropper.getCroppedCanvas({
						width: 1024,
						height: 683
					});  // devuelve la imagen en blob
					canvas.toBlob(function(blob) {    // devulve el archivo a Dropzone
						done(blob);  
					});
					document.body.removeChild(editor);  // eliminar editor de la vista
				});
				// crear imagen con cropper.js
				var image = new Image();
				image.src = URL.createObjectURL(file);
				editor.appendChild(image);
				
				// Crear Cropper.js
				var cropper = new Cropper(image, { aspectRatio: 1 });
			},
			sending: function(file, xhr, formData) {
				formData.append("_token", "{{ csrf_token() }}");
			},
			paramName: "file",
			url: "{{ asset('administrador/propiedades/img-propiedad') }}/{{ $idPropiedad }}",
			addRemoveLinks: true,
			success: function (file, response) {
				var imgName = response;
				file.previewElement.classList.add("dz-success");
				console.log("Successfully uploaded :" + imgName);
			},
			error: function (file, response) {
				file.previewElement.classList.add("dz-error");
			}
		});
	});
</script>
@endsection