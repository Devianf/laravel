<?php

namespace App\Http\Controllers;
use App\Utils;
use App\Exports\excelExport;
use App\Exports\excelExportinvOdoo;
use App\Exports\excelExportproOdoo;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ExcelM;
use App\Models\NuevaTabla;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Goutte\Client as GoutteClient;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Validator;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use DOMDocument;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class ExcelController1 extends Controller

//EXCEL
{   
    public function Index()
    {
        $consulta = DB::table('dbo._h_b_a')->get();
        return view('Principal.Excel', ['ListaExcel' => $consulta]);


        
    }   

    function __construct()
    {
        //Privilegios de usuario para ver la vista del Excel
         $this->middleware('permission:ver-excel', ['only' => ['Index']]);
         
        //Privilegios de usuario para ver la vista del Filtrar-Excel
         $this->middleware('permission:ver-filtrar_excel', ['only' => ['filtrarpdf']]);

        //Privilegios de usuario para ver la vista del Filtrar-pdf
        $this->middleware('permission:ver-filtrar_pdf', ['only' => ['filtrarpdf']]);

        //Privilegios de usuario para ver la vista del catalogo
        //$this->middleware('permission:ver-catalogo', ['only' => ['catalogoHba']]);
     
        //Privilegios de usuario para ver la vista de botones de reportes
         $this->middleware('permission:ver-reportes', ['only' => ['botonespagina']]);

    }
    public function dashboard()
    {
        return view('Dashboard');
    }

    public function LeerExcel(Request $request)
    {
        $valor_dolar = $request->input('DOLARES');
        $solesArray = $request->input('SOLES');
    
        $A = isset($solesArray['A']) ? $solesArray['A'] : null;
        $B = isset($solesArray['B']) ? $solesArray['B'] : null;
        $C = isset($solesArray['C']) ? $solesArray['C'] : null;
        $D = isset($solesArray['D']) ? $solesArray['D'] : null;
        $E = isset($solesArray['E']) ? $solesArray['E'] : null;
        $H = isset($solesArray['H']) ? $solesArray['H'] : null;

        $file = $request->file('excel_file'); // Obtener el archivo enviado en la solicitud
    
        if ($file) {
            $fileExtension = $file->getClientOriginalExtension(); // Obtener la extensión del archivo original
    
            // Verificar si se seleccionó un archivo con extensión permitida
            if (in_array($fileExtension, ['xlsx', 'csv'])) {
    
                // Crear el lector adecuado según la extensión
                if ($fileExtension === 'xlsx') {
                    $reader = ReaderEntityFactory::createXLSXReader();
                } else {
                    $reader = ReaderEntityFactory::createCSVReader();
                    $reader->setFieldDelimiter(';'); // Establecer el delimitador de campo si es un archivo CSV
                }
    
                $reader->open($file->getPathname()); // Abrir el archivo para lectura
    
                $rows = []; // Arreglo para almacenar los datos del archivo
    
                // Recorrer las hojas y filas del archivo
                foreach ($reader->getSheetIterator() as $sheet) {
                    foreach ($sheet->getRowIterator() as $row) {
                        $data = $row->toArray();
                        $rows[] = $data;
                    }
                }
    
                $reader->close(); // Cerrar el lector después de su uso
    
                $contador = 0; // Variable para contar las iteraciones
                $mensajeError = null;

                foreach ($rows as $row) {
                    if ($contador > 0) {
                        $tuModelo = new ExcelM(); // Crear una nueva instancia de tu modelo
    
                        if ($fileExtension === 'xlsx') {
                            // Asignar los valores a los campos correspondientes en tu modelo
                            $tuModelo->CATEGORIA = $row[1];
                            $tuModelo->CODPRODUCTO = $row[2];
                            $tuModelo->NOMPRODUCTO = $row[3];
                            $tuModelo->PROVEEDORES = $row[4];
                            $tuModelo->DOLARES = is_numeric($row[5]) ? round(floatval($row[5]), 2) : 0;
                            $tuModelo->SOLES = is_numeric($row[6]) ? round(floatval($row[6]), 2) : 0;
                            $tuModelo->VENTA = is_numeric($row[7]) ? round(floatval($row[7]), 2) : 0;
                            $tuModelo->UTILIDAD = is_numeric($row[8]) ? round(floatval($row[8]), 2) : 0;
                            $tuModelo->PROMOCION = is_numeric($row[9]) ? round(floatval($row[9]), 2) : 0;
                            $tuModelo->STOCK = $row[10];
                            $tuModelo->MARCA = $row[11];
                        } else {
                            // Separar los valores por comas y asignarlos a campos individuales
                            $campos = explode(',', $row[0]);
    
                            $tuModelo->CATEGORIA = isset($campos[1]) ? $campos[1] : null;
                            $tuModelo->CODPRODUCTO = isset($campos[2]) ? $campos[2] : null;
                            $tuModelo->NOMPRODUCTO = isset($campos[3]) ? $campos[3] : null;
                            $tuModelo->PROVEEDORES = isset($campos[4]) ? $campos[4] : null;
                            $tuModelo->DOLARES = isset($campos[5]) && is_numeric($campos[5]) ? round(floatval($campos[5]), 2) : null;
                            $tuModelo->SOLES = isset($campos[6]) && is_numeric($campos[6]) ? round(floatval($campos[6]), 3) : null;
                            $tuModelo->VENTA = isset($campos[7]) && is_numeric($campos[7]) ? round(floatval($campos[7]), 3) : null;
                            $tuModelo->UTILIDAD = isset($campos[8]) && is_numeric($campos[8]) ? round(floatval($campos[8]), 3) : null;
                            $tuModelo->PROMOCION = isset($campos[9]) && is_numeric($campos[9]) ? round(floatval($campos[9]), 3) : null;
                            $tuModelo->STOCK = isset($campos[10]) ? $campos[10] : null;
                            $tuModelo->MARCA = isset($campos[11]) ? $campos[11] : null;
                        }
                        
                        $validator = Validator::make(
                            ['CODPRODUCTO' => $tuModelo->CODPRODUCTO],
                            ['CODPRODUCTO' => Rule::unique('_h_b_a')->ignore($tuModelo->ID)]
                        );
                    
                        if ($validator->fails()) {
                            $mensajeError = 'Por favor revisa tus datos, se encontraron productos duplicados en el sistema.';
                            // Aquí puedes hacer algo con el mensaje de error, como mostrarlo en la vista o guardarlo en una variable de sesión
                    
                            continue; // Saltar a la siguiente iteración si el código de producto es duplicado
                        }
                        
                        $tuModelo->save(); // Guardar el modelo en la base de datos
    
                        $this->generarURLsProductoEImagen($tuModelo); // Generar y guardar las URL de producto e imagen
                        $this->PSoles($tuModelo, $valor_dolar);
                        $this->PVenta($tuModelo, $A, $B, $C, $D, $E, $H);
                        $this->Utilidad($tuModelo);
                        
                    }
    
                    $contador++; // Incrementar el contador en cada iteración
                }
                
    
                return redirect()->back()->with('rows', $rows)->with('file_extension', $fileExtension)->withErrors([$mensajeError]);
            } else {
                return redirect()->back()->with('error', 'El formato del archivo no es compatible. Solo se admiten archivos XLSX y CSV.');
            }
        }
    
        return redirect()->back()->with('error', 'Por favor, selecciona un archivo.');
    }

    public function PSoles($tuModelo, $valor_dolar)
    {
        $PDolares = $tuModelo->DOLARES;
    
        // Calcular el precio en soles basado en el tipo de cambio y un factor de 1.18
        $resultado = $PDolares * $valor_dolar * 1.18;
    
        $tuModelo->SOLES =round($resultado, 2);
        $tuModelo->save();
    }
    
    public function PVenta($tuModelo, $A, $B, $C, $D, $E, $H)
    {
        $PSoles = $tuModelo->SOLES;
        $venta = 0; // Inicializar la variable $venta
    
        // Calcular la venta basada en los porcentajes proporcionados
        if ($A !== null && $PSoles >= 1 && $PSoles <= 100) {
            $venta = $PSoles * ($A / 100 + 1);
        } elseif ($B !== null && $PSoles > 100 && $PSoles <= 500) {
            $venta = $PSoles * ($B / 100 + 1);
        } elseif ($C !== null && $PSoles > 500 && $PSoles <= 1000) {
            $venta = $PSoles * ($C / 100 + 1);
        } elseif ($D !== null && $PSoles > 1000 && $PSoles <= 2000) {
            $venta = $PSoles * ($D / 100 + 1);
        } elseif ($E !== null && $PSoles > 2000 && $PSoles <= 3500) {
            $venta = $PSoles * ($E / 100 + 1);
        } elseif ($PSoles > 3500) {
            $venta = $PSoles * ($H / 100 + 1);
        }

        $tuModelo->VENTA = round($venta, 2); // Redondear el valor de venta a 2 decimales antes de asignarlo
        $tuModelo->save();
    }

    public function Utilidad($tuModelo)
    {
        $Costo = $tuModelo->SOLES;
        $netoigvCosto = $Costo / 1.18;
        $igvCosto = $netoigvCosto * 0.18;
    
        $Venta = $tuModelo->VENTA;
        $netoigvVenta = $Venta / 1.18;
        $igvVenta = $netoigvVenta * 0.18;
    
        $pagoIGV = $igvVenta - $igvCosto;
    
        $pagoRenta = $netoigvVenta * 0.015;
    
        $calculo = $Venta - $Costo - ($pagoIGV + $pagoRenta);
    
        $utilidad = round($calculo, 2); // Redondear la utilidad a dos decimales
    
        $tuModelo->UTILIDAD = $utilidad; // Pasar el resultado a la vista
        $tuModelo->save();
    }
    

//URL'S
    public function generarURLsProductoEImagen($tuModelo)
    {
        $codigoProducto = $tuModelo->CODPRODUCTO;
        $urlProducto = $this->obtenerURLProducto($codigoProducto);
    
        $this->guardarURLProducto($tuModelo, $urlProducto);
        $this->guardarURLImagen($tuModelo, $urlProducto, $codigoProducto);
    }
    
    public function obtenerURLProducto($codigoProducto)
    {
        $urlBase = 'https://www.deltron.com.pe/modulos/productos/items/producto.php?item_number=';
        $urlProducto = $urlBase . $codigoProducto;
        return $urlProducto;
    }
    
    public function guardarURLProducto($tuModelo, $urlProducto)
    {
        $tuModelo->URLP = $urlProducto;
        $tuModelo->save();
    }
    
    public function guardarURLImagen($tuModelo, $urlProducto, $codigoProducto)
    {
        // Verifica si la imagen ya existe en la tabla nueva_tabla
        $existingImage = NuevaTabla::where('codProduc', $codigoProducto)->first();

        if (!$existingImage) {
            // Si la imagen no existe en la nueva_tabla, guárdala en ambas tablas
            $client = new Client();
            $response = $client->request('GET', $urlProducto);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);

            $imagenElement = $crawler->filter('#imageGallery li')->first();
            $nombreProducto = $crawler->filter('#contentProductItem h1')->first();
            $descripcionProducto = $crawler->filter('#home p')->first();


            if ($imagenElement->count() > 0 && $nombreProducto->count() > 0 && $descripcionProducto->count() > 0) {
                $imagenUrl = $imagenElement->attr('data-src');
                $nombreProducto = $crawler->filter('#contentProductItem h1')->first()->text();
                $descripcionProducto = $crawler->filter('#home p')->first()->text();;
                // Guárdala en la nueva_tabla
                $newImage = new NuevaTabla();
                $newImage->codProduc = $tuModelo->CODPRODUCTO;
                $newImage->image_url = $imagenUrl;
                $newImage->Nombre_Producto = $nombreProducto;
                $newImage->Descripcion_Producto = $descripcionProducto;
                $newImage->save();

                // También guarda la URL en la tabla temporal _h_b_a
                $tuModelo->URLI = $imagenUrl;
                $tuModelo->NOMP = $nombreProducto;
                $tuModelo->DESP = $descripcionProducto;
                $tuModelo->save();
            } else {
                // Si no se encuentra la imagen, puedes asignar un valor predeterminado o dejarlo en null
                $tuModelo->URLI = null;
                $tuModelo->NOMP = "----";
                $tuModelo->DESP = null;
                $tuModelo->save();
            }
        } else {
            // Si la imagen ya existe en la nueva_tabla, obtén su URL y guárdala en _h_b_a
            $imagenUrl = $existingImage->image_url;
            $nombreProducto = $existingImage->Nombre_Producto;
            $descripcionProducto = $existingImage->Descripcion_Producto;
            $tuModelo->URLI = $imagenUrl;
            $tuModelo->NOMP = $nombreProducto;
            $tuModelo->DESP = $descripcionProducto;
            $tuModelo->save();
        }
    }



    public function RegistrarProducto(Request $request)
    {
        $PRODUCTO=new ExcelM($request->input());
        $PRODUCTO->saveOrFail();
        return redirect ('/excel')->with('success', 'Producto registrado!');
    }
    
    public function MostrarProducto(Request $request)
    {
        $ID = $request->input('ID');
        $PRODUCTO = Excel::findOrFail($ID);
        return $PRODUCTO->toJson();
    }

    public function ActualizarProducto(Request $request)
    {
        $ID = $request->input('ID');
        $PRODUCTO = ExcelM::findOrFail($ID);
        
        // Actualizar los otros campos del médico según sea necesario
        $PRODUCTO->CATEGORIA = $request->input('CATEGORIA');
        $PRODUCTO->CODPRODUCTO = $request->input('CODPRODUCTO');
        $PRODUCTO->NOMPRODUCTO = $request->input('NOMPRODUCTO');
        $PRODUCTO->PROVEEDORES = $request->input('PROVEEDORES');
        //$PRODUCTO->DOLARES = round(floatval($request->input('DOLARES')), 2);
        //$PRODUCTO->SOLES = round(floatval($request->input('SOLES')), 2);
        //$PRODUCTO->VENTA = round(floatval($request->input('VENTA')), 2);
        //$PRODUCTO->UTILIDAD = round(floatval($request->input('UTILIDAD')), 2);
        $PRODUCTO->PROMOCION = round(floatval($request->input('PROMOCION')), 2);
        $PRODUCTO->STOCK = $request->input('STOCK');
        $PRODUCTO->MARCA = $request->input('MARCA');
        $PRODUCTO->URLP = $request->input('URLP');
        $PRODUCTO->URLI = $request->input('URLI');
    
        $PRODUCTO->saveOrFail();
        return redirect('/excel')->with('success', 'Producto actualizado!');
    }

    public function EliminarProducto(Request $request)
    {
        $ID = $request->input('ID'); // Obtiene el valor del campo DNIPACIENTE del formulario
        DB::table('dbo._h_b_a')->where('ID', $ID)->delete(); // Elimina los registros de la tabla PACIENTE según el DNI
        return redirect('/excel')->with('success', 'Producto eliminado'); // Redirecciona a la página de pacientes después de eliminar el paciente
    }



    public function filtrarCategoriasYMarcasPorProveedorMarca($proveedorSeleccionado, $marcaSeleccionada, $categoriaSeleccionada)
    {
        $query = DB::table('_h_b_a')
            ->select('CATEGORIA', 'MARCA')
            ->where('PROVEEDORES', $proveedorSeleccionado)
            ->where('MARCA', $marcaSeleccionada)
            ->where('CATEGORIA', $categoriaSeleccionada)
            ->groupBy('CATEGORIA', 'MARCA');
    
        $resultadosFiltrados = $query->get();
    
        return $resultadosFiltrados;
    }
    
    public function FiltrarDatos(Request $request)
    {
 

        // Verificar si se debe eliminar registros
        if ($request->input('action') === 'eliminar') {
            // Obtener los proveedores, categorías y marcas seleccionadas
            $proveedoresSeleccionados = $request->input('proveedores');
            $categoriasSeleccionadas = $request->input('categorias');
            $marcasSeleccionadas = $request->input('marcas');
    
            // Obtener la consulta base sin aplicar filtros
            $query = DB::table('_h_b_a');
    
            // Aplicar filtros de proveedores, categorías y marcas si están seleccionados
            if (!empty($proveedoresSeleccionados)) {
                $query->whereIn('PROVEEDORES', $proveedoresSeleccionados);
            }
            if (!empty($categoriasSeleccionadas)) {
                $query->whereIn('CATEGORIA', $categoriasSeleccionadas);
            }
            if (!empty($marcasSeleccionadas)) {
                $query->whereIn('MARCA', $marcasSeleccionadas);
            }
    
            // Obtener la consulta filtrada
            $consultaFiltrada = $query->get();
    
            // Eliminar los registros filtrados
            $this->eliminarRegistros($consultaFiltrada);
    
            // Limpiar las selecciones de filtros
            $proveedorSeleccionado = null;
            $marcasSeleccionadas = null;
            $categoriasSeleccionadas = null;
        
    
            // Obtener los datos no filtrados de la base de datos
            $consultaFiltrada = DB::table('_h_b_a')->paginate(20);
    
            return view('Principal.ExcelFiltrado', [
                'proveedorSeleccionado' => $proveedorSeleccionado,
                'proveedoresRepetidos' => $this->obtenerProveedoresRepetidos(),
                'categoriasRelacionadas' => $this->obtenerCategoriasRelacionadas($proveedorSeleccionado),
                'marcasRelacionadas' => $this->obtenerMarcasRelacionadas($proveedorSeleccionado),
                'categoriasFiltradas' => $this->filtrarCategorias($this->obtenerCategoriasRelacionadas($proveedorSeleccionado), $categoriasSeleccionadas),
                'marcasFiltradas' => $this->filtrarMarcas($this->obtenerMarcasRelacionadas($proveedorSeleccionado), $marcasSeleccionadas),
                'consultaFiltrada' => $consultaFiltrada,
                'marcasSeleccionadas' => $marcasSeleccionadas,
                'categoriasSeleccionadas' => $categoriasSeleccionadas
            ],);
        }

    // Limpiar las selecciones de filtros
    $proveedorSeleccionado = null;
    $marcasSeleccionadas = null;
    $categoriasSeleccionadas = null;

    // Obtener los datos no filtrados de la base de datos
    $consultaFiltrada = DB::table('_h_b_a')->get();

        // Obtener el proveedor seleccionado desde el formulario
        $proveedorSeleccionado = $request->input('proveedores');
    
        // Obtener las marcas seleccionadas desde el formulario
        $marcasSeleccionadas = $request->input('marcas');
    
        // Obtener las categorías seleccionadas desde el formulario
        $categoriasSeleccionadas = $request->input('categorias');
    
        // Obtener los proveedores repetidos
        $proveedoresRepetidos = $this->obtenerProveedoresRepetidos();
    
        // Obtener las categorías y marcas relacionadas sin aplicar filtro de proveedor
        $categoriasRelacionadas = $this->obtenerCategoriasRelacionadas($proveedorSeleccionado);
        $marcasRelacionadas = $this->obtenerMarcasRelacionadas($proveedorSeleccionado);
    
        // Filtrar las categorías y marcas por proveedor y marca si hay selecciones
        if (!empty($proveedorSeleccionado) && !empty($marcasSeleccionadas) && !empty($categoriasSeleccionadas)) {
            $resultadosFiltrados = $this->filtrarCategoriasYMarcasPorProveedorMarca($proveedorSeleccionado, $marcasSeleccionadas[0], $categoriasSeleccionadas[0]);
        }
    
        // Filtrar las categorías por proveedor si hay una selección de proveedor
        if (!empty($proveedorSeleccionado)) {
            $categoriasRelacionadas = $this->filtrarCategoriasPorProveedor($categoriasRelacionadas, $proveedorSeleccionado);
        }
    
        // Filtrar las marcas por proveedor y categoría si hay selecciones
        if (!empty($proveedorSeleccionado) && !empty($categoriasSeleccionadas)) {
            $categoriaSeleccionada = $categoriasSeleccionadas[0];
            $marcasRelacionadas = $this->filtrarMarcasPorProveedor($marcasRelacionadas, $proveedorSeleccionado, $categoriaSeleccionada);
        }
    
        // Filtrar las categorías y marcas por las selecciones
        $categoriasFiltradas = $this->filtrarCategorias($categoriasRelacionadas, $categoriasSeleccionadas);
        $marcasFiltradas = $this->filtrarMarcas($marcasRelacionadas, $marcasSeleccionadas);
    
        // Obtener la consulta base
        $query = DB::table('_h_b_a');
    
        // Aplicar filtro de proveedor si hay selecciones
        if (!empty($proveedorSeleccionado)) {
            $query->whereIn('PROVEEDORES', $proveedorSeleccionado);
        }
    
        // Aplicar filtros de categorías y marcas si hay selecciones
        if (!empty($categoriasSeleccionadas)) {
            $query->whereIn('CATEGORIA', $categoriasSeleccionadas);
        }
        if (!empty($marcasSeleccionadas)) {
            $query->whereIn('MARCA', $marcasSeleccionadas);
        }
    
        // Obtener la consulta filtrada
        $consultaFiltrada = $query->get();
    
        return view('Principal.ExcelFiltrado', [
            'proveedorSeleccionado' => $proveedorSeleccionado,
            'proveedoresRepetidos' => $proveedoresRepetidos,
            'categoriasRelacionadas' => $categoriasRelacionadas,
            'marcasRelacionadas' => $marcasRelacionadas,
            'categoriasFiltradas' => $categoriasFiltradas,
            'marcasFiltradas' => $marcasFiltradas,
            'consultaFiltrada' => $consultaFiltrada,
            'marcasSeleccionadas' => $marcasSeleccionadas,
            'categoriasSeleccionadas' => $categoriasSeleccionadas
        ]);
    }
    
    public function filtrarpdf(Request $request)
    {
        // Obtener el proveedor seleccionado desde el formulario
        $proveedorSeleccionado = $request->input('proveedores');
        
        // Obtener las marcas seleccionadas desde el formulario
        $marcasSeleccionadas = $request->input('marcas');
        
        // Obtener las categorías seleccionadas desde el formulario
        $categoriasSeleccionadas = $request->input('categorias');
        
        // Obtener los proveedores repetidos
        $proveedoresRepetidos = $this->obtenerProveedoresRepetidos();
        
        // Obtener las categorías y marcas relacionadas sin aplicar filtro de proveedor
        $categoriasRelacionadas = $this->obtenerCategoriasRelacionadas($proveedorSeleccionado);
        $marcasRelacionadas = $this->obtenerMarcasRelacionadas($proveedorSeleccionado);
        
        // Filtrar las categorías y marcas por proveedor y marca si hay selecciones
        if (!empty($proveedorSeleccionado) && !empty($marcasSeleccionadas) && !empty($categoriasSeleccionadas)) {
            $resultadosFiltrados = $this->filtrarCategoriasYMarcasPorProveedorMarca($proveedorSeleccionado, $marcasSeleccionadas[0], $categoriasSeleccionadas[0]);
        }
        
        // Filtrar las categorías por proveedor si hay una selección de proveedor
        if (!empty($proveedorSeleccionado)) {
            $categoriasRelacionadas = $this->filtrarCategoriasPorProveedor($categoriasRelacionadas, $proveedorSeleccionado);
        }
        
        // Filtrar las marcas por proveedor y categoría si hay selecciones
        if (!empty($proveedorSeleccionado) && !empty($categoriasSeleccionadas)) {
            $categoriaSeleccionada = $categoriasSeleccionadas[0];
            $marcasRelacionadas = $this->filtrarMarcasPorProveedor($marcasRelacionadas, $proveedorSeleccionado, $categoriaSeleccionada);
        }
        
        // Filtrar las categorías y marcas por las selecciones
        $categoriasFiltradas = $this->filtrarCategorias($categoriasRelacionadas, $categoriasSeleccionadas);
        $marcasFiltradas = $this->filtrarMarcas($marcasRelacionadas, $marcasSeleccionadas);
        
        // Obtener la consulta base
        $query = DB::table('_h_b_a');
        
        // Aplicar filtro de proveedor si hay selecciones
        if (!empty($proveedorSeleccionado)) {
            $query->whereIn('PROVEEDORES', $proveedorSeleccionado);
        }
        
        // Aplicar filtros de categorías y marcas si hay selecciones
        if (!empty($categoriasSeleccionadas)) {
            $query->whereIn('CATEGORIA', $categoriasSeleccionadas);
        }
        if (!empty($marcasSeleccionadas)) {
            $query->whereIn('MARCA', $marcasSeleccionadas);
        }
        
        // Obtener la consulta filtrada
        $consultaFiltrada = $query->get();
        
        return view('FiltrarPdf', [
            'proveedorSeleccionado' => $proveedorSeleccionado,
            'proveedoresRepetidos' => $proveedoresRepetidos,
            'categoriasRelacionadas' => $categoriasRelacionadas,
            'marcasRelacionadas' => $marcasRelacionadas,
            'categoriasFiltradas' => $categoriasFiltradas,
            'marcasFiltradas' => $marcasFiltradas,
            'consultaFiltrada' => $consultaFiltrada,
            'marcasSeleccionadas' => $marcasSeleccionadas,
            'categoriasSeleccionadas' => $categoriasSeleccionadas
        ]);
    }
    
    public function obtenerProveedoresRepetidos()
    {
        $query = DB::table('_h_b_a')
            ->select('PROVEEDORES')
            ->groupBy('PROVEEDORES');
    
        $proveedoresRepetidos = $query->get();
    
        return $proveedoresRepetidos;
    }
    
    public function obtenerCategoriasRelacionadas($proveedorSeleccionado)
    {
        $query = DB::table('_h_b_a')
            ->select('CATEGORIA')
            ->groupBy('CATEGORIA');
    
        if (!empty($proveedorSeleccionado)) {
            $query->whereIn('PROVEEDORES', $proveedorSeleccionado);
        }
    
        $categoriasRelacionadas = $query->get();
    
        return $categoriasRelacionadas;
    }
    
    public function obtenerMarcasRelacionadas($proveedorSeleccionado)
    {
        $query = DB::table('_h_b_a')
            ->select('MARCA')
            ->groupBy('MARCA');
    
        if (!empty($proveedorSeleccionado)) {
            $query->whereIn('PROVEEDORES', $proveedorSeleccionado);
        }
    
        $marcasRelacionadas = $query->get();
    
        return $marcasRelacionadas;
    }
    
    public function filtrarCategoriasPorProveedor($categoriasRelacionadas, $proveedorSeleccionado)
    {
        $query = DB::table('_h_b_a')
            ->select('CATEGORIA')
            ->whereIn('PROVEEDORES', $proveedorSeleccionado)
            ->groupBy('CATEGORIA');
    
        $categoriasFiltradas = $query->get();
    
        return $categoriasFiltradas;
    }
    
    public function filtrarMarcasPorProveedor($marcasRelacionadas, $proveedorSeleccionado, $categoriaSeleccionada)
    {
        $query = DB::table('_h_b_a')
            ->select('MARCA')
            ->whereIn('PROVEEDORES', $proveedorSeleccionado)
            ->where('CATEGORIA', $categoriaSeleccionada)
            ->groupBy('MARCA');
    
        $marcasFiltradas = $query->get();
    
        return $marcasFiltradas;
    }
    
    public function filtrarCategorias($categoriasRelacionadas, $categoriasSeleccionadas)
    {
        if (empty($categoriasSeleccionadas)) {
            return $categoriasRelacionadas;
        }
    
        $categoriasFiltradas = $categoriasRelacionadas->filter(function ($categoria) use ($categoriasSeleccionadas) {
            return in_array($categoria->CATEGORIA, $categoriasSeleccionadas);
        });
    
        return $categoriasFiltradas;
    }
    
    public function filtrarMarcas($marcasRelacionadas, $marcasSeleccionadas)
    {
        if (empty($marcasSeleccionadas)) {
            return $marcasRelacionadas;
        }
    
        $marcasFiltradas = $marcasRelacionadas->filter(function ($marca) use ($marcasSeleccionadas) {
            return in_array($marca->MARCA, $marcasSeleccionadas);
        });
    
        return $marcasFiltradas;
    }


    public function eliminarRegistros($registros)
    {
        // Obtener los IDs de los registros a eliminar
        $idsRegistros = $registros->pluck('ID')->toArray();
    
        // Obtener la instancia del modelo correspondiente
        $modelo = new ExcelM(); // Reemplaza "Registro" con el nombre de tu modelo
    
        // Obtener los registros completos a partir de los IDs
        $registrosCompletos = $modelo->whereIn('ID', $idsRegistros)->get();
    
        // Eliminar los registros completos de la base de datos
        $registrosCompletos->each(function ($registro) {
            $registro->delete();
        });
    }
    
   
    public function catalogoHba(Request $request)
    {
       if ($request->get('marcas') != '') {
            $marcas = $request->get('marcas');
            $productos = DB::table('_h_b_a')->where('MARCA', 'like', "%$marcas%")->paginate(20);
            return view('Principal.Catalogo', compact('productos'));
        }
    
        if ($request->get('detalleproducto') != '') {
            $url = $request->input('URLP');
            $Promocion = $request->get('PROMOCION');
            $PrecioVenta = $request->get('VENTA');
            $Inventario = $request->get('STOCK');
            $NombreProducto = $request->get('NOMP');
            $CodigoProducto = $request->get('CODPRODUCTO');
    
            // Verifica si la URL contiene las palabras clave
            if (strpos($url, 'https://www.deltron.com.pe/modulos/productos/items/producto.php?item_number=') !== false) {
                $client = new Client([
                    RequestOptions::VERIFY => false,
                ]);
    
                $response = $client->request('GET', $url);
                $html = $response->getBody()->getContents();
    
                $posicion_coincidencia = strrpos($html, '<div class="container container-ficha-producto">');
                $html1 = substr($html, $posicion_coincidencia + 451);
                $html2 = substr($html1, 0, -15240);
    
                return view('Principal.Deltron', compact('html2', 'NombreProducto', 'CodigoProducto', 'Promocion', 'PrecioVenta', 'Inventario'));
            } else {
    
                $client = new Client([
                    RequestOptions::VERIFY => false,
                ]);
    
                $response = $client->request('GET', $url);
                $html = $response->getBody()->getContents();
                // Si la URL no contiene las palabras clave, carga otra vista
                return view('Principal.Otro', compact('html','NombreProducto', 'CodigoProducto', 'Promocion', 'PrecioVenta', 'Inventario'));
            }
        }
        
        
        else {    
    
        $marcas = DB::table('_h_b_a')->select('MARCA')->distinct()->get();
        $categorias = DB::table('_h_b_a')->select('CATEGORIA')->distinct()->get();
        $proveedores = DB::table('_h_b_a')->select('PROVEEDORES')->distinct()->get();
    
        // Obtener los valores seleccionados de marca, categoría y proveedor del formulario
        $marcaSeleccionada = $request->input('buscarmarca');
        $categoriaSeleccionada = $request->input('buscarcategoria');
        $proveedorSeleccionado = $request->input('buscarproveedor');
    
        // Filtrar los productos por marca, categoría y/o proveedor si se han seleccionado
        $productos = DB::table('_h_b_a')
            ->when($marcaSeleccionada, function ($query) use ($marcaSeleccionada) {
                return $query->where('MARCA', $marcaSeleccionada);
            })
            ->when($categoriaSeleccionada, function ($query) use ($categoriaSeleccionada) {
                return $query->where('CATEGORIA', $categoriaSeleccionada);
            })
            ->when($proveedorSeleccionado, function ($query) use ($proveedorSeleccionado) {
                return $query->where('PROVEEDORES', $proveedorSeleccionado);
            })
            ->paginate(20);
    
        return view('Principal.Catalogo', [
            'marcas' => $marcas,
            'categorias' => $categorias,
            'proveedores' => $proveedores,
            'productos' => $productos,
            'marcaSeleccionada' => $marcaSeleccionada,
            'categoriaSeleccionada' => $categoriaSeleccionada,
            'proveedorSeleccionado' => $proveedorSeleccionado,
        ]);
    }
    }

public static function deltron($ingreso = '')
{
    $client = new Client([
        RequestOptions::VERIFY => false,
    ]);
    $response = $client->request('GET', $ingreso);
    $html = $response->getBody()->getContents();

    $crawler = new Crawler($html);
    $jobs = '';

    $crawler->filter('section.product-images div.product-carousel-container')->each(function (Crawler $lista) use (&$jobs) {
        $job = [];

        $img = $lista->filter('div.slick-img-products')->first();
        $job['url'] = $img->filter('ul li img')->first()->attr('src');
        $jobs = implode(', ', $job);
    });

    // dd($jobs);
    return $jobs;
}
    public function eliminarData()
    {
        try {
            DB::table('_h_b_a')->truncate();
            return response()->json(['success' => 'Eliminación de datos exitosa']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar los datos: ' . $e->getMessage()]);
        }
    }
    
    public function generateExcel()
{
    return Excel::download(new excelExport(), 'excel.xlsx');
}
public function generarExcel(Request $request)
{
    $datos = ExcelM::all();

    return Excel::download(new ExcelExport($datos), 'reporte_Facebook.xlsx');
}

public function generateExcelproodoo()
{
    return Excel::download(new excelExportproOdoo(), 'excel.xlsx');
}

public function generarExcelProOddo(Request $request)
{
    $datos = ExcelM::all();

    return Excel::download(new excelExportproOdoo($datos), 'reporte_ProductosOdoo.xlsx');
}

public function pdf(){
    
    $data = ExcelM::orderBy('ID')->get();

        $pdf = PDF::loadView('reporte', ['data' => $data]);
    
        return $pdf->download('generar.pdf');
}

public function mostrarSeleccion()
{
    $productos = ExcelM::all(); 

    return view('selecciona', compact('productos'));
    
}

public function generarPDF(Request $request)
{
    $productosSeleccionados = $request->input('productos_seleccionados', []);

    // Obtén los detalles de los productos seleccionados según sus IDs
    $productos = ExcelM::whereIn('ID', $productosSeleccionados)->get();

    // Genera el PDF con los productos seleccionados
    $pdf = PDF::loadView('seleccionpdf', ['productos' => $productos]);

    return $pdf->download('productos_seleccionados.pdf');
}

public function generarPDFFiltrado(Request $request)
{
    $productosSeleccionados = $request->input('productos_seleccionados');

    $detallesProductos = ExcelM::whereIn('ID', $productosSeleccionados)->get();

    $pdf = PDF::loadView('reporteFiltrado', ['detallesProductos' => $detallesProductos]);

    return $pdf->download('informeFiltrado.pdf');
}

public function generateExcelinvodoo()
{
    return Excel::download(new excelExportinvOdoo(), 'excel.xlsx');
}

public function generarExcelInventarioOdoo(Request $request)
{
    $datos = ExcelM::all();

    return Excel::download(new excelExportinvOdoo($datos), 'reporte_inventarioOdoo.xlsx');
}

public function botonespagina(Request $request)
{
    return view('botones');
}

public function buscarProductos(Request $request)
{
    $marcas = DB::table('_h_b_a')->select('MARCA')->distinct()->get();
    $categorias = DB::table('_h_b_a')->select('CATEGORIA')->distinct()->get();
    $proveedores = DB::table('_h_b_a')->select('PROVEEDORES')->distinct()->get();

    $nombre = $request->get('buscarpor');

    // Realizar la búsqueda de productos
    $productos = DB::table('_h_b_a')
        ->where(function ($query) use ($nombre) {
            $query->where('MARCA', 'like', "%$nombre%")
                  ->orWhere('CODPRODUCTO', 'like', "%$nombre%")
                  ->orWhere('NOMP', 'like', "%$nombre%")
                  ->orWhere('CATEGORIA', 'like', "%$nombre%");
        })
        ->paginate(20);

    return view('Principal.Catalogo', [
        'marcas' => $marcas,
        'categorias' => $categorias,
        'proveedores' => $proveedores,
        'productos' => $productos,
    ],compact('productos'));
}

}