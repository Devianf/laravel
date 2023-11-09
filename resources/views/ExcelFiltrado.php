@include('Home.Enlaces')
<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXCEL FILTRADO</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/hba_mini_ico.jpg') }}">
</head>

<body></body>
<div class="container-fluid">

    @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
    @endif    
    
    <br>
    <h1 align="center" style="font-family: sans-serif; font-weight:bold;  letter-spacing: 1px"> FILTRAR Y ELIMINAR ARCHIVOS POR SELECCION</h1>
    <br>

    <form action="{{ route('filtrar.excel.eliminar') }}" method="GET">
        @csrf
        <div class="row justify-content-center mt-3">
            <div class="col-2">
                <p align="center"> <strong> PROVEEDORES </strong></p>
                <select name="proveedores[]" class="form-select" multiple>
                    @foreach ($proveedoresRepetidos as $proveedor)
                        <option value="{{ $proveedor->PROVEEDORES }}" {{ in_array($proveedor->PROVEEDORES, $proveedorSeleccionado ?? []) ? 'selected' : '' }}>
                            {{ $proveedor->PROVEEDORES }} ({{ $proveedor->PROVEEDORES }})

                        </option>
                    @endforeach
                </select>
            </div>   
            <div class="col-2">
                <p align="center"> <strong> CATEGORIAS </strong></p>
                <select name="categorias[]" class="form-select" multiple>
                    @foreach ($categoriasFiltradas as $categoria)
                        <option value="{{ $categoria->CATEGORIA }}" {{ in_array($categoria->CATEGORIA, $categoriasSeleccionadas ?? []) ? 'selected' : '' }}>
                            {{ $categoria->CATEGORIA }}
                            @foreach ($proveedoresRepetidos as $proveedor)
                                @if ($proveedor->PROVEEDORES == $proveedorSeleccionado && $proveedor->CATEGORIA == $categoria->CATEGORIA)
                                    ({{ $proveedor->PROVEEDORES }})
                                @endif
                            @endforeach
                        </option>
                    @endforeach
                </select>
            </div>         
            <div class="col-2">
                <p align="center"><strong> MARCAS </strong></p>
                <select name="marcas[]" class="form-select" multiple>
                    @foreach ($marcasFiltradas as $marca)
                        <option value="{{ $marca->MARCA }}" {{ in_array($marca->MARCA, $marcasSeleccionadas ?? []) ? 'selected' : '' }}>
                            {{ $marca->MARCA }}
                            @foreach ($proveedoresRepetidos as $proveedor)
                                @if ($proveedor->PROVEEDORES == $proveedorSeleccionado && $proveedor->MARCA == $marca->MARCA)
                                    ({{ $proveedor->PROVEEDORES }})
                                @endif
                            @endforeach
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto"><br><br>
                <div class="text-center">
                    <div>
                         <button type="submit" class="btn btn-primary d-block mb-2">
                        <i class="fas fa-sort-amount-down"></i> Filtrar
                    </button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger d-block" name="action" value="eliminar">
                        <i class="fas fa-trash"></i> Eliminar 
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if (count($consultaFiltrada) > 0)
    <div class="table-responsive table-sm">
        <table class="table table-striped table-hover table-bordered" id="table">
            <thead class="table-dark" align="center">
                <tr>
                    <th scope="col"><strong>ID</strong></th>
                    <th scope="col"><strong>CATEGORIA</strong></th>
                    <th scope="col"><strong>COD_PRODUCTO</strong></th>
                    <th scope="col"><strong>NOM_PRODUCTO</strong></th>
                    <th scope="col"><strong>PROVEEDORES</strong></th>
                    <th scope="col"><strong>$</strong></th>
                    <th scope="col"><strong>S/</strong></th>
                    <th scope="col"><strong>VENTA</strong></th>
                    <th scope="col"><strong>UTILIDAD</strong></th>
                    <th scope="col"><strong>PROMOCION</strong></th>
                    <th scope="col"><strong>STOCK</strong></th>
                    <th scope="col"><strong>MARCA</strong></th>
                    <th scope="col">URLPRODUCTO:</th>
                    <th scope="col">URLIMAGEN:</th>
                    <th scope="col">ACCIONES:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultaFiltrada as $row)
                    <tr>
                        <td>{{ $row->ID }}</td>
                        <td>{{ $row->CATEGORIA }}</td>
                        <td>{{ $row->CODPRODUCTO }}</td>
                        <td>{{ $row->NOMPRODUCTO }}</td>
                        <td>{{ $row->PROVEEDORES }}</td>
                        <td>{{ number_format($row->DOLARES, 2) }}</td>
                        <td>{{ number_format($row->SOLES, 2) }}</td>
                        <td>{{ number_format($row->VENTA, 2) }}</td>
                        <td>{{ number_format($row->UTILIDAD, 2) }}</td>
                        <td>{{ number_format($row->PROMOCION, 2) }}</td>
                        <td>{{ $row->STOCK }}</td>
                        <td>{{ $row->MARCA }}</td>
                        <td>{{ $row->URLP }}</td>
                        <td>{{ $row->URLI }}</td>
                        <td>
                            <!-- Agrega aquí los botones de acciones que necesites -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="text-center mt-4">
        <h4>No se encontraron resultados.</h4>
    </div>
@endif
</div>

<script>
    $('#table').DataTable({
    responsive: true,
    autoWidth: false
    });
</script>
<script>
    $(document).ready(function() {
        // Variables para almacenar las selecciones anteriores
        var proveedorSeleccionado = '';
        var categoriaSeleccionada = '';
        var marcaSeleccionada = '';

        // Función para resaltar las opciones seleccionadas en los selectores
        function resaltarSeleccion(selector, seleccion) {
            $(selector + ' option').each(function() {
                if ($(this).val() === seleccion) {
                    $(this).attr('selected', 'selected');
                } else {
                    $(this).removeAttr('selected');
                }
            });
        }

        $('#proveedores').change(function() {
            proveedorSeleccionado = $(this).val();

            $.ajax({
                url: '/obtener-datos-filtrados',
                type: 'POST',
                dataType: 'json',
                data: {
                    proveedor: proveedorSeleccionado
                },
                success: function(response) {
                    actualizarCategorias(response.categorias);
                    actualizarMarcas(response.marcas);
                    resaltarSeleccion('#categorias', categoriaSeleccionada);
                    resaltarSeleccion('#marcas', marcaSeleccionada);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#categorias').change(function() {
            categoriaSeleccionada = $(this).val();

            $.ajax({
                url: '/obtener-datos-filtrados',
                type: 'POST',
                dataType: 'json',
                data: {
                    proveedor: proveedorSeleccionado,
                    categoria: categoriaSeleccionada
                },
                success: function(response) {
                    actualizarMarcas(response.marcas);
                    resaltarSeleccion('#marcas', marcaSeleccionada);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        function actualizarCategorias(categorias) {
            var selectCategorias = $('#categorias');
            var categoriaAnterior = selectCategorias.val();

            selectCategorias.empty();

            categorias.forEach(function(categoria) {
                var option = $('<option>').text(categoria.CATEGORIA).val(categoria.CATEGORIA);
                selectCategorias.append(option);
            });

            resaltarSeleccion('#categorias', categoriaAnterior);
        }

        function actualizarMarcas(marcas) {
            var selectMarcas = $('#marcas');
            var marcaAnterior = selectMarcas.val();

            selectMarcas.empty();

            marcas.forEach(function(marca) {
                var option = $('<option>').text(marca.MARCA).val(marca.MARCA);
                selectMarcas.append(option);
            });

            resaltarSeleccion('#marcas', marcaAnterior);
        }
    });
</script>
</body>
</html>

    