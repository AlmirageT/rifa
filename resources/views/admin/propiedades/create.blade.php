@extends('layouts.admin.app')
@section('title')
Crear Propiedad
@endsection

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div align="center">
				<h3>Crear Propiedad</h3>
			</div>
		</div>
        <form action="{{ route('mantenedor-propiedades.store') }}" method="POST" file="true" enctype="multipart/form-data">
        	@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
                                <label>Titulo Propiedad</label>
                                <input type="text" class="form-control" name="nombrePropiedad" placeholder="Ingrese nombre de la propiedad" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
                                <label>Sub-Titulo Propiedad</label>
                                <input type="text" class="form-control" name="subtituloPropiedad" placeholder="Ingrese nombre de la propiedad" required>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Foto Propiedad Portada</label>
								<input type="file" required name="fotoPrincipal" class="form-control" onchange="onFileSelected(event)" id="image">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<img id="myimage" height="200">
							</div>					
						</div>
						<div class="col-lg-12">
							<div class="form-group">
                                <label>Pais</label>
                                <select name="idPais" id="paises" onchange="sacarRegionPorPais(this.value)" required class="form-control">
                                    <option value="">Seleccione un país</option>
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->idPais }}">{{ $pais->nombrePais }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
                                <label>Región</label>
                                <select name="idRegion" id="select_regiones" class="form-control" required onchange="sacarProvinciaPorRegion(this.value)">
                                    <option value="">Seleccione una region</option>
                                    @foreach ($regiones as $region)
                                        <option value="{{ $region->idRegion }}">{{ $region->nombreRegion }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
                                <label>Provincia</label>
                                <select name="idProvincia" id="select_provincias" class="form-control" required onchange="sacarComunaPorProvincia(this.value)">
                                    <option value="">Seleccione provincia</option>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia->idProvincia }}">{{ $provincia->nombreProvincia }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
                                <label>Comuna</label>
                                <select name="idComuna" id="select_comunas" class="form-control" required >
                                    <option value="">Seleccione comuna</option>
                                    @foreach ($comunas as $comuna)
                                        <option value="{{ $comuna->idComuna }}">{{ $comuna->nombreComuna }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="direccionPropiedad" class="form-control" placeholder="Ingrese la dirección" required id="txtDireccion">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Número</label>
                                <input type="text" name="numeracionPropiedad" class="form-control" placeholder="Ingrese numeración de su casa" required id="txtNumero">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
                                <label>Código postal</label>
                                <input type="number" name="codigoPostal" class="form-control" placeholder="Ingrese el código postal" required>
							</div>
						</div>
						<div class="col-lg-12">
							<div id="map" style="width: 100%; height: 300px"></div>
							<br>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
                                <label>Latitud</label>
                                <input type="text" name="latitud" class="form-control" required id="latitud"> 
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Longitud</label>
                                <input type="text" name="longitud" id="longitud" class="form-control" required>
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label>Video</label>
								<input type="file" name="urlVideo" class="form-control">
							</div>
                        </div>
                        <div class="col-lg-6">
							<div class="form-group">
								<label>MattlePort</label>
                                <input type="text" name="urlMattlePort" class="form-control">
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
                                <label>Estado</label>
                                <select name="idEstado" required class="form-control">
                                    <option value="">Seleccione un estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->idEstado }}">{{ $estado->nombreEstado }}</option>                                        
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Valor Rifa</label>
								<input type="number" name="valorRifa" class="form-control" required>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
								<label>Descripción Frontal</label>
								<textarea class="form-control summernote" name="descripcionPropiedad" required></textarea>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>Descripción Interna</label>
								<textarea class="form-control summernote" name="descripcionDetalle" required></textarea>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
                                <label>m2 Construidos</label>
                                <input type="number" name="mConstruidos" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>m2 Superficie</label>
                                <input type="number" name="mSuperficie" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>m2 Terraza</label>
                                <input type="text" name="mTerraza" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Url Facebook</label>
                                <input type="text" name="urlFacebook" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Url Instagram</label>
                                <input type="text" name="urlInstagram" class="form-control">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label>PDF Bases Legales</label>
								<input type="file" name="pdfBasesLegales" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Visualizar mapa</label>
								<br>
								<input type="checkbox" id="switch4" switch="success" checked  name="tieneMapa"/>
                                <label for="switch4" data-on-label="Si"
                                        data-off-label="No"></label>
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Cantidad Premios</label>
								<input type="number" name="cantidadTotalPremios" class="form-control">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="">Cantidad de numeros asociados a la propiedad</label>
								<input type="number" class="form-control" name="cantidadNumeros" required>
							</div>
						</div>
						
					</div>
				</div>
				<div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Agregar Propiedad</button>
                </div>
        </form>
	</div>
</div>
@endsection
@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9BKzI4HVxT1mjnxQIHx_8va7FBvROI6g&callback=initMap" async defer></script>
<script src="{{ asset('assets/js/pages/maps.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 200
    });
    $(document).ready(function(){
    	$('.js-example-basic-multiple').select2({});
    });

</script>
@endsection
<script>
	function onFileSelected(event) {
		var files = event.target.files || event.dataTransfer.files;
	    if(files[0].size > 2000000)
	    {
	        alert("Imagen con tamaño superior a 2MB");
	        $('#image').val("");
	    }
	    else
	    {
	        this.imagen = event.target.files[0];
		  var selectedFile = event.target.files[0];
		  var reader = new FileReader();

		  var imgtag = document.getElementById("myimage");
		  imgtag.title = selectedFile.name;

		  reader.onload = function(event) {
		    imgtag.src = event.target.result;
		  };

		  reader.readAsDataURL(selectedFile);
		}
	}
	const sacarRegionPorPais = (pais) => {
		$.get('{{ asset('regiones') }}/'+pais, (data, status) => {
			var regiones = "<option value=''>Seleccione una región</option>";
			data.forEach(region => {
				regiones += `<option value="${region['idRegion']}">${region['nombreRegion']}</option>`;
			});
			document.getElementById('select_regiones').innerHTML = regiones;
		});
	}
	const sacarProvinciaPorRegion = (region) => {
		$.get('{{ asset('provincias') }}/'+region, (data, status) => {
			var provincias = "<option value=''>Seleccione una provincia</option>";
			data.forEach(provincia => {
				provincias += `<option value="${provincia['idProvincia']}">${provincia['nombreProvincia']}</option>`;
			});
			document.getElementById('select_provincias').innerHTML = provincias;
		});
	}
	const sacarComunaPorProvincia = (provincia) =>{
		$.get('{{ asset('comunas') }}/'+provincia, (data, status) => {
			var comunas = "<option value=''>Seleccione una comuna</option>";
			data.forEach(comuna => {
				comunas += `<option value="${comuna['idComuna']}">${comuna['nombreComuna']}</option>`;
			});
			document.getElementById('select_comunas').innerHTML = comunas;
		});
	}
</script>

