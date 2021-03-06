
@extends('layouts.admin.app')
@section('title')
Rifo Mi Propiedad - Administrador
@endsection
@section('content')
        <br>
        <div class="row">
            <div class="col-lg-12" align="center">
                <h3>Boletas</h3> 
            </div>
            <div class="col-lg-12">
                <a href="{{ asset('administrador/transacciones/boletas/crear-boleta-por-deposito') }}" class="btn btn-primary">Crear Boleta</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive nowrap" id="datos" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th>Folio Boleta</th>
                              <th>Total</th>
                              <th>Nombre Comprador</th>
                              <th>Rut</th>
                              <th>Correo</th>
                              <th>Teléfono</th>
                              <th>Estado</th>
                              <th>Fecha de compra</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
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
                    { "data": "nombreEstado" },
                    { "data": "created_at" },
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
@endsection
