<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Folio Boleta</th>
            <th>Total</th>
            <th>Nombre Comprador</th>
            <th>Rut</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        </thead>
        <tbody>
        @foreach($boletas as $boleta)
            <tr>
                <td >{{ $boleta->idBoleta }}</td>
                <td >${{ number_format($boleta->totalBoleta,0,',','.') }}</td>
                <td >{{ $boleta->nombreUsuario }}</td>
                <td >{{ $boleta->rutUsuario }}</td>
                <td >{{ $boleta->correoUsuario }}</td>
                <td >{{ $boleta->telefonoUsuario }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>