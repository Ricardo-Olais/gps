<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Mail; 
use Twilio\Rest\Client;
use App\Mail\Bienvenida;
use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;

class RastreoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

 public function pruebacorreo($distancia,$alias){

    $email="developerzend.web@gmail.com";
    $name="---";
    //$distancia=$_REQUEST['distancia'];

   $texto="ALERTA el dispositivo $alias está fuera de la geocerca establecida, se encuentra a una distancia de $distancia";

    Mail::to($email)->send(new Bienvenida($name,$texto));

 }



    public function inicializasocket(){

         $imei=$_REQUEST['imei'];
        // $llave=env('LLAVE_API_MAPS');

         //consultamos la llave de google maps. google_maps

        $llaveGoogle=DB::select("SELECT llave_maps FROM google_maps WHERE status=1");

        $llave=$llaveGoogle[0]->llave_maps;

        //consultamos los datos 
        $vehiclesEstatus=DB::select("SELECT * FROM v_gps WHERE id_imei_android='$imei'");

          if(count($vehiclesEstatus)>0){

             $vehiclesGps=DB::select("SELECT velocidad FROM gpslocations WHERE numero='$imei'");

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
             $velocidad=number_format((($vehiclesGps[0]->velocidad)*3.6), 2, '.', "");

            // number_format((($vehiclesGps[0]->velocidad)*3.6), 2, '.', "");

             $mensajealerta="";
             $mensajealerta2="";


         

              $geocodeFrom = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitud,$longitud&key=$llave");

              $outputFrom = json_decode($geocodeFrom);
              @$direccion=@$outputFrom->results[0]->formatted_address;


               if($alerta==1){

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


                //$urlT=htmlspecialchars_decode("http://api.mymemory.translated.net/get?q=$textt&langpair=en|es");
                //$json = file_get_contents($urlT); 
                        
               // $obj = json_decode($json);

               // $clima= $obj->responseData->translatedText;
                         $tempe=$temperatura." °C";



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
                        "geocerca"=>$geocerca,
                        "velocidad"=>$velocidad,
                        "clima"=>$clima,
                        "temperatura"=>$tempe

                   );


       
              $fields_string = http_build_query($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://localizaminave.com/soliSocket/ubicaini.php?".$fields_string);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

               
                    $string = curl_exec($ch);


            }



    }


    public function actualizageocerca(){

        DB::table('vehiculos')->where('id_imei_android', $_REQUEST['imei'])
                            ->update( array(
                            'geocerca'=>$_REQUEST['geocerca']));

        $datos['rows']=array("valida"=>"true");

        return json_encode($datos);

    }




    public function coordenadas(){

         $numero=$_REQUEST['numero'];


        $gps = DB::table('V_gps')->where('numero',$numero)->get();
        date_default_timezone_set('America/Mexico_City');

        //$datos=array();
   
        if(count($gps)>0){
        $datos['rows']=array(
                    "latitud"=>$gps[0]->latitud,
                    "longitud"=>$gps[0]->longitud,
                    "conductor"=>$gps[0]->conductor,
                    "alias"=>$gps[0]->alias_vehiculo,
                    "alerta"=>$gps[0]->alerta,
                    "telefono"=>$gps[0]->telefono,
                    "fija"=>$gps[0]->fija,
                    "notificaciones"=>$gps[0]->notificaciones,
                    "activaGeocerca"=>$gps[0]->activaGeocerca,
                    "geocerca"=>$gps[0]->geocerca,
                    "alerta2"=>$gps[0]->alerta2,
                    "pila"=>$gps[0]->pila,
                    "fecha"=>$gps[0]->fecha_gps


                );

        }else{
            $datos['rows']=array(
                    "latitud"=>"",
                    "longitud"=>"",
                    "conductor"=>"",
                    "alias"=>"",
                    "alerta"=>0,
                    "telefono"=>"",
                    "fija"=>"",
                    "notificaciones"=>"",
                    "activaGeocerca"=>"",
                    "geocerca"=>"",
                    "alerta2"=>"",
                    "pila"=>"",
                    "fecha"=>""


                );

        }

         $result = json_encode($datos);

         return $result;


    }

    public function vehiculosasignados(){

        //$email=$_REQUEST['email'];

       $email=Auth::user()->email;


        $gps = DB::table('vehiculos')->where('email',$email)->get()->whereIn('estatus', [2, 5]);
        date_default_timezone_set('America/Mexico_City');

         $datos=array();

   
        if(count($gps)>0){

             foreach ($gps as $key => $value) {
            
                       $datos['rows'][]=array(
                                "id_imei_android"=>$value->id_imei_android, 
                                "alias_vehiculo"=>$value->alias_vehiculo);
                }

        }

         $result = json_encode($datos);

         return $result;


    }

    public function gridvehiculos(){

       // $email="r.hernandez@lidcorp.mx";

        $email=Auth::user()->email;


        $gps = DB::table('vehiculos')->where('email',$email)->get();
        date_default_timezone_set('America/Mexico_City');

     

       $datos=array();   
        if(count($gps)>0){

             foreach ($gps as $key => $value) {




                $estatusColor=($value->estatus==0) ? "<span class='badge pink lighten-5 pink-text text-accent-2'>" :'';

                      $fields=array(

                       "subscripcion"=>$value->subscripcion
                      
                   );
       
                   $fields_string = http_build_query($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "http://localizaminave.com:8081/gps/public/consultaSubscripcion.php?".$fields_string);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

                    
                    $string = curl_exec($ch);

                    $res=json_decode($string);

                    $activo='gratis';

                    if(isset($res->estatus)){

                         $activo=$res->estatus;

                    }

                    $fechaSistema=date("Y-m-d");

                    $fechaExpira= new DateTime($value->Fecha_termino);
                    $fechaSistemaPro= new DateTime($fechaSistema);

                    $valorExpira=0;

                   // print_r($fechaExpira);

                    //sub_1M3TmRK9KYNU2QdI2clpDEnK
             
                    if($fechaSistemaPro > $fechaExpira&& $activo!="active"){

                        $valorExpira=1;

                 DB::table('vehiculos')->where('id_vehiculo', $value->id_vehiculo)->update( array('estatus'=>1));

                        //actualizamos el valor a estatus 1 de pagar
                    }

                    if($fechaSistemaPro > $fechaExpira && $value->subscripcion=="gratis"){

                        $valorExpira=1;


                DB::table('vehiculos')->where('id_vehiculo', $value->id_vehiculo)->update( array('estatus'=>1));

                        //actualizamos el valor a estatus 1 de pagar
                    }

                    $diff = $fechaSistemaPro->diff($fechaExpira);

                   //print_r($diff);


                   // echo $dias=@$diff->days; //validación de 7 para usuario normal
                   
                    $activo="active"; //se agrega variable para filtrar a gratis
                    //$valorExpira="Para siempre";//se agrega variable para filtrar a gratis
               
                    $datos[]=array(
                                "id"=>$value->id_vehiculo, 
                                "id_imei_android"=>$value->id_imei_android, 
                                "alias_vehiculo"=>$value->alias_vehiculo,
                                "conductor"=>$value->conductor,
                                "geocerca"=>$value->geocerca,
                                "placas"=>$value->placa,
                                "estatus"=>$value->estatus,
                                "colorestatus"=>$estatusColor,
                                "email"=>$email,
                                "subscripcion"=>$value->subscripcion,
                                "Fecha_termino"=>$value->Fecha_termino,
                                "activo"=>$activo,
                                "valorExpira"=>$valorExpira


                            );
                }

        }

      

        /* $result = json_encode($datos);

         return $result;*/


        return view('vehiculos', ['datos' => $datos]);
    }


      public function auxgridvehiculos(){

       // $email="r.hernandez@lidcorp.mx";

        $email=Auth::user()->email;


        $gps = DB::table('vehiculos')->where('email',$email)->get();
        date_default_timezone_set('America/Mexico_City');

     

       $datos=array();   
        if(count($gps)>0){

             foreach ($gps as $key => $value) {




                $estatusColor=($value->estatus==0) ? "<span class='badge pink lighten-5 pink-text text-accent-2'>" :'';

                      $fields=array(

                       "subscripcion"=>$value->subscripcion
                      
                   );
       
                   $fields_string = http_build_query($fields);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "http://localizaminave.com:8081/gps/public/consultaSubscripcion.php?".$fields_string);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

                    
                    $string = curl_exec($ch);

                    $res=json_decode($string);

                    $activo='gratis';

                    if(isset($res->estatus)){

                         $activo=$res->estatus;

                    }

                    $fechaSistema=date("Y-m-d");

                    $fechaExpira= new DateTime($value->Fecha_termino);
                    $fechaSistemaPro= new DateTime($fechaSistema);

                    $valorExpira=0;

                   // print_r($fechaExpira);

                    //sub_1M3TmRK9KYNU2QdI2clpDEnK
             
                    if($fechaSistemaPro > $fechaExpira&& $activo!="active"){

                        $valorExpira=1;

                 DB::table('vehiculos')->where('id_vehiculo', $value->id_vehiculo)->update( array('estatus'=>1));

                        //actualizamos el valor a estatus 1 de pagar
                    }

                    if($fechaSistemaPro > $fechaExpira && $value->subscripcion=="gratis"){

                        $valorExpira=1;


                DB::table('vehiculos')->where('id_vehiculo', $value->id_vehiculo)->update( array('estatus'=>1));

                        //actualizamos el valor a estatus 1 de pagar
                    }

              
                }

        }

    }

     public function consultavehi(){

       // $email="r.hernandez@lidcorp.mx";

        $email=Auth::user()->email;
        $id=$_REQUEST['id'];


        $gps = DB::table('vehiculos')->where('id_vehiculo',$id)->get();
        date_default_timezone_set('America/Mexico_City');

     

       $datos=array();   
        if(count($gps)>0){

             foreach ($gps as $key => $value) {
                       $datos[]=array(
                                "id"=>$value->id_vehiculo, 
                                "tipo"=>$value->tipo,
                                "alias_vehiculo"=>$value->alias_vehiculo,
                                "conductor"=>$value->conductor,
                                "geocerca"=>$value->geocerca,
                                "placas"=>$value->placa,
                                "telefono"=>$value->telefono,
                                "marca"=>$value->marca
                               
                              

                            );

        }

       }

        $result = json_encode($datos);

         return $result;

    }

    public function actualizanumero(){

          DB::table('vehiculos')->where('id_vehiculo', $_REQUEST['id'])
                            ->update( array(
                            'id_imei_android'=>$_REQUEST['android']));

        $datos['rows']=array("valida"=>"true");

              return json_encode($datos);

    }

     public function enviamsgaws($message,$phone){

      

        $key=env('KEY_AWS_SNS');
        $secret=env('SECRET_AWS_SNS');

        $SnSclient= new SnsClient([
                   'region' => 'us-east-1',
                   'version' => '2010-03-31',
                    'credentials' => [
                            'key' => $key,
                            'secret' => $secret,
                    ],
                    'http' => ['verify' => false]
            ]);

  
            
            $result = $SnSclient->publish([
                    'Message' => $message,
                    'PhoneNumber' => $phone,
                ]);

              try {
                $result = $SnSclient->publish([
                    'Message' => $message,
                    'PhoneNumber' => $phone,
                ]);

               
                //var_dump($result);
            } catch (AwsException $e) {
                // output error message if fails
                error_log("error es ". $e->getMessage());
            } 
   


   }


    public function guardavehiculo(){


           $sid = 'ACfa9f8841463c6cf3778c5d76cb42be00';
           $token = 'ad17ead7faeb621196aed6a1e694bafa';

           $twilio = new Client($sid, $token);

          $email=Auth::user()->email;
 
           foreach($_POST as $nombre_campo => $valor)
            { 
                $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
                eval($asignacion); 
                
            }


            date_default_timezone_set('America/Mexico_City');
            $fecha=date("Y-m-d H:i:s");

            $consultamosLicencias=DB::select("SELECT * FROM vehiculos WHERE email='$email' AND estatus in(5,2)");

            //consultar si existe licencia gratis

            $LicenciasInicial=DB::select("SELECT * FROM licencias WHERE email='$email' AND status=1");




            /*if(count($consultamosLicencias)>0){

                $estatus=1;
            }else{

                if(count($LicenciasInicial)>0){

                    $estatus=1;
                }else{

                    $estatus=0;
                }

                
            }*/

            $estatus=2;
           

           if(isset($id_vehi) && $id_vehi!=""){

           // echo "el telefono es: ".$telefono;

              DB::table('vehiculos')->where('id_vehiculo',$id_vehi)
                            ->update( array(

                             'conductor' =>$conductor, 
                              'alias_vehiculo'=>$alias,
                              'marca' =>$marca,
                              'placa' =>$placas,
                              'tipo' =>$tipovehiculo,
                             // 'fecha'=>$fecha,
                             // 'estatus'=>$estatus,
                              'geocerca'=>$geocerca,
                              'telefono'=>$telefono
                              


                        ));


           }else{

            DB::table('vehiculos')->insert(
                  ['email' =>$email,
                  'conductor' =>$conductor, 
                  'alias_vehiculo'=>$alias,
                  'marca' =>$marca,
                  'modelo' =>"",
                  'placa' =>$placas,
                  'tipo' =>$tipovehiculo,
                  'id_imei_android'=>"",
                  'fecha'=>$fecha,
                  'estatus'=>$estatus,
                  'subscripcion'=>'',
                  'geocerca'=>$geocerca,
                  'telefono'=>"+52".$telefono,
                  'address_geocerca'=>'',
                  'alerta'=>0,
                  "alerta2"=>0,
                  "fija"=>0,
                  "activaGeocerca"=>0

                 ] );

            



           // $telefono="+52".$telefono;


           }

           $consultamax=DB::select("SELECT max(id_vehiculo) as ultimo FROM vehiculos WHERE email='$email' AND id_imei_android=''");
           $ultimo= $consultamax[0]->ultimo;

           $texto="Te damos la bienvenida a localizaminave.con";


           $message = "Tu dispositivo $alias se agregó a tu cuenta de manera exitosa, escanea el código QR generado, visita https://localizaminave.com/dispositivos";

           $phone = '+525586779297';

          //$this->enviamsgaws($message,$phone);

         //  Mail::to($email)->send(new  Alertas($conductor,$message));

           
            /*$mensaje="Bienvenido a localiza mi nave, tu dispositivo $alias se agregó a tu cuenta de manera exitosa, descarga la app localizaminave y scanea el código QR generado para vincular el sistema gps a nuestros servidores.";


            $this->whatsapp($mensaje,$telefono);*/

            /* $message = $twilio->messages
                                      ->create("whatsapp:+5215586779297", // to
                                               [
                                                   "from" => "whatsapp:+14155238886",
                                                   "body" => "Bienvenido a localiza mi nave, tu dispositivo $alias se agregó a tu cuenta de manera exitosa, descarga la app localizaminave y scanea el código QR generado para vincular el sistema gps a nuestros servidores https://localizaminave.com."
                                               ]);*/

            return response()->json(['ultimo' =>$ultimo]);

    }

    public function whatsapp($mensaje,$telefono){

            $curl = curl_init();



           // $mensaje="Hola tu vehículo se encuentra fuera de la geocerca establecida, consulta su estatus en localizaminave.com.mx";

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.ultramsg.com/instance16721/messages/chat",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "token=jzh4b19qtnl4h3l9&to=$telefono&body=$mensaje&priority=1&referenceId=",
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            /*if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }*/

         }



    public function whatsappfront(){

            $curl = curl_init();

            $mensaje=$_REQUEST['mensaje'];

            $telefono=$_REQUEST['telefono'];

           // $mensaje="Hola tu vehículo se encuentra fuera de la geocerca establecida, consulta su estatus en localizaminave.com.mx";

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.ultramsg.com/instance16721/messages/chat",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "token=jzh4b19qtnl4h3l9&to=$telefono&body=$mensaje&priority=1&referenceId=",
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            /*if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }*/

         }

         public function alerta(){


            DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                            ->update( array(
                            'alerta'=>$_REQUEST['estatus']));

                    $datos['rows']=array("valida"=>"true");

            return json_encode($datos);

         }

         public function guardafijo(){

            if($_REQUEST['estatus']==0){

                 DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                                  ->update(array('fija'=>$_REQUEST['estatus'],"alerta"=>0,"direccion_fija"=>""));
            }else{

                 $dir=$_REQUEST['direccionfija'];

                 DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                                  ->update(array('fija'=>$_REQUEST['estatus'],"alerta"=>0, "direccion_fija"=>$dir));
            }

           

              $datos['rows']=array("valida"=>"true");

              return json_encode($datos);
         }

        public function guardafijonotificacion(){

            DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                                  ->update(array('notificaciones'=>$_REQUEST['estatus']));

              $datos['rows']=array("valida"=>"true");

              return json_encode($datos);
         }

        public function activageocerca(){

            $llave=env('LLAVE_API_MAPS');

            //direcciongeocerca
             if($_REQUEST['estatus']==0){
                

            DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                                  ->update(array('activaGeocerca'=>$_REQUEST['estatus'],
                                    "address_geocerca"=>"",
                                    'alerta2'=>0,
                                    'latitud_geocerca'=>"",
                                    'longitud_geocerca'=>""
                                ));

                }else{


             $direcciongeocerca=$_REQUEST['direcciongeocerca'];

             //obtener coordenadas de la dirección

             $formattedAddrFrom = str_replace(' ','+',$direcciongeocerca);
             $geocodeFrom = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$formattedAddrFrom&sensor=false&key=$llave");
             $outputFrom = json_decode($geocodeFrom);

             @$latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
             @$longitudeFrom = $outputFrom->results[0]->geometry->location->lng;




             DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                                  ->update(
                                    array('activaGeocerca'=>$_REQUEST['estatus'],
                                        'alerta2'=>0,"address_geocerca"=>$direcciongeocerca,
                                        'latitud_geocerca'=>$latitudeFrom,
                                        'longitud_geocerca'=>$longitudeFrom
                                    ));

                }

              $datos['rows']=array("valida"=>"true");

              return json_encode($datos);
         }

         public function actualizasubscripcion(){

          session_start(); 

          $user = Auth::user();

          $id=$_SESSION["id"];
          date_default_timezone_set('America/Mexico_City');

          $email=$user->email;
          $name=$user->name;
          $subscripcion=$_SESSION["subscripcion"];


          $fecha_actual = date("Y-m-d");
          $fechaFin=date("Y-m-d",strtotime($fecha_actual."+ 30 days")); 

          //sumanos 30 días


         //enviamos correo notificando la subscripción.

        $consultamax=DB::select("SELECT count(id_vehiculo) as ultimo FROM vehiculos WHERE email='$email' AND subscripcion='$subscripcion'");
         $ultimo= $consultamax[0]->ultimo;

        if($ultimo==0 && $subscripcion!=""){

         $texto="La subscripción se ha activado de manera exitósa, gracias por confiar en localizaminave.com. Conóce en donde se encuentran tus seres queridos, localizador familiar preciso y seguro, encuentra a sus seres queridos y sepa dónde están. Ahora es el mejor momento para garantizar la seguridad de su familia. Podrás localizarlos en tiempo real, compara nuestra plataforma. Verifique el estatus de sus vehículos, conozca si se encuentran con o sin movimiento, detecte las alertas de parking, alertas de geocercas. Comparte la ubicación de tus vehículos con las personas que desees, sin tiempo limite, la ubicación se comparte en tiempo real.";


         $message = "La subscripción se ha activado de manera exitósa, gracias por confiar en localizaminave.com, visita https://localizaminave.com";

         $phone = '+525586779297';

         $this->enviamsgaws($message,$phone);


         Mail::to($email)->send(new Bienvenida($name,$texto));

         DB::table('vehiculos')->where('email',$email)->where('id_vehiculo',$id)
                                    ->update( array(
                                             'estatus' =>2,
                                             'subscripcion'=>$subscripcion,
                                             'Fecha_inicio'=>date("Y-m-d H:i:s"),
                                             'Fecha_termino'=>null
                                             
                                             ));

         }

        
     

}



         public function licenciagratis(){


          $id=$_REQUEST["id"];

          $user = Auth::user();
          $email=$user->email;

          date_default_timezone_set('America/Mexico_City');

          $fecha_actual = date("Y-m-d");
          $fechaFin=date("Y-m-d",strtotime($fecha_actual."+ 30 days")); 
       
          DB::table('vehiculos')->where('email',$email)->where('id_vehiculo',$id)
                                ->update( 
                                    array(
                                        'estatus' =>5,
                                        'subscripcion'=>'Gratis',
                                        'Fecha_inicio'=>date("Y-m-d H:i:s"),
                                        'Fecha_termino'=>$fechaFin


                              
                                         ));

          //licencias gratis

          DB::table('licencias')->insert(
                  ['email' =>$email,
                   'id_vehiculo' =>$id, 
                   'status'=>1
               ]);



          $datos['rows']=array("valida"=>"true");

              return json_encode($datos);

         }

         public function eliminavehiculogps(){

             $id=$_REQUEST['id'];
             $user = Auth::user();
             $email=$user->email;

             $delete=DB::select("DELETE FROM vehiculos WHERE id_vehiculo=$id and email='$email'");


             $datos['rows']=array("valida"=>"true");

              return json_encode($datos);

         }


       public function historico(){

       // $email="r.hernandez@lidcorp.mx";

        $email=Auth::user()->email;
        $imei=$_REQUEST['imei'];


        $gps = DB::table('v_historico')->where('sesion',$email)->where('numero',$imei)->limit(100)->get();
        date_default_timezone_set('America/Mexico_City');

     

       $datos=array();   
        if(count($gps)>0){

             foreach ($gps as $key => $value) {

               
            
                       $datos[]=array(
                               
                                "alias_vehiculo"=>$value->alias_vehiculo,
                                "direccion"=>$value->direccion,
                                "fecha"=>$value->fecha_gps,
                                "lat"=>$value->latitud,
                                "long"=>$value->longitud,
                                "velocidad"=>$value->velocidad
                               
                            );
                }

        }else{

            $datos[]=array(
                               
                                "alias_vehiculo"=>"",
                                "direccion"=>"",
                                "fecha"=>"",
                                "lat"=>"",
                                "long"=>"",
                                "velocidad"=>""
                               
                            );

        }

        /* $result = json_encode($datos);

         return $result;*/


        return view('historico', ['datos' => $datos]);
    }

      public function facturas(){

       // $email="r.hernandez@lidcorp.mx";

        $email=Auth::user()->email;
        $gps = DB::table('vehiculos')->where('email',$email)->where('estatus',2)->get();
        date_default_timezone_set('America/Mexico_City');
        $datos=array();   
        if(count($gps)>0){

             foreach ($gps as $key => $value) {
                         $datos[]=array(
                               
                                "id_vehiculo"=>$value->id_vehiculo,
                                 "conductor"=>$value->conductor,
                                 "estatus"=>$value->estatus,
                                 "subscripcion"=>$value->subscripcion,
                                 "alias"=>$value->alias_vehiculo
                              
                               
                            );
                }

        }

        return view('facturas', ['datos' => $datos]);
    }



        public function micuenta(){

               // $email="r.hernandez@lidcorp.mx";

                $email=Auth::user()->email;
                $gps = DB::table('vehiculos')->where('email',$email)->get();
                date_default_timezone_set('America/Mexico_City');
                $datos=array();   
                if(count($gps)>0){

                     foreach ($gps as $key => $value) {
                                 $datos[]=array(
                                       
                                        "id_vehiculo"=>$value->id_vehiculo,
                                         "conductor"=>$value->conductor,
                                         "estatus"=>$value->estatus,
                                         "subscripcion"=>$value->subscripcion,
                                         "alias"=>$value->alias_vehiculo
                                      
                                       
                                    );
                        }

                }

                return view('micuenta', ['datos' => $datos]);
            }

         


}
