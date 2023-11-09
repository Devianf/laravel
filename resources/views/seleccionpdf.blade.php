<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Productos Seleccionados</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/hba_mini_ico.jpg') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Reporte de Productos Seleccionados</h1>
    
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Producto</th>
                <th>Venta</th> 
                <th>Promoción</th>
                <th>Marca</th> 
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->CATEGORIA }}</td>
                <td>{{ $producto->NOMPRODUCTO }}</td>
                <td>{{ number_format($producto->VENTA, 2) }}</td>
                @if($producto->PROMOCION == '0.0')
                <td>No tiene</td>
                @else
                <td>{{ number_format($producto->PROMOCION, 2) }}</td>
                @endif
                <td>{{ $producto->MARCA }}</td>
                <td><img src="{{ str_replace('https://imagenes.deltron.com.pe', 'https://www.deltron.com.pe', $producto->URLI) }}" alt="Imagen"  style="max-width: 100px;"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>