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

    public function llc301(Request $request){

        Log::info($request);

    }

    public function ultimasdiez(Request $request){


        $imei=$request->imei;


         $consulta=DB::select("SELECT DISTINCT direccion from gpslocations_hist WHERE numero='$imei' ORDER BY id_gps DESC LIMIT 5");
         $datos=array();

         for($i=0;$i<count($consulta);$i++){
     
            $datos['rows'][]=array("direccion"=>$consulta[$i]->direccion);

         }


           $result = json_encode($datos);

            return $result;


    }



    public function recibeqr($datos){

      
        $ext=explode('-', $datos);

        $id=$ext[1];
        $email=$ext[0];
        $imei=$ext[2];

        //validar si ya existe el imei

        $consultamosLicencias=DB::select("SELECT * FROM vehiculos WHERE id_imei_android='$imei'");

        $msg="";

            if(count($consultamosLicencias)>0){

                $msg="Ya existe una cuenta asociada al dispositivo, intenta desde otro equipo";
            }else{

                DB::table('vehiculos')->where('id_vehiculo', $id)->where('email', $email)->update(array('id_imei_android' =>$imei));


            }

        $fields=array("email"=>$email,"msg"=>$msg);
       
                    $fields_string = http_build_query($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://localizaminave.com.mx/soliSocket/index.php?".$fields_string);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

               
                    $string = curl_exec($ch);

               

        //$this->socketweb();


    }

    public function socketweb(){

        $client = new Socket(new Version2X('http://localhost:3000'));
        $client->initialize();
        $client->emit('send-message', [
            'email' => 'r.hernandez@lidcorp.mx',
            'latitud' => '-39.777777',
            'longitud'=> '100.883232'
        ]);
        $client->close();

    }

   public function enviamsgaws($message,$phone){

      

       /* $SnSclient= new SnsClient([
                   'region' => 'us-east-1',
                   'version' => '2010-03-31',
                    'credentials' => [
                            'key' =>'AKIAZIFGW5GS3Y2BYJUF',
                            'secret' =>'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',
                    ],
                    'http' => ['verify' => false]
            ]);

            try {
                $result = $SnSclient->publish([
                    'Message' => $message,
                    'PhoneNumber' => $phone,
                ]);

               
               // var_dump($result);
            } catch (AwsException $e) {
                // output error message if fails
                error_log("error es ". $e->getMessage());
            } */
   


   }


   public function probar(){

         date_default_timezone_set("America/Mexico_City");
         $mifecha= date('Y-m-d H:i:s'); 
         $NuevaFecha = strtotime ( '-1 hour' , strtotime ($mifecha) ) ;
         $NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 


      

        $SnSclient= new SnsClient([
                   'region' => 'us-east-1',
                   'version' => '2010-03-31',
                    'credentials' => [
                            'key' =>'AKIAZIFGW5GS3Y2BYJUF',
                            'secret' =>'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',
                    ],
                    'http' => ['verify' => false]
            ]);


              try {
                $result = $SnSclient->publish([
                    'Message' => "hola",
                    'PhoneNumber' =>"+525586779297",
                ]);

               
                var_dump($result);
            } catch (AwsException $e) {
                // output error message if fails
                error_log("error es ". $e->getMessage());
            } 

   }





    public function gps($imei,$ubicacion,$pila)
    {
      
        $gps=explode(',', $ubicacion);

        $latitud=$gps[0];
        $longitud=$gps[1];
        $velocidad=$gps[2];

        $name="...";



        /*$sid = 'ACfa9f8841463c6cf3778c5d76cb42be00';
        $token = 'ad17ead7faeb621196aed6a1e694bafa'; 

        $twilio = new Client($sid, $token);*/

        $llave=env('LLAVE_API_MAPS');

        date_default_timezone_set("America/Mexico_City");
         $mifecha= date('Y-m-d H:i:s'); 

         //$NuevaFecha = strtotime ( '-1 hour' , strtotime ($mifecha) ) ;
         $NuevaFecha = date ('F j, Y, g:i a' , $NuevaFecha);

        // $NuevaFecha = date ('Y-m-d H:i:s');


        //consultar estatus de vehículo

        $vehiclesEstatus=DB::select("SELECT * FROM vehiculos WHERE id_imei_android='$imei'");

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
                       "direccion"=>$direccion,"pila"=>$pila,"fecha"=>$NuevaFecha,
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
                                        'pila' =>$pila,

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

                                $this->enviamsgaws($texto,$phone);


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

                                $this->enviamsgaws($texto,$phone);

                                Mail::to($email)->send(new Alertas($name,$texto));


                                }

          
                }//fin de geocerca activa

       

             }//fin de if activo



            

          }

     

        
    }

    

}
