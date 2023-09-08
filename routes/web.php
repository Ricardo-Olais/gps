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
    return view('welcome');
});

Route::get('/index', function () {
    return view('welcome');
});

Route::get('/bienvenido', function () {
    return view('inicio');
});

Route::get('/como-funciona', function () {
    return view('funciona');
});

Route::group(['middleware' => 'auth'], function () {

        Route::get('/tracker', function () {
           // return view('mapa');

            return view('beta');
        });

});

Route::get('/tracking_share', function () {
    return view('tracking_share');
});

Route::get('/compartiendo', function () {
    return view('compartir');
});




Route::get('/terminos', function () {
    return view('terminos');
});

Route::get('/planes', function () {
    return view('planes');
});

Route::get('/pago', function () {
    return view('pago');
});

Route::get('/tracker2', function () {
    return view('tracker');
});


Route::get('/tracker3', function () {
    return view('mapa2');
});
Route::get('/tracker-mobil', function () {
    return view('mapa-mobil');
});


Route::get('/tracker4', function () {
    return view('mapa3');
});



Route::get('/privacy-policy', function () {
    return view('politicas');
});

Route::get('/beta', function () {
    return view('beta');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/consultacoordenadas', 'RastreoController@coordenadas');
Route::post('/vehiculosasignados', 'RastreoController@vehiculosasignados');
Route::get('/dispositivos', 'RastreoController@gridvehiculos');
Route::post('/actualizanumero', 'RastreoController@actualizanumero');
Route::post('/guardavehiculo', 'RastreoController@guardavehiculo');
Route::get('/historico', 'RastreoController@historico');
Route::post('/inicializasocket', 'RastreoController@inicializasocket');
Route::post('/inicializasocketcomparte', 'CompartirController@inicializasocketcomparte');

Route::post('/actualizageocerca', 'RastreoController@actualizageocerca');
Route::get('/facturacion', 'RastreoController@facturas');
Route::get('/auxgridvehiculos', 'RastreoController@auxgridvehiculos');
Route::post('/consultavehi', 'RastreoController@consultavehi');

Route::get('/micuenta', 'RastreoController@micuenta');


//Notificaciones

Route::get('/whatsappfront', 'RastreoController@whatsappfront');
Route::post('/alerta', 'RastreoController@alerta');
Route::post('/guardafijo', 'RastreoController@guardafijo');
Route::post('/guardafijonotificacion', 'RastreoController@guardafijonotificacion');
Route::post('/activageocerca', 'RastreoController@activageocerca');
Route::post('/actualizasubscripcion', 'RastreoController@actualizasubscripcion');
Route::post('/licenciagratis', 'RastreoController@licenciagratis');
Route::post('/eliminavehiculogps', 'RastreoController@eliminavehiculogps');


Route::get('/test', 'NotificacionesController@whatsapp');

Route::get('/testcorreo', 'RastreoController@testcorreo');

Route::get('/pruebacorreo/{distancia}/{alias}', 'RastreoController@pruebacorreo');


Route::get('/msg', 'SMSController@envia');



