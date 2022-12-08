<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\OrdenServicioController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\PrivacidadController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\BuscarOrdenController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\ObservacionController;
use App\Http\Controllers\RequerimientoInternoController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\AutocompleteController;
use App\Mail\EmailPdf as MailEmailPdf;
use Illuminate\Support\Facades\Mail;




Route::get('/', function () {
    return view('modulos.ingresar');
});
Route::get('/ingresar', function () {
    return view('modulos.ingresar');
});
Route::get('/login', function () {
  //  return view('register');
     return view('modulos.ingresar');
});
Route::get('/login-alternativo', function () {
    //  return view('register');
       return view('auth.login-alternativo');
  });
Route::get('home', function () {
     return redirect()->route('home');
  });
Route::get('/register', function () {
    return view('register');
});
//++ Metodo AJAX
Route::post('consultarCliente',[ClientesController::class, 'consultarCliente']);
Route::POST('guardarEquipoOrden',[EquiposController::class, 'guardarEquipoOrden']);
Route::POST('guardarCliente',[ClientesController::class, 'guardarCliente']);
Route::POST('guardarUsuarioEmpresa',[ClientesController::class, 'guardarUsuarioEmpresa']);
Route::POST('consultarClienteEnter',[ClientesController::class, 'consultarClienteEnter']);
Route::POST('consultarUsuarioEmpresa',[ClientesController::class, 'consultarUsuarioEmpresa']);
Route::POST('SeleccionarUsaurioEmpresa',[ClientesController::class, 'SeleccionarUsaurioEmpresa']);
Route::POST('consultarMunicipio',[MunicipiosController::class, 'consultarMunicipio']);
Route::POST('consultarEquipo',[EquiposController::class, 'consultarEquipo']);
Route::POST('SeleccionarEquipo',[EquiposController::class, 'SeleccionarEquipo']);
Route::POST('guardarOrden',[OrdenServicioController::class, 'guardarOrden']);
Route::POST('guardarObservacion',[ObservacionController::class, 'guardarObservacion']);
Route::POST('guardarAnotacion',[ObservacionController::class, 'guardarAnotacion']);
Route::POST('guardarRepuesto',[RepuestoController::class, 'guardarRepuesto']);
Route::POST('autorizarRepuesto',[RepuestoController::class, 'autorizarRepuesto']);
Route::POST('editarRepuesto',[RequerimientoInternoController::class, 'editarRepuesto']);
Route::POST('termirnarOrden',[OrdenServicioController::class, 'termirnarOrden']);
Route::POST('facturaNumero',[OrdenServicioController::class, 'facturaNumero']);
Route::POST('guardarNumeroFactura',[OrdenServicioController::class, 'guardarNumeroFactura']);
Route::POST('editarReporteTecnico',[OrdenServicioController::class, 'editarReporteTecnico']);
Route::POST('changePrice',[OrdenServicioController::class, 'changePrice']);
Route::POST('update/password', 'PrivacidadController@update');
Route::POST('deleteRepuesto',[RepuestoController::class, 'delete']);
//Post Subtmit
Route::post('actualizarCliente/{id}',[ClientesController::class, 'update'])->name('actualizarCliente');
///Pdf ordenes
Route::GET('imprimir_ordeningreso/TBydUpOeWRoeTJjNUE9PSIsInZhbHVlI{idOrden}TBydUpOeWRoeTJjNUE9PSIsInZhbHVlI',[OrdenServicioController::class, 'ordenEntradaEmailAndPDF'])->name('ordenEntradaEmailyPDF');
Route::GET('OrdenEntrada/{idOrden}',[OrdenServicioController::class, 'ordenEntradaPDF'])->name('OrdenEntradaPDF');
Route::GET('imprimir_ordenSalida/TBydUpOeWncxZz09IiwibWFjIj/o65isMW/{email}/{idOrden}',[OrdenServicioController::class, 'ordenSalidaPdf'])->name('ordenSalidaPDFyEmail');
Route::GET('orden-salida/{idOrden}',[OrdenServicioController::class, 'generateFilesPDF'])->name('ordenEntrada');
Route::POST('entregarOrden',[OrdenServicioController::class, 'entregarOrden']);
Route::get('correo', function(){
});
Auth::routes();
Route::get('',[InicioController::class, 'index'])->name('home');
Route::get('inicio',[InicioController::class, 'index'])->name('home');
//Rutas Vistas formularios
Route::get('editarorden/{id_orden}',[OrdenServicioController::class, 'editarOden']) ->name('editarOrden');
Route::get('ordenGeneral/{id_orden}',[OrdenServicioController::class, 'ordenGeneral']) ->name('ordenGeneral');
//Orden de servicio
Route::get('crear_orden_servicio',[OrdenServicioController::class, 'index']) ->name('orden');
Route::get('orden-salida/{idOrden}',[OrdenServicioController::class, 'generateFilesPDF'])->name('ordenEntrada');
Route::post('crear_orden_servicio',[ClientesController::class, 'store']);
Route::get('orden_salida',[BuscarOrdenController::class, 'index']) ->name('searchOrden');
Route::get('imprimir_orden_blanco/{event}',[OrdenServicioController::class, 'ordenBlanco']);
//Autocomplete
Route::post('referenciaEquipoAjax',[AutocompleteController::class, 'BuscarReferencia']) ->name('referenciaEquipoAjax');
Route::post('marcaEquipoAjax',[AutocompleteController::class, 'BuscarMarca']) ->name('marcaEquipoAjax');
Route::post('caracteristicaEquipoAjax',[AutocompleteController::class, 'BuscarCaracteristicaEquipo']) ->name('caracteristicaEquipoAjax');
Route::post('cedulaClienteAjax',[AutocompleteController::class, 'BuscarCedulaCliente']) ->name('cedulaClienteAjax');
Route::post('repuestoOrdenAjax',[AutocompleteController::class, 'BuscarRepuestoOrden']) ->name('repuestoOrdenAjax');
//Requerimiento interno
Route::get('requerimiento',[RequerimientoInternoController::class, 'index']) ->name('requerimientos');
Route::get('clientes',[ClientesController::class, 'index']) ->name('clientes');
Route::get('clienteEdit/{idcliente}',[ClientesController::class, 'editCliente'])->name('clienteEdit') ;
Route::get('crear_cliente',[ClientesController::class, 'create']);
Route::post('crear_cliente',[ClientesController::class, 'store']);
//Equipos
Route::get('equipos',[EquiposController::class, 'index']) ->name('equipos');
Route::get('equipoEdit/{idequipo}',[EquiposController::class, 'equipoEdit'])->name('equipoEdit') ;
Route::post('equipos',[EquiposController::class, 'store']);
Route::post('actualizarEquipo/{id}',[EquiposController::class, 'update'])->name('actualizarEquipo');
//Privacidad
Route::get('privacidad',[PrivacidadController::class, 'index']) ->name('privacidad');
Route::post('consultarUsuario',[PrivacidadController::class, 'consultarUsuario']);
Route::post('updateuser',[PrivacidadController::class, 'updateuser'])->name('updateuser');
//Informes
Route::get('informes',[InformeController::class, 'index']) ->name('informes');
//Parametros
Route::get('parametros',[ParametroController::class, 'index']) ->name('parametros');
Route::post('parametros',[ParametroController::class, 'store']);

