<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/hba_mini_ico.jpg') }}">

    <title>Informe en PDF</title>
    <style>
    /* Estilos CSS para el informe en PDF */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 140px;
    }
    th, td {
        border: 1px solid #807e7f; /* Borde negro */
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #875a7b;
        color: #fff;
        text-align: center;
    }
    .logo {
        text-align: center;
        margin-bottom: 20px;
    }
    /* Estilos para el encabezado y pie de página */
    .header {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 12px; /* Tamaño de fuente ajustado */
    }
    .footer {
        text-align: center;
        position: absolute;
        bottom: 20px;
        left: 0;
        right: 0;
        font-size: 12px; /* Tamaño de fuente ajustado */
    }
    .header-image {
        position: absolute;
        top: 20px; /* Ajusta la posición vertical según sea necesario */
        left: 20px; /* Ajusta la posición horizontal según sea necesario */
        max-width: 80px; /* Ajusta el ancho máximo según sea necesario */
    }

</style>
</head>
<body>
    <div class="header-image">
        <img src="data:image/jpeg;base64,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" alt="Imagen" style="max-width: 100%;">
    </div>
    <div class="header">
       
        <!-- Datos en la parte superior izquierda -->
        <p>Corporación HBA S.A.C.</p>
        <p> Diego de Almagro 247</p>
        <p>       Trujillo, Perú</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Venta S/</th> 
                <th>Marca</th> 
                <th>Imagen Referencial</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detallesProductos as $producto)
            <tr>
                <td><span style="color: #333;">{{ $producto->NOMP }}</span><br><br>
                    <span style="font-size: 12px; color: #666;">{{ $producto->DESP }}</span><br><br>
                    <span style="font-size: 10px; color: #888;">({{$producto->CODPRODUCTO}})</span>
                </td>
                <td style="background-color: @if($producto->PROMOCION > 0.0) #daf5cc; @endif; text-align: right;">
                    @if($producto->PROMOCION == 0.0) s/.{{ number_format($producto->VENTA, 0) }}
                    @else
                        <span style="font-size: 12px; margin: 0;">
                            <p style="margin: 0;">ANTES <del>s/.{{ number_format($producto->VENTA, 0) }}</del></p>
                        </span>
                        <br style="margin: 0;">
                        <b><span style="color: #214902; margin: 0;">
                            <p style="margin: 0;">OFERTA  s/.{{ number_format($producto->PROMOCION, 0) }}</p>
                        </span></b>
                    @endif
                </td>                
                <td><span style="color: #333;">{{ $producto->MARCA }}</span></td>
                <td><img src="{{ str_replace('https://imagenes.deltron.com.pe', 'https://www.deltron.com.pe', $producto->URLI) }}" alt="Imagen" style="max-width: 150px;"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <!-- Datos en el pie de página -->
        
        <p>Correo Electrónico: corporacionhba@hotmail.com Teléfono: 992672872 RUC: 20609917769</p>
        <p>Web:http://www.hbaperu.oddo.com</p>
    </div>
</body>
</html>