<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;


class CompartirController extends Controller
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
    public function index()
    {
        return view('home');
    }

    public function inicializasocketcomparte(){

         $imei=$_REQUEST['imei'];
        // $llave=env('LLAVE_API_MAPS');

         //consultamos la llave de google maps. google_maps

        $llaveGoogle=DB::select("SELECT llave_maps FROM google_maps WHERE status=1");

        $llave=$llaveGoogle[0]->llave_maps;

        //consultamos los datos 
        $vehiclesEstatus=DB::select("SELECT * FROM v_gps WHERE id_imei_android='$imei'");

          if(count($vehiclesEstatus)>0){

             $email=$vehiclesEstatus[0]->email;
             $conductor=$vehiclesEstatus[0]->conductor;
             $alias=$vehiclesEstatus[0]->alias_vehiculo;
          
             
             $latitud=$vehiclesEstatus[0]->latitud;
             $longitud=$vehiclesEstatus[0]->longitud;
             $pila=$vehiclesEstatus[0]->pila;
             $fecha=$vehiclesEstatus[0]->fecha_gps;
             $fija=$vehiclesEstatus[0]->fija;
             $activaGeocerca=$vehiclesEstatus[0]->activaGeocerca;
             $alerta=$vehiclesEstatus[0]->alerta;
             $alerta2=$vehiclesEstatus[0]->alerta2;
             $tipo=$vehiclesEstatus[0]->tipo;
             $latitud_geocerca=$vehiclesEstatus[0]->latitud_geocerca;
             $longitud_geocerca=$vehiclesEstatus[0]->longitud_geocerca;
             $geocerca=$vehiclesEstatus[0]->geocerca;

             $mensajealerta="";
             $mensajealerta2="";


              $geocodeFrom = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitud,$longitud&key=$llave");

              $outputFrom = json_decode($geocodeFrom);
              @$direccion=@$outputFrom->results[0]->formatted_address;

              $fields=array(

                       "latitud"=>$longitud,"longitud"=>$latitud,"imei"=>$imei,
                       "direccion"=>$direccion,"pila"=>$pila,"fecha"=>$fecha,
                        "alias"=>$alias,
                        "conductor"=>$conductor,
                        "fija"=>$fija,
                        "activaGeocerca"=>$activaGeocerca,
                        "msjalerta1"=>$mensajealerta,
                        "tipo"=>$tipo,
                        "msjalerta2"=>$mensajealerta2,
                        "latitud_geocerca"=>$latitud_geocerca,
                        "longitud_geocerca"=>$longitud_geocerca,
                        "geocerca"=>$geocerca

                   );
       
              $fields_string = http_build_query($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://localizaminave.com/soliSocket/ubicaini.php?".$fields_string);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

               
                    $string = curl_exec($ch);

            }



    }


}
