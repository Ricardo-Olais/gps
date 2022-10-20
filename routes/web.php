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
            return view('tracker');
        });

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/consultacoordenadas', 'RastreoController@coordenadas');
Route::post('/vehiculosasignados', 'RastreoController@vehiculosasignados');
Route::get('/dispositivos', 'RastreoController@gridvehiculos');
Route::post('/actualizanumero', 'RastreoController@actualizanumero');
Route::post('/guardavehiculo', 'RastreoController@guardavehiculo');



//Notificaciones

Route::get('/whatsappfront', 'RastreoController@whatsappfront');
Route::post('/alerta', 'RastreoController@alerta');
Route::post('/guardafijo', 'RastreoController@guardafijo');
Route::post('/guardafijonotificacion', 'RastreoController@guardafijonotificacion');
Route::post('/activageocerca', 'RastreoController@activageocerca');
Route::post('/actualizasubscripcion', 'RastreoController@actualizasubscripcion');
Route::post('/licenciagratis', 'RastreoController@licenciagratis');



Route::get('/test', 'NotificacionesController@whatsapp');

