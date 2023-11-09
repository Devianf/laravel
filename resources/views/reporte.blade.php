<!DOCTYPE html>
<html>
<head>
    <title>Reporte PDF</title>
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
    <h1>Reporte PDF</h1>
    
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
            @foreach($data as $row)
            <tr>
                <td>{{$row->CATEGORIA}}</td>
                <td>{{$row->NOMPRODUCTO}}</td>
                <td>{{ number_format($row->VENTA, 2) }}</td>
                @if($row->PROMOCION == '0.0')
                <td>No tiene</td>
                @else
                <td>{{ number_format($row->PROMOCION, 2) }}</td>
                @endif
                <td>{{$row->MARCA}}</td>
                <td><img src="{{ str_replace('https://imagenes.deltron.com.pe', 'https://www.deltron.com.pe', $row->URLI) }}" alt="Imagen"  style="max-width: 100px;"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

</html>



