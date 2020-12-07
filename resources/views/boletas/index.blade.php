<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />
 
        @toastr_css
    </head>
    <body>
        <div class="container">
            <br>
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>Boletas</h3> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dt-responsive nowrap" id="datos" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                  <thead>
                                    <tr>
                                      <th>Folio Boleta</th>
                                      <th>Total</th>
                                      <th>Nombre Comprador</th>
                                      <th>Rut</th>
                                      <th>Correo</th>
                                      <th>Teléfono</th>
                                      <th>Acciones</th>
                                    </tr>
                                  </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 
        <script>
        $(document).ready(function () {
            $('#datos').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax":{
                "url": "{{ asset('datatable-boletas') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
                "columns": [
                    { "data": "idBoleta" },
                    { "data": "totalBoleta" },
                    { "data": "nombreUsuario" },
                    { "data": "rutUsuario" },
                    { "data": "correoUsuario" },
                    { "data": "telefonoUsuario" },
                    { "data": "options" }
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "No existen registros",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            });
        });
        </script>
        @toastr_js
        @toastr_render
    </body>
</html>
