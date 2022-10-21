<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

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

    public function recibeqr($datos){

      
        $ext=explode('-', $datos);

        $id=$ext[1];
        $email=$ext[0];
        $imei=$ext[2];

        DB::table('vehiculos')->where('id_vehiculo', $id)->where('email', $email)->update(array('id_imei_android' =>$imei));


    }



    public function gps($imei,$ubicacion,$pila)
    {
      
        $gps=explode(',', $ubicacion);

        $latitud=$gps[0];
        $longitud=$gps[1];
        $velocidad=$gps[2];


        $sid = 'ACfa9f8841463c6cf3778c5d76cb42be00';
        $token = '55d0bd36b35f624de6c39f1a8914dd0f';
        $twilio = new Client($sid, $token);

        $llave=env('LLAVE_API_MAPS');

        date_default_timezone_set("America/Mexico_City");


        //consultar estatus de vehículo

        $vehiclesEstatus=DB::select("SELECT * FROM vehiculos WHERE id_imei_android='$imei'");

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


              $geocodeFrom = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitud,$longitud&key=$llave");

              $outputFrom = json_decode($geocodeFrom);
              $direccion=$outputFrom->results[0]->formatted_address;

             



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
                                        'fecha_gps' =>date("Y-m-d H:i:s"),
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
                                        'fecha_gps'=>date("Y-m-d H:i:s"),
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
                                        'fecha_gps'=>date("Y-m-d H:i:s"),
                                        'pila'=>$pila
                                        

                                      ]);
                     }



                //####################################### Validación de alertas #####################################################
                    if($fija==1){

                  
                        //extraer la dirección fija, compararla con la nueva direccióm ==> obtener la distancia de ambas si es mayor a 30 metros encender alarma.=1

                        //consultamos campo de dirección fija si no tiene valor, actualizarlo por variable dirección
                        if($direccion_fija==""){
                         //actualizamos el registro 
                         DB::table('vehiculos')->where('id_imei_android', $imei)->update(array('direccion_fija' =>$direccion));
                                    
                        }

                    
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

                       if($km>.05){ //mayor a 50 metros, activar alerta enviar notificación

                    
                            if($alerta==0){

          
                                /*$message = $twilio->messages
                                      ->create("whatsapp:+5215571136711", // to
                                               [
                                                   "from" => "whatsapp:+14155238886",
                                                   "body" => "Alerta de Parking: El vehículo $alias está en movimiento, se encuentra en $direccion distancia de $km km., consulta su estatus en localizaminave.com.mx/tracker"
                                               ]);*/
                                      
                               // print_r($message); 
                              
                                DB::table('vehiculos')->where('id_imei_android', $imei)->update(array('alerta' =>1));


                            }

                       }


                    }


                    }else{

                        //borrar campo dirección fija de tabla vehiculos

                         if($direccion_fija!=""){
                             //actualizamos el registro 
                             DB::table('vehiculos')->where('id_imei_android', $imei)->update(array('direccion_fija' =>"",'alerta'=>0));
                                    
                          }
                    }




                //############## valida la geocerca activa ############################################################

                    if($activaGeocerca==1 && $geocerca>0){


                        if($address_geocerca==""){
                         //actualizamos el registro 
                         DB::table('vehiculos')->where('id_imei_android', $imei)->update(array('address_geocerca' =>$direccion));
                                    
                        }

                        if($address_geocerca!=""){

                            //Change address format
                        $formattedAddrFrom = str_replace(' ','+',$address_geocerca);
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

                        if($km>$geocerca){

                            if($alerta2==0){

                               /* $message = $twilio->messages
                                      ->create("whatsapp:+5215571136711", // to
                                               [
                                                   "from" => "whatsapp:+14155238886",
                                                   "body" => "Alerta de Geocerca: El vehículo $alias está fuera la geocerca establecida de $geocerca km., se encuentra en $direccion distancia de $km km., consulta su estatus en localizaminave.com.mx/tracker"
                                               ]);*/
                                      
                               // print_r($message);    

                                DB::table('vehiculos')->where('id_imei_android', $imei)->update(array('alerta2' =>1));

                            }


                        }





                        }

          
                }//fin de geocerca activa

                else{

                        //borrar campo dirección fija de tabla vehiculos

                         if($address_geocerca!=""){
                             //actualizamos el registro 
                             DB::table('vehiculos')->where('id_imei_android', $imei)->update(array('address_geocerca' =>"",'alerta2'=>0));
                                    
                          }
                    }






             }//fin de if activo



            

          }

     

        
    }

    

}
