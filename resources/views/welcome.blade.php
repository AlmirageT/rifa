<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
        @toastr_css
    </head>
    <body>
        <div class="container">
            <br>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ asset('comprar-numeros') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombreUsuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" name="correoUsuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" name="telefonoUsuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Rut</label>
                            <input type="text" name="rutUsuario" class="form-control" placeholder="Ingrese su rut sin puntos ni guion" onchange="formateaRut(this.value)" id="rut">
                        </div>
                        <div class="form-group">
                            <label>Números (100 - 15000)</label>
                            <select class="js-example-basic-multiple form-control" name="numeros[]" multiple>
                                @foreach($numeros as $numero)
                                    <option value="{{ $numero->idNumero }}">{{ $numero->numero }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div align="center">
                            <button class="btn btn-primary" type="submit">Comprar Número</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.js-example-basic-multiple').select2({
                    language: "es",
                    placeholder: "Ingrese un numero",
                    minimumInputLength: 3,
                    ajax: {
                        url: '{{ asset('api/numeros') }}',
                        dataType: "json",
                        type: "GET",
                        data: function (params) {
                            var queryParameters = {
                                consulta: params.term
                            }
                            return queryParameters;
                        },
                        processResults: function (data) {
                            var myResults = [];
                            $.each(data, function (index, item) {
                                myResults.push({
                                    'id': item.idNumero,
                                    'text': item.numero
                                });
                            });
                            return {
                                results: myResults
                            };
                        }
                    }
                });
            });

        </script>
        <script type="text/javascript">
            function formateaRut(rut) {
                if(isNaN(rut)){
                    document.getElementById('rut').value = '';
                }else{
                    var actual = rut.replace(/^0+/, "");
                    if (actual != '' && actual.length > 1) {
                        var sinPuntos = actual.replace(/\./g, "");
                        var actualLimpio = sinPuntos.replace(/-/g, "");
                        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
                        var rutPuntos = "";
                        var i = 0;
                        var j = 1;
                        for (i = inicio.length - 1; i >= 0; i--) {
                            var letra = inicio.charAt(i);
                            rutPuntos = letra + rutPuntos;
                            if (j % 3 == 0 && j <= inicio.length - 1) {
                                rutPuntos = "." + rutPuntos;
                            }
                            j++;
                        }
                        var dv = actualLimpio.substring(actualLimpio.length - 1);
                        rutPuntos = rutPuntos + "-" + dv;
                    }
                    document.getElementById('rut').value = rutPuntos;
                }
            }
        </script>
        @toastr_js
        @toastr_render
    </body>
</html>
