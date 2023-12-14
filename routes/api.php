<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/gps/{imei}/{ubicacion}/{pila}', 'API\GpsController@gps');

Route::get('/recibeqr/{datos}', 'API\GpsController@recibeqr');

Route::get('/socketweb', 'API\GpsController@socketweb');

Route::get('/enviac/{distancia}/{alias}', 'API\GpsController@enviac');

Route::get('probar', 'API\GpsController@probar');

Route::get('/llc301', 'API\GpsController@llc301');

Route::post('/ultimasdiez', 'API\GpsController@ultimasdiez');


Route::get('/flespi', 'API\FlespiGpsController@recibegps');



