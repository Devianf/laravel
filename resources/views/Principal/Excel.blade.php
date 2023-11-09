@include('Home.Enlaces')
@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="estilos2.css">
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
    @endif   

    <br>
    <br>
    <br>
    
    <form action="{{ route('excel.guardar') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(event)">
        @csrf
        <div class="row justify-content-center mt-3">
            <div class="col-2 mr-1">
                <div class="form-floating">
                    <input type="text" style="min-height: 65px;" class="form-control" id="valor_dolar" name="DOLARES">
                    <label for="floatingInputGrid"><strong>VALOR DEL DOLAR ($)</strong></label>
                    <div class="invalid-feedback">Este campo es obligatorio</div>
                </div> 
            </div>

            <div class="col-1 mr-3">
                <div class="form-floating">
                    <input type="number" style="min-height: 65px; min-width: 100px" class="form-control" id="SOLES_A" name="SOLES[A]" value="75">
                    <label for="SOLES_A"><strong>A (%)</strong></label>
                    <div class="invalid-feedback">Este campo es obligatorio</div>
                </div> 
            </div>

            <div class="col-1 mr-3">
                <div class="form-floating">
                    <input type="number" style="min-height: 65px; min-width: 100px" class="form-control" id="SOLES_B" name="SOLES[B]" value="30">
                    <label for="SOLES_B"><strong>B (%)</strong></label>
                    <div class="invalid-feedback">Este campo es obligatorio</div>
                </div> 
            </div>

            <div class="col-1 mr-3">
                <div class="form-floating">
                    <input type="number" style="min-height: 65px; min-width: 100px" class="form-control" id="SOLES_C" name="SOLES[C]" value="21">
                    <label for="SOLES_C"><strong>C (%)</strong></label>
                    <div class="invalid-feedback">Este campo es obligatorio</div>
                </div> 
            </div>

            <div class="col-1 mr-3">
                <div class="form-floating">
                    <input type="number" style="min-height: 65px; min-width: 100px" class="form-control" id="SOLES_D" name="SOLES[D]" value="20">
                    <label for="SOLES_D"><strong>D (%)</strong></label>
                    <div class="invalid-feedback">Este campo es obligatorio</div>
                </div> 
            </div>

            <div class="col-1 mr-3">
                <div class="form-floating">
                    <input type="number" style="min-height: 65px; min-width: 100px" class="form-control" id="SOLES_E" name="SOLES[E]" value="17">
                    <label for="SOLES_E"><strong> E (%)</strong></label>
                    <div class="invalid-feedback">Este campo es obligatorio</div>
                </div> 
            </div>

            <div class="col-1 mr-3">
                <div class="form-floating">
                    <input type="number" style="min-height: 65px; min-width: 100px" class="form-control" id="SOLES_H" name="SOLES[H]" value="11">
                    <label for="SOLES_H"><strong> H (%)</strong></label>
                    <div class="invalid-feedback">Este campo es obligatorio</div>
                </div> 
            </div>
        </div>
            
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="excel_file" name="excel_file" onchange="updateFileInfo()" style="display: none;">
            </div>
            <div class="input-group" style="margin: 10px">
                <button class="btn btn-warning" type="button" onclick="document.getElementById('excel_file').click();">Selecciona un archivo</button>
                <label class="custom-file-label" for="excel_file" id="file_label" style="display: none;">Seleccionar archivo</label>
                <input type="text" class="form-control" id="file_info" readonly>
                <button type="submit" class="btn btn-info">Subir y guardar en la BD</button>
                
            </div>
            
        <div>
            <input type="text" class="form-control" id="myinput">
        </div>




        </div>
    </form>
    <div class="row mb-3">
        <div class="text-right col-12 d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="button" class="btn btn-dark me-2" style="background-color: mediumorchid;" data-toggle="modal" data-target="#CreateProducto">
            <i class="fas fa-plus-square"></i>
          </button>

          <button id="eliminarTablaBtn" type="button" class="btn btn-dark me-2" style="background-color: rgb(255, 78, 78); margin-right: 10px">
            <i class="fas fa-trash"></i>
        </button>
        </div>
      </div>
      
    @include('Principal.Insert')
    
    <div class="table-responsive table-sm">
        <table class="table table-striped table-hover table-bordered"  id="ditable"><br>
            <h2 align="center" style="font-family: sans-serif; font-weight:bold;  letter-spacing: 1px"> CONTENIDO DEL EXCEL UTILIZANDO WEB SCRAPING</h2><br>
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
                    <!-- Agrega las columnas restantes para tus campos -->
                </tr>
            </thead>
            <tbody>
                @if (isset($ListaExcel))
                    @foreach ($ListaExcel as $row)
                        <tr>
                            <td>{{ $row->ID }}</td> <!-- Primera columna - ID -->
                            <td>{{ $row->CATEGORIA }}</td> <!-- Segunda columna - CODPRODUCTO -->
                            <td>{{ $row->CODPRODUCTO }}</td> <!-- Segunda columna - CODPRODUCTO -->
                            <td>{{ $row->NOMPRODUCTO }}</td> <!-- Tercera columna - NOMPRODUCTO -->
                            <td>{{ $row->PROVEEDORES }}</td> <!-- Cuarta columna - PROVEEDORES -->
                            <td>{{ number_format($row->DOLARES, 2) }}</td>
                            <td>{{ number_format($row->SOLES, 3) }}</td>
                            <td>{{ number_format($row->VENTA, 3) }}</td>
                            <td>{{ number_format($row->UTILIDAD, 3) }}</td>
                            <td>{{ number_format($row->PROMOCION, 2) }}</td>
                            <td>{{ $row->STOCK }}</td> <!-- Novena columna - STOCK -->
                            <td>{{ $row->MARCA }}</td> <!-- Décima columna - MARCA-->
                            <td>{{ $row->URLP }}</td> <!-- Novena columna - STOCK -->
                            <td>{{ $row->URLI }}</td> <!-- Décima columna - MARCA -->
                            <td>
                                <button type="utton" class="btn" id="abrir-modal" style="background-color:darkturquoise" data-toggle="modal" data-target="#UpdateProducto{{$row->ID}}">
                                    <i class="fa-sharp fa-regular fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn" style="background-color:rgb(249, 75, 75)" data-toggle="modal" data-target="#DeleteProducto{{$row->ID}}">
                                    <i class="fa-sharp fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                            <!-- Agrega las columnas restantes para tus campos -->
                        </tr>
                        @include('Principal.Edit', ['ID' => $row->ID])
                        @include('Principal.Delete', ['ID' => $row->ID])
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


    <!--<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-dark ms-3 custom-button">
        <i class="fas fa-sign-out-alt me-1 custom-icon"></i> Salir
    </button>
    </form>-->
</div>





<script>
    function updateFileInfo() {
        var fileInput = document.getElementById('excel_file');
        var fileInfoInput = document.getElementById('file_info');
        var fileName = fileInput.value.split('\\').pop();
        fileInfoInput.value = fileName;
    }

    function validateForm(event) {
    var fileInput = document.getElementById('excel_file');
    var dolarInput = document.getElementById('valor_dolar');
    
    if (fileInput.files.length === 0) {
        event.preventDefault(); // Evitar el envío del formulario
        alert('Por favor, seleccione al menos un archivo.');
    }
    
    if (dolarInput.value === '') {
        event.preventDefault(); // Evitar el envío del formulario
        alert('Por favor, ingrese un valor para el campo del dólar.');
    }
}
</script>

<script>
    // Variable global para almacenar los datos cargados
    var datosCargados = [];

    document.getElementById('excel_form').addEventListener('submit', function (event) {
        event.preventDefault(); // Evitar el envío normal del formulario

        // Obtener los datos del formulario
        var formData = new FormData(this);

        // Realizar la solicitud AJAX para guardar los nuevos archivos
        var request = new XMLHttpRequest();
        request.open('POST', '{{ route('excel.guardar') }}');
        request.onload = function () {
            if (request.status === 200) {
                // Obtener los nuevos datos cargados
                var nuevosDatos = JSON.parse(request.responseText);

                // Agregar los nuevos datos a la variable global
                datosCargados.push(...nuevosDatos);

                // Renderizar la tabla con los datos actualizados
                renderizarTabla();
            }
        };
        request.send(formData);
    });

    function renderizarTabla() {
        var tabla = document.getElementById('ditable');
        tabla.innerHTML = ''; // Limpiar la tabla antes de renderizar

        // Renderizar los encabezados
        var encabezados = ['ID','CATEGORIA', 'CODPRODUCTO', 'NOMPRODUCTO', 'PROVEEDORES', 'DOLARES', 'SOLES', 'VENTA', 'UTILIDAD', 'PROMOCION', 'STOCK', 'MARCA', 'URLP', 'URLI'];
        var encabezadosRow = document.createElement('tr');
        encabezados.forEach(function (encabezado) {
            var th = document.createElement('th');
            th.textContent = encabezado;
            encabezadosRow.appendChild(th);
        });
        tabla.appendChild(encabezadosRow);

        // Renderizar los datos cargados
        datosCargados.forEach(function (dato) {
            var fila = document.createElement('tr');
            Object.values(dato).forEach(function (valor) {
                var td = document.createElement('td');
                td.textContent = valor;
                fila.appendChild(td);
            });
            tabla.appendChild(fila);
        });
    }
</script>
<script>
    $(document).ready(function() {
        // Función para enviar la solicitud AJAX al hacer clic en el botón
        $("#eliminarTablaBtn").click(function() {
            $.ajax({
                url: "{{ route('eliminar-data') }}",
                type: "POST", // Cambiado a POST
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                alert(response.success); // Mostrar el mensaje de éxito en una ventana de alerta
                window.location.reload(); // Recargar la página actual para actualizar la vista
                },
                error: function(xhr, status, error) {
                console.log(xhr.responseText); // Mostrar información de error en la consola del navegador
                alert('Error al eliminar los datos'); // Mostrar un mensaje de error
                }       
            });
        });
    });
</script>






<script>
    $('#ditable').DataTable ({
    responsive: true,
    autoWidth: false,
    search:true,
     });
</script>



@endsection