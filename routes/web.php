<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return view('home');
});


// CAMPANIA
Route::get('Campania/Listado', 'CampaniaController@listado');
Route::post('Campania/guarda', 'CampaniaController@guarda');
Route::post('Campania/ajaxListado', 'CampaniaController@ajaxListado');
Route::get('Campania/home/{campania_id}', 'CampaniaController@home');
Route::post('Campania/ajaxBuscaVendedor', 'CampaniaController@ajaxBuscaVendedor');
Route::post('Campania/asignacionVendedorCampania', 'CampaniaController@asignacionVendedorCampania');
Route::post('Campania/ajaxListadoOportunidades', 'CampaniaController@ajaxListadoOportunidades');
Route::post('Campania/ajaxListadoVendedores', 'CampaniaController@ajaxListadoVendedores');
Route::post('Campania/ajaxListadoClientesAsignados', 'CampaniaController@ajaxListadoClientesAsignados');
Route::post('Campania/ajaxListadoSeguimientos', 'CampaniaController@ajaxListadoSeguimientos');
Route::post('Campania/ajaxListadoVendedorTramsferencia', 'CampaniaController@ajaxListadoVendedorTramsferencia');
Route::post('Campania/tramsferirOportunidadVendedor', 'CampaniaController@tramsferirOportunidadVendedor');
Route::post('Campania/guardaIngreso', 'CampaniaController@guardaIngreso');
Route::post('Campania/guardaEgreso', 'CampaniaController@guardaEgreso');
Route::get('Campania/balanceGeneral/{campania_id}', 'CampaniaController@balanceGeneral');


// FORMULARIO
Route::post('Formulario/guardaFormulario', 'FormularioController@guardaFormulario');
Route::get('Formulario/listado', 'FormularioController@listado');
Route::get('Formulario/formulario/{campania_id}', 'FormularioController@formulario');
Route::get('Formulario/respuestaFormulario/{campania_id}/{formulario_id}', 'FormularioController@respuestaFormulario');
Route::post('Formulario/guardarRespuestaFormulario', 'FormularioController@guardarRespuestaFormulario');
Route::get('Formulario/respuestaFormularioCompartir/{campania_id}/{formulario_id}/{red_social}', 'FormularioController@respuestaFormularioCompartir');


// VENDEDORES
Route::get('Vendedor/listado', 'VendedorController@listado');
Route::post('Vendedor/ajaxListado', 'VendedorController@ajaxListado');
Route::post('Vendedor/guarda', 'VendedorController@guarda');
Route::post('Vendedor/ajaxBuscaCampania', 'VendedorController@ajaxBuscaCampania');
Route::post('Vendedor/muestraFormularios', 'VendedorController@muestraFormularios');
Route::post('Vendedor/asignarCampaniaVendedor', 'VendedorController@asignarCampaniaVendedor');

// PERSONA
Route::get('Persona/listado', 'PersonaController@listado');

// MEDIO SEGUIMIENTO
Route::get('MedioSeguimietno/listado', 'MedioSeguimientoController@listado');


// MEDIO PUBLICITARIOS
Route::get('MedioPublicitario/listado', 'MedioPublicitarioController@listado');


// TIPOS DE CAMPANIA
Route::get('TipoCampania/listado', 'TipoCampaniaController@listado');
Route::post('TipoCampania/guarda', 'TipoCampaniaController@guarda');
Route::post('TipoCampania/ajaxListado', 'TipoCampaniaController@ajaxListado');

// ESTADO DE SEGUIMIENTO
Route::get('EstadoSeguimiento/listado', 'EstadoSeguimientoController@listado');

// ESTADO FINAL
Route::get('EstadoFinal/listado', 'EstadoFinalController@listado');

// ASIGNACIONES
Route::get('Asignacion/listado', 'AsignacionController@listado');

