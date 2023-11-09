
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<title>Corporacion HBA</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .button-container {
            margin: 10px 0;
        }
        .button-container form {
            display: inline-block;
            margin: 0 10px;
        }
        .button-container button {
            background-color: #dd2222; /* Cambiar a rojo */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-container button:hover {
            background-color: #aa0000; /* Cambiar a un tono más oscuro de rojo al pasar el cursor */
        }
        .separator {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="button-container">
        <form action="{{ route('generate-excel') }}" method="post">
            @csrf
            <button type="submit">Generar Reporte Facebook</button>
        </form>
    </div>

    <div class="button-container">
        <form action="{{ route('generate-excelproOdoo') }}" method="post">
            @csrf
            <button type="submit">Generar Reporte Producto Odoo</button>
        </form>
    </div>

    <div class="button-container">
        <form action="{{ route('generate-excelinvOdoo') }}" method="post">
            @csrf
            <button type="submit">Generar Reporte Inventario Odoo</button>
        </form>
    </div>

    <div class="separator"></div>

    <div class="button-container">
        <form action="{{ route('filtrarpdf.editar') }}" method="post">
            @csrf
            <button type="submit">Generar Reporte Filtrado en PDF</button>
        </form>
    </div>
</body>
</html>
@endsection

