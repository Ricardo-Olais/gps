<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use ElephantIO\Client as Socket;
use ElephantIO\Engine\SocketIO\Version2X;
use Mail; 
use App\Mail\Bienvenida;
use App\Mail\Alertas;
use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Log;


class FlespiGpsController extends Controller
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


    public function gps(Request $request)
    {
      
        /*$gps=explode(',', $ubicacion);

        $latitud=$gps[0];
        $longitud=$gps[1];
        $velocidad=$gps[2];

        $name="...";*/

        $latitud=$request->latitud;

        $longitud=$request->longitud;

        $imei=$request->imei;

        $pila=$request->pila;

        $velocidad=$request->velocidad;

        $ultimaPosi=$request->ultimaPosicion;



        /* "latitud"=>$longitud,
        "longitud"=>$latitud,
        "imei"=>$imei,
         "pila"=>$bateria,
        "ultimaPosicion"=>$fechaSistema*/


        /*$sid = 'ACfa9f8841463c6cf3778c5d76cb42be00';
        $token = 'ad17ead7faeb621196aed6a1e694bafa'; 

        $twilio = new Client($sid, $token);*/

        $llave=env('LLAVE_API_MAPS');

        date_default_timezone_set("America/Mexico_City");
         $mifecha= date('Y-m-d H:i:s'); 

         //$NuevaFecha = strtotime ( '-1 hour' , strtotime ($mifecha) ) ;
         //$NuevaFecha = date ('Y-m-d H:i:s' , $NuevaFecha);

         $NuevaFecha = date ('Y-m-d H:i:s');


        //consultar estatus de vehículo

       // $vehiclesEstatus=DB::select("SELECT * FROM vehiculos WHERE id_imei_android='$imei'");

        $vehiclesEstatus=DB::select("SELECT * FROM v_gps WHERE id_imei_android='$imei'");

        //$vehiclesGps=DB::select("SELECT * FROM gpslocations WHERE numero='$imei'");

          if(count($vehiclesEstatus)>0){

             $email=$vehiclesEstatus[0]->email;
             $conductor=$vehiclesEstatus[0]->conductor;
             $geocerca=$vehiclesEstatus[0]->geocerca;
             $address_geocerca=$vehiclesEstatus[0]->address_geocerca;
             $fija=$vehiclesEstatus[0]->fija;
             $notificaciones=$vehiclesEstatus[0]->notificaciones;
             $activaGeocerca=$vehiclesEstatus[0]->activaGeocerca;
             $estatus=$vehiclesEstatus[0]->estatus;
             $telefono=$vehiclesEstatus[0]->telefono;
             $direccion_fija=$vehiclesEstatus[0]->direccion_fija;
             $alerta=$vehiclesEstatus[0]->alerta;
             $alias=$vehiclesEstatus[0]->alias_vehiculo;
             $alerta2=$vehiclesEstatus[0]->alerta2;
          
             $tipo=$vehiclesEstatus[0]->tipo;

             $latitud_geocerca=$vehiclesEstatus[0]->latitud_geocerca;
             $longitud_geocerca=$vehiclesEstatus[0]->longitud_geocerca;
             $geocerca=$vehiclesEstatus[0]->geocerca;
             $ultima=$vehiclesEstatus[0]->ultimap;




              $geocodeFrom = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitud,$longitud&key=$llave");

              $outputFrom = json_decode($geocodeFrom);
              $direccion=$outputFrom->results[0]->formatted_address;

              $mensajealerta="";
              $mensajealerta2="";

               if($alerta==1){ //alerta fija

                $mensajealerta="Alerta de Parking: El vehículo $alias está en movimiento, se encuentra en $direccion";
               
                }

                if($alerta2==1){

                $mensajealerta2="El vehículo $alias está fuera del área permitida, se encuentra en $direccion";

                }



                $json1 = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=$latitud&lon=$longitud&appid=b6e4d569d1718b07a44702443dd0ed77&lang=es");
                $obj1 = json_decode($json1);
                $temp=$obj1->main->temp;

                $temperatura=$temp -273.15;
                $textt =trim($obj1->weather[0]->description);
                $clima=urlencode($textt);
                $clima=preg_replace('([^A-Za-z0-9])', ' ', $clima);

               // $urlT=htmlspecialchars_decode("http://api.mymemory.translated.net/get?q=$textt&langpair=en|es");
          
              



               // $json = file_get_contents('http://api.mymemory.translated.net/get?q='.urlencode($textt).'&langpair=en|es'); 
                        
                //$obj = json_decode($json);

                //$clima= $obj->responseData->translatedText;
                $tempe=$temperatura." °C";
                        


              $fields=array(

                       "latitud"=>$longitud,"longitud"=>$latitud,"imei"=>$imei,
                       "direccion"=>$direccion,
                       "pila"=>$pila,
                       "fecha"=>$NuevaFecha,
                        "alias"=>$alias,
                        "conductor"=>$conductor,
                        "fija"=>$fija,
                        "activaGeocerca"=>$activaGeocerca,
                        "msjalerta1"=>$mensajealerta,
                        "tipo"=>$tipo,
                        "msjalerta2"=>$mensajealerta2,
                        "latitud_geocerca"=>$latitud_geocerca,
                        "longitud_geocerca"=>$longitud_geocerca,
                        "geocerca"=>$geocerca,
                        "velocidad"=>$velocidad,
                        "clima"=>$clima,
                        "temperatura"=>$tempe,
                        "ultimap"=>$ultima

                   );
       
              $fields_string = http_build_query($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://localizaminave.com.mx/soliSocket/ubicaini.php?".$fields_string);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

               
                    $string = curl_exec($ch);


             



                if($estatus==2 || $estatus==5){

                   // echo "activo y pagado";

                //consultamos tabla de gpslocations
                   $vehiclesGps=DB::select("SELECT * FROM gpslocations WHERE numero='$imei'");

                     if(count($vehiclesGps)>0){

                        //actualizamos el registro 
                         DB::table('gpslocations')->where('numero', $imei)->update( 
                                    array(

                                        'latitud' =>$latitud,
                                        'longitud' =>$longitud,
                                        'velocidad' =>$velocidad,
                                        'fecha_gps' =>$NuevaFecha,
                                        'pila' =>$pila,
                                        'ultimap' =>$ultimaPosi

                                  ));
                         //insertamos registro en bitácora
                          DB::table('gpslocations_hist')->insert(
                                      [
                                      
                                        'latitud'=>$longitud,
                                        'longitud'=>$latitud,
                                        'sesion'=>$email,
                                        'numero'=>$imei,
                                        'direccion'=>$direccion,
                                        'velocidad'=>$velocidad,
                                        'fecha_gps'=>$NuevaFecha,
                                        'pila'=>$pila
                                        

                                      ]);
             

                     }else{

                        //insertamos registro

                        DB::table('gpslocations')->insert(
                                      [
                                      
                                        'latitud'=>$longitud,
                                        'longitud'=>$latitud,
                                        'sesion'=>$email,
                                        'numero'=>$imei,
                                        'direccion'=>$direccion,
                                        'velocidad'=>$velocidad,
                                        'fecha_gps'=>$NuevaFecha,
                                        'pila'=>$pila
                                        

                                      ]);
                     }



                //####################################### Validación de alertas #####################################################
                    if($fija==1 && $alerta==0){

                    
                        if($direccion_fija!=""){
                        //fin de consulta
                        
                        //Change address format
                        $formattedAddrFrom = str_replace(' ','+',$direccion_fija);
                        $formattedAddrTo = str_replace(' ','+',$direccion);
                        
                        //Send request and receive json data
                        $geocodeFrom = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$formattedAddrFrom&sensor=false&key=$llave");
                        $outputFrom = json_decode($geocodeFrom);
                        $geocodeTo = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$formattedAddrTo&sensor=false&key=$llave");
                        $outputTo = json_decode($geocodeTo);

                       
                        
                        //Get latitude and longitude from geo data
                        @$latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
                        @$longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
                        @$latitudeTo = $outputTo->results[0]->geometry->location->lat;
                        @$longitudeTo = $outputTo->results[0]->geometry->location->lng;
                        
                        //Calculate distance from latitude and longitude
                        @$theta = $longitudeFrom - $longitudeTo;

                        @$dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));


                        $dist = acos($dist);
                        $dist = rad2deg($dist);
                       
                        $miles = $dist * 60 * 1.853;

                        $km=($miles * 1.6093444);

                       if($km>.50){ //mayor a 50 metros, activar alerta enviar notificación

                    
                            
                                DB::table('vehiculos')->where('id_imei_android', $imei)->update(array('alerta' =>1));
                                //enviamos correo de notificación

                                $texto="Alerta de Parking: Hola el vehículo $alias se encuentra en movimiento, visita https://localizaminave.com.mx/tracker";

                               
                                $phone = '+525586779297';

                               // $this->enviamsgaws($texto,$phone);


                                Mail::to($email)->send(new Alertas($name,$texto));



                       }


                    }


                }




                //############## valida la geocerca activa ############################################################

                    if($activaGeocerca==1 && $geocerca>0 && $alerta2==0){

                             //fórmula de Haversine para Geocerca

                                $lat1 = (float) $latitud; //lat actual
                                $lng1 = (float) $longitud;

                                $lat2 = (float) $latitud_geocerca;  //geocerca
                                $lng2 = (float) $longitud_geocerca;

                                $radius = 6371;

                                $dLat = deg2rad($lat2 - $lat1);
                                $dLon = deg2rad($lng2 - $lng1);

                                $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) 
                                         * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
                                $c = 2 * asin(sqrt($a));
                                $d = $radius * $c;

                                $distancia=$d*1000;
                                $isInside = $distancia < 500;

                                if($isInside==false){

                                     //enviamos correo de notificación
                                DB::table('vehiculos')->where('id_imei_android', $imei)->update(array('alerta2' =>1));

                                $texto="Alerta de Geocerca: Hola el vehículo $alias ha salido del área permitida, visita https://localizaminave.com.mx/tracker";

                                $phone = '+525586779297';

                                //$this->enviamsgaws($texto,$phone);

                                Mail::to($email)->send(new Alertas($name,$texto));


                                }

          
                }//fin de geocerca activa

       

             }//fin de if activo



            

          }

     

        
    }





    public function recibegps(Request $request){

        date_default_timezone_set("America/Mexico_City");

      //  $json_string = file_get_contents('php://input');

        $json_string=$request->getContent();


         $respuesta = json_decode($request->getContent());

        // print_r($respuesta);


        // Log::info($json_string);

        /* $json_string='[
                {
                    "battery.charging.status": false,
                    "battery.voltage": 3.82,
                    "channel.id": 1176599,
                    "defense.active.status": false,
                    "device.id": 5416447,
                    "device.name": "TEST CONEXION",
                    "device.type.id": 2152,
                    "engine.blocked.status": false,
                    "engine.ignition.status": true,
                    "gnss.status": false,
                    "gsm.signal.level": 100,
                    "ident": "864032050080231",
                    "language.enum": "english",
                    "peer": "189.203.57.20:33147",
                    "protocol.id": 13,
                    "protocol.number": 35,
                    "remote.lock.status": false,
                    "server.timestamp": 1702481093.190923,
                    "timestamp": 1702481093.190923,
                    "position.latitude":19.4571555,
                    "position.longitude":-99.213465,
                    "position.direction":44,
                    "position.speed":40,
                    "position.satellites":5


                }
            ]';*/

      //$respuesta=json_decode($json_string);

      $respuesta = json_decode($request->getContent());
      
      $latitude='position.latitude';
      $longitude='position.longitude';
      $ident='ident';
      $direc='position.direction';
      $satelites='position.satellites';
      $speed='position.speed';
      $fecha='timestamp';
      $voltaje='battery.voltage';

          if(isset($respuesta[0]->{$latitude})){


      $latitud=$respuesta[0]->{$latitude};

      $longitud=$respuesta[0]->{$longitude};

      $imei=$respuesta[0]->{$ident};
      $position=$respuesta[0]->{$direc};
      $satelites=$respuesta[0]->{$satelites};
      $velocidad=$respuesta[0]->{$speed};
      $bateria=$respuesta[0]->{$voltaje};

      $mil = $respuesta[0]->{$fecha}; 
      $seconds = $mil; 
      $fechaserver="última posición: ".date("d/m/Y H:i:s", $seconds);

      $fechaSistema="Fecha actualización: ".date("d/m/Y H:i:s");


      $geocodeFrom = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitud,$longitud&key=AIzaSyBUFvjmiSEws605N3hXN3mAv83MeG8ZL9k");

      $outputFrom = json_decode($geocodeFrom);
      $direccion=$outputFrom->results[0]->formatted_address;

      $NuevaFecha = date ('Y-m-d H:i:s');


      $vehiclesEstatus=DB::select("SELECT * FROM vehiculos WHERE id_imei_android='$imei'");

        //$vehiclesGps=DB::select("SELECT * FROM gpslocations WHERE numero='$imei'");

          if(count($vehiclesEstatus)>0){

             $email=$vehiclesEstatus[0]->email;
             $conductor=$vehiclesEstatus[0]->conductor;
             $geocerca=$vehiclesEstatus[0]->geocerca;
             //$address_geocerca=$vehiclesEstatus[0]->address_geocerca;
             $fija=$vehiclesEstatus[0]->fija;
             $notificaciones=$vehiclesEstatus[0]->notificaciones;
             $activaGeocerca=$vehiclesEstatus[0]->activaGeocerca;
             $estatus=$vehiclesEstatus[0]->estatus;
             $telefono=$vehiclesEstatus[0]->telefono;
             $direccion_fija=$vehiclesEstatus[0]->direccion_fija;
             $alerta=$vehiclesEstatus[0]->alerta;
             $alias=$vehiclesEstatus[0]->alias_vehiculo;
             $alerta2=$vehiclesEstatus[0]->alerta2;
          
             $tipo=$vehiclesEstatus[0]->tipo;

             $latitud_geocerca=$vehiclesEstatus[0]->latitud_geocerca;
             $longitud_geocerca=$vehiclesEstatus[0]->longitud_geocerca;
             $geocerca=$vehiclesEstatus[0]->geocerca;


             //clima

             $json1 = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=$latitud&lon=$longitud&appid=b6e4d569d1718b07a44702443dd0ed77&lang=es");
             $obj1 = json_decode($json1);
             $temp=$obj1->main->temp;

             $temperatura=$temp -273.15;
             $textt =trim($obj1->weather[0]->description);
             $clima=urlencode($textt);
             $clima=preg_replace('([^A-Za-z0-9])', ' ', $clima);
             $tempe=$temperatura." °C";

             $fields=array(

                        "latitud"=>$longitud,
                        "longitud"=>$latitud,
                        "imei"=>$imei,
                        "direccion"=>$direccion.", ".$fechaserver,
                        "pila"=>$bateria,
                        "fecha"=>$NuevaFecha,
                        "alias"=>$alias,
                        "conductor"=>$conductor,
                        "fija"=>$fija,
                        "activaGeocerca"=>$activaGeocerca,
                        "msjalerta1"=>'',
                        "tipo"=>$tipo,
                        "msjalerta2"=>'',
                        "latitud_geocerca"=>$latitud_geocerca,
                        "longitud_geocerca"=>$longitud_geocerca,
                        "geocerca"=>$geocerca,
                        "velocidad"=>$velocidad,
                        "clima"=>$clima,
                        "temperatura"=>$tempe

                   );
       
              $fields_string = http_build_query($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://localizaminave.com.mx/soliSocket/ubicaini.php?".$fields_string);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $string = curl_exec($ch);

            if($estatus==2 || $estatus==5){

                   // echo "activo y pagado";

                //consultamos tabla de gpslocations
                   $vehiclesGps=DB::select("SELECT * FROM gpslocations WHERE numero='$imei'");

                     if(count($vehiclesGps)>0){

                        //actualizamos el registro 
                         DB::table('gpslocations')->where('numero', $imei)->update( 
                                    array(

                                        'latitud' =>$latitud,
                                        'longitud' =>$longitud,
                                        'velocidad' =>$velocidad,
                                        'fecha_gps' =>$NuevaFecha,
                                        'pila' =>$bateria,

                                  ));
                         //insertamos registro en bitácora
                          DB::table('gpslocations_hist')->insert(
                                      [
                                      
                                        'latitud'=>$longitud,
                                        'longitud'=>$latitud,
                                        'sesion'=>$email,
                                        'numero'=>$imei,
                                        'direccion'=>$direccion,
                                        'velocidad'=>$velocidad,
                                        'fecha_gps'=>$NuevaFecha,
                                        'pila'=>$bateria
                                        

                                      ]);
             

                     }else{

                        //insertamos registro

                        DB::table('gpslocations')->insert(
                                      [
                                      
                                        'latitud'=>$latitud,
                                        'longitud'=>$longitud,
                                        'sesion'=>$email,
                                        'numero'=>$imei,
                                        'direccion'=>$direccion,
                                        'velocidad'=>$velocidad,
                                        'fecha_gps'=>$NuevaFecha,
                                        'pila'=>$bateria
                                        

                                      ]);
                     }




         }


       }



    }

      http_response_code(200);
 
  }

    

}
