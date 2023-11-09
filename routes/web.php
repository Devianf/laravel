<?php

use Illuminate\Support\Facades\Route;
//agregamos los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ExcelController1;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login
Route::get('/', function () {
    return view('auth.login');
});

//Dashboard
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', [App\Http\Controllers\ExcelController1::class, 'Dashboard'])->name('dashboard');
});
Auth::routes();
//roles
Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
});

//Contenido del sistema
Route::group(['middleware' => ['auth']], function(){

    Route::get('/excel', [ExcelController1::class, 'Index'])->name('excel.BD');
    Route::post('/excel', [ExcelController1::class, 'LeerExcel'])->name('excel.guardar');
    Route::post('/registrarP', [ExcelController1:: class, 'RegistrarProducto']);
    Route::post('/mostrarP/{ID}', [ExcelController1:: class, 'MostrarProducto']);
    Route::post('/actualizarP/{ID}', [ExcelController1:: class, 'ActualizarProducto']);
    Route::post('/eliminarP/{ID}', [ExcelController1:: class, 'EliminarProducto']);
    Route::get('/filtrar', [ExcelController1::class, 'FiltrarDatos'])->name('filtrar.excel.eliminar');
    Route::post('/filtrarPDF', [ExcelController1::class, 'filtrarpdf'])->name('filtrarpdf.editar');

    Route::post('/eliminar-data', [ExcelController1::class, 'eliminarData'])->name('eliminar-data');


    Route::post('/generate-excel', [ExcelController1::class, 'generarExcel'])->name('generate-excel');
    Route::post('/generate-excelproOdoo', [ExcelController1::class, 'generarExcelProOddo'])->name('generate-excelproOdoo');
    Route::post('/generate-excelinvOdoo', [ExcelController1::class, 'generarExcelInventarioOdoo'])->name('generate-excelinvOdoo');
    Route::post('/reporte', [ExcelController1::class, 'pdf'])->name('generar.pdf');
    Route::post('/seleccionar-productos', [ExcelController1::class, 'mostrarSeleccion'])->name('seleccion.pdf');
    Route::post('/generar-pdf', [ExcelController1::class, 'generarPDF'])->name('generar_pdf');
    Route::post('/generar-pdf-filtrado', [ExcelController1::class, 'generarPDFFiltrado'])->name('generar.pdf');
    Route::get('/boton', [ExcelController1::class, 'botonespagina'])->name('botones.index');

    //CATALOGO HBA BUSCAR-PRODUCTO

});

Route::get('/deltron', [ExcelController1::class, 'catalogoHba'])->name('catalogoHba');
Route::get('/catalogo', [ExcelController1::class, 'catalogoHba'])->name('catalogo.index');
Route::get('/buscar-productos', [ExcelController1::class, 'buscarProductos'])->name('buscarProductos');
