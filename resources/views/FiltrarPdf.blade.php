
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILTRAR CATALOGO</title>
    <!-- Agrega enlaces a las hojas de estilo CSS de Bootstrap y tus propios estilos aquí -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        /* Estilos CSS personalizados */
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .card {
            margin-bottom: 20px;
            position: relative;
        }
        .card img {
            max-width: 100%;
            height: auto;
        }
        .custom-checkbox {
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px;
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
        /* Para mostrar 6 productos por fila */
        @media (min-width: 992px) {
            .col-lg-2 {
                flex: 0 0 16.66667%;
                max-width: 16.66667%;
            }
        }
    </style>
</head>
<body>
<div class="container">
    @include('Home.Enlaces')
    
    @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
    @endif    

    <h1 class="text-center mt-4 font-weight-bold">FILTRAR CATALOGO</h1>

    <form action="{{ route('filtrarpdf.editar') }}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-lg-3">
                <h5 class="text-center font-weight-bold">PROVEEDORES</h5>
                <ul>
                    @foreach ($proveedoresRepetidos as $proveedor)
                        <label class="d-block">
                            <input type="checkbox" name="proveedores[]" value="{{ $proveedor->PROVEEDORES }}" {{ in_array($proveedor->PROVEEDORES, $proveedorSeleccionado ?? []) ? 'checked' : '' }}>
                            {{ $proveedor->PROVEEDORES }}
                        </label>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-center font-weight-bold">CATEGORIAS</h5>
                <ul>
                    @foreach ($categoriasFiltradas as $categoria)
                        <label class="d-block">
                            <input type="checkbox" name="categorias[]" value="{{ $categoria->CATEGORIA }}" {{ in_array($categoria->CATEGORIA, $categoriasSeleccionadas ?? []) ? 'checked' : '' }}>
                            {{ $categoria->CATEGORIA }}
                        </label>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3">
                <h5 class="text-center font-weight-bold">MARCAS</h5>
                <ul>
                    @foreach ($marcasFiltradas as $marca)
                        <label class="d-block">
                            <input type="checkbox" name="marcas[]" value="{{ $marca->MARCA }}" {{ in_array($marca->MARCA, $marcasSeleccionadas ?? []) ? 'checked' : '' }}>
                            {{ $marca->MARCA }}
                        </label>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3 mt-4">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-sort-amount-down"></i> Filtrar
                </button>
                <button type="button" style="background-color: #dd2222; color: #fff; padding: 10px 20px; margin: 0; border: none; border-radius: 5px; cursor: pointer;"id="seleccionar-todos" class="btn btn-secondary btn-block mt-2" >
                    Seleccionar Todos
                </button>
            </div>
        </div>
    </form>

    <div id="producto-seleccionado" class="mt-3">
        Producto Seleccionado: <span id="producto-nombre"></span>
    </div>

    <form method="post" action="{{ route('generar.pdf') }}">
        @csrf
        <div class="row mt-4">
            @if (count($consultaFiltrada) > 0)
                @foreach($consultaFiltrada as $producto)
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <img src="{{ str_replace('https://imagenes.deltron.com.pe', 'https://www.deltron.com.pe', $producto->URLI) }}" alt="Imagen" class="card-img-top">
                            <input type="checkbox" name="productos_seleccionados[]" value="{{ $producto->ID }}" class="custom-checkbox">
                            <div class="card-body">
                                <label class="form-check-label">
                                    {{ $producto->NOMP }}
                                </label>
                                @if ($producto->PROMOCION > 0.0)
                                    <p class="strike-through text-danger font-weight-bold mt-2"><del>{{ number_format($producto->VENTA, 2) }}</del></p>
                                    <p class="text-success font-weight-bold mt-2">{{ number_format($producto->PROMOCION, 2) }}</p>
                                @else
                                    <p class="text-danger font-weight-bold mt-2">{{ number_format($producto->VENTA, 2) }}</p>
                                @endif
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center mt-4">
                    <h4>No se encontraron resultados.</h4>
                </div>
            @endif
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <button type="submit" style="background-color: #dd2222; color: #fff; padding: 10px 20px; margin: 0; border: none; border-radius: 5px; cursor: pointer;">Generar Reporte</button>
            </div>
        </div>
    </form>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Función para seleccionar/deseleccionar todos los checkboxes
        $("#seleccionar-todos").click(function() {
            $("input[name='productos_seleccionados[]']").prop("checked", !$("input[name='productos_seleccionados[]']").prop("checked"));
        });
    });
</script>

</body>
</html>


