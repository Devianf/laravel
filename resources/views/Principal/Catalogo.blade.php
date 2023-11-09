
@include('Home.Enlaces')

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="{{ asset('img/logo2.png') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalago HBA</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="catalogo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="app.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/hba_mini_ico.jpg') }}">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">

  



    
    <style>
        /* Estilo para los contenedores de los botones */
        .button-container {
            display: inline-block;
            margin-right: 20px; /* Ajusta el margen derecho según tu preferencia */
        }

        /* Estilo para los botones */
        .button-container button {
            background-color: #dd2222;
            color: #fff;
            padding: 10px 20px;
            margin: 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form {
            display: flex;
            align-items: center;
        }
        
        .search-input {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 300px;
            font-size: 16px;
        }
        
        .search-button {
            background-color: #c91a1a;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 15px;
            margin-left: 10px;
        }
        
        
        
        /* Estilo para el icono de búsqueda */
        .fa-magnifying-glass {
            font-size: 20px;
        }

    </style>
</head>

   
<body>
    <nav><br>
        <div class="containerhba">
            <img src="{{ asset('imagenes/logo2.png') }}" class="logo">
            <form action="{{ route('buscarProductos') }}" method="get" role="search" class="search-form">
                <input name="buscarpor" type="search" placeholder="Buscar productos..." aria-label="Buscar productos" class="search-input">
                <button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class=" fas fa-user"></i><span><strong> Login</strong></span>
            </a>
            
        </div>
    </nav>
    

    {{-- Mostrar los resultados de búsqueda --}}
    @if (isset($request) && $request->get('buscarpor') != '')
        @php
            $nombre = $request->get('buscarpor');
            $productos = DB::table('_h_b_a')->where('MARCA', 'like', "%$nombre%")->get();
        @endphp
        @if ($productos->count() > 0)
            <div class="resultados-busqueda" style="text-align: center;">
                <h3>Resultados de la búsqueda</h3>
                {{-- Mostrar los resultados de búsqueda de manera similar a categorías, marcas y proveedores --}}
                <ul>
                    @foreach ($productos as $producto)
                        <li><a href="{{ route('detalleProducto', ['id' => $producto->ID]) }}">{{ $producto->NOMP }}</a></li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>No se encontraron productos con ese criterio de búsqueda.</p>
        @endif
    @endif

    
    <main>
        <aside>
            <button id="close-btn">
                <span class="material-icons-sharp">close</span>
            </button>
            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h4>Inicio</h4>
                </a><br>
                
                <div class="selectcontainer">
                    <div class="select-btn" id="marca-dropdown">
                        <span class="btn-text"><i class="fa-brands fa-markdown" style="color: #c91a1a;"></i> Marcas</span>
                        <span class="arrow-dwn">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </div>
                
                    <ul class="list-items marcas-lista" id="marca-options" style="display: none;">
                        @foreach ($marcas->sortBy('MARCA') as $marca)
                            <li>
                                <button class="item" type="button" data-marca="{{ $marca->MARCA }}">
                                    <span class="item-text">{{ $marca->MARCA }}</span>
                                    <span class="checkbox">
                                        <i class="check-icon fa-solid fa-check"></i>
                                    </span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="selectcontainer">
                    <div class="select-btn" id="categoria-dropdown">
                        <span class="btn-text"><i class="fa-brands fa-markdown" style="color: #c91a1a;"></i> Categorías</span>
                        <span class="arrow-dwn">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </div>
                
                    <ul class="list-items categorias-lista" id="categoria-options" style="display: none;">
                        @foreach ($categorias->sortBy('CATEGORIA') as $categoria)
                            <li>
                                <button class="item" type="button" data-categoria="{{ $categoria->CATEGORIA }}">
                                    <span class="item-text">{{ $categoria->CATEGORIA }}</span>
                                    <span class="checkbox">
                                        <i class="check-icon fa-solid fa-check"></i>
                                    </span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{--
                  <div class="selectcontainer">
                     <div class="select-btn" id="proveedor-dropdown">
                      <span class="btn-text"><i class="fa-brands fa-markdown" style="color: #c91a1a;"></i> Proveedores</span>
                       <span class="arrow-dwn">
                        <i class="fa-solid fa-chevron-down"></i>
                       </span>
                    </div>
                
                     <ul class="list-items proveedores-lista" id="proveedor-options" style="display: none;"> 
                      @foreach ($proveedores->sortBy('PROVEEDORES') as $proveedor)
                          <li>
                             <button class="item" type="button" data-proveedor="{{ $proveedor->PROVEEDORES }}">
                               <span class="item-text">{{ $proveedor->PROVEEDORES }}</span>
                              <span class="checkbox">
                                <i class="check-icon fa-solid fa-check"></i>
                          </span>
                         </button>
                         </li>
                        @endforeach
                   </ul>
                </div>
             </div> --}}


        </aside>

        <section class="middle">
            <div class="header">
                <h2></h2>
                <a href="{{ route('catalogoHba') }}"><h2><i class="fa-solid fa-rotate"></i></h2></a>
            </div>
            <!--==================== CATALOGO HBA ======================-->
            <div class="cards">
                @forelse ($productos as $acc)
                    <div class="principal-cardhba">
                        <div class="cardhba">
                            <figure>
                                <img src="{{$acc->URLI}}">
                            </figure> 
                            <div class="contenido-cardhba">
                                <p>{{$acc->NOMP}}</p>
                                <h2 style="color: #c91a1a;">S/{{ number_format($acc->VENTA, 2) }}</h2>
                                @if ($acc->PROMOCION != 0.00)
                                    <h2 style="color: #118111;">Oferta S/{{$acc->PROMOCION}}</h2>
                                @endif
                                <form action="{{ route('catalogoHba') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="URLP" value="{{ $acc->URLP }}">
                                    <input type="hidden" name="PROMOCION" value="{{ $acc->PROMOCION }}">
                                    <input type="hidden" name="VENTA" value="{{ $acc->VENTA }}">  
                                    <input type="hidden" name="STOCK" value="{{ $acc->STOCK }}">
                                    <input type="hidden" name="NOMP" value="{{ $acc->NOMP }}">  
                                    <input type="hidden" name="CODPRODUCTO" value="{{ $acc->CODPRODUCTO }}">    
                                    <button type="submit" name="detalleproducto" value="{{ $acc->URLP }}" formtarget="_blank">Mas Detalles</button>
                                </form>
                                <h2 style="color: #93C47D;">Und. {{$acc->STOCK}}</h2>
                            </div>   
                        </div>
                    </div>
                @empty
                    <h1 class="text-center">No hay productos en inventario.</h1>
                @endforelse
            </div>

            <div class ="card-body">
                {{ $productos->links() }}
            </div>

        </section>



    

         {{--}}  {{ $productos->withQueryString()->links()}} {{--}}


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var marcaDropdown = document.getElementById('marca-dropdown');
                var marcaOptions = document.getElementById('marca-options');
                
                marcaDropdown.addEventListener('click', function() {
                    marcaOptions.style.display = (marcaOptions.style.display === 'none') ? 'block' : 'none';
                });

                var marcaButtons = marcaOptions.querySelectorAll('.item');

                marcaButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var marcaSeleccionada = this.getAttribute('data-marca');
                        var url = window.location.href;
                        var paramSeparator = (url.indexOf('?') === -1) ? '?' : '&';
                        var newUrl = url + paramSeparator + 'buscarmarca=' + encodeURIComponent(marcaSeleccionada);
                        window.location.href = newUrl;
                    });
                });

                var categoriaDropdown = document.getElementById('categoria-dropdown');
                var categoriaOptions = document.getElementById('categoria-options');
                
                categoriaDropdown.addEventListener('click', function() {
                    categoriaOptions.style.display = (categoriaOptions.style.display === 'none') ? 'block' : 'none';
                });

                var categoriaButtons = categoriaOptions.querySelectorAll('.item');

                categoriaButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var categoriaSeleccionada = this.getAttribute('data-categoria');
                        var url = window.location.href;
                        var paramSeparator = (url.indexOf('?') === -1) ? '?' : '&';
                        var newUrl = url + paramSeparator + 'buscarcategoria=' + encodeURIComponent(categoriaSeleccionada);
                        window.location.href = newUrl;
                    });
                });

                var proveedorDropdown = document.getElementById('proveedor-dropdown');
                var proveedorOptions = document.getElementById('proveedor-options');
                
                proveedorDropdown.addEventListener('click', function() {
                    proveedorOptions.style.display = (proveedorOptions.style.display === 'none') ? 'block' : 'none';
                });

                var proveedorButtons = proveedorOptions.querySelectorAll('.item');

                proveedorButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var proveedorSeleccionado = this.getAttribute('data-proveedor');
                        var url = window.location.href;
                        var paramSeparator = (url.indexOf('?') === -1) ? '?' : '&';
                        var newUrl = url + paramSeparator + 'buscarproveedor=' + encodeURIComponent(proveedorSeleccionado);
                        window.location.href = newUrl;
                    });
                });
            });
        </script>
    </main>
</body>
</html>
