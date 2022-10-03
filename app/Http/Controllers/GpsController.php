<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class GpsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gps($imei,$ubicacion,$pila)
    {
        
        echo $pila;



         /*$valores=$_REQUEST['valores'];

            $extraemos=explode(",",$valores);

            if(count($extraemos)>0){

              $latitud=$extraemos[0];
              $longitud=$extraemos[1];
              $velocidad=$extraemos[2];
              $numero=$_REQUEST['imei'];
              $sesion=$_REQUEST['usuario'];
              $direccion="en desarrollo";
              $fecha=date("Y-m-d H:i:s");
              $pila=$_REQUEST['pila'];

        }*/


    }

    

}
