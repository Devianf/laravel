<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Productos</title>
    <!-- Agrega enlaces a las hojas de estilo CSS de Bootstrap y tus propios estilos aquí -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/hba_mini_ico.jpg') }}">

    <style>
        /* Agrega tus estilos personalizados aquí */
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .custom-checkbox {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
        }
        .btn-generar-reporte {
            background-color: #dd2222;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    @include('Home.Enlaces')
    
    <h1 class="text-center mt-4">Seleccionar Productos</h1>

    <form method="post" action="{{ route('generar_pdf') }}">
        @csrf
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ str_replace('https://imagenes.deltron.com.pe', 'https://www.deltron.com.pe', $producto->URLI) }}" alt="Imagen" class="card-img-top">
                        <input type="checkbox" name="productos_seleccionados[]" value="{{ $producto->ID }}" class="custom-checkbox">
                        <div class="card-body">
                            <label class="form-check-label">
                                {{ $producto->NOMPRODUCTO }}
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <button type="submit" style="background-color: #dd2222; color: #fff; padding: 10px 20px; margin: 0; border: none; border-radius: 5px; cursor: pointer;">Generar Reporte</button>
            </div>
        </div>
    </form>
</div>

<!-- Agrega los scripts necesarios aquí -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Tus funciones JavaScript aquí
    });
</script>

</body>
</html>

