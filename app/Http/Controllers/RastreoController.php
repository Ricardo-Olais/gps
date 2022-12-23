<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Mail; 
use Twilio\Rest\Client;
use App\Mail\Bienvenida;

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

    public function inicializasocket(){

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


               if($alerta==1){

                $mensajealerta="Alerta de Parking: El vehículo $alias está en movimiento, se encuentra en $direccion";
               
                }

                if($alerta2==1){

                $mensajealerta2="El vehículo $alias está fuera del área permitida, se encuentra en $direccion";

                }


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

            if(count($consultamosLicencias)>0){

                $estatus=1;
            }else{

                $estatus=0;
            }
           

            DB::table('vehiculos')->insert(
                  ['email' =>$email,
                  'conductor' =>$conductor, 
                  'alias_vehiculo'=>$alias,
                  'marca' =>"",
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

            $telefono="+52".$telefono;

            $consultamax=DB::select("SELECT max(id_vehiculo) as ultimo FROM vehiculos WHERE email='$email' AND id_imei_android=''");
           $ultimo= $consultamax[0]->ultimo;

              $texto="Te damos la bienvenida a localizaminave.con";

             // Mail::to($email)->send(new Bienvenida($conductor,$texto));

           
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
                                  ->update(array('fija'=>$_REQUEST['estatus'],"alerta2"=>0,"direccion_fija"=>""));
            }else{

                 $dir=$_REQUEST['direccionfija'];

                 DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                                  ->update(array('fija'=>$_REQUEST['estatus'],"alerta2"=>0, "direccion_fija"=>$dir));
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
                                  ->update(array('activaGeocerca'=>$_REQUEST['estatus'],'alerta'=>0,
                                    "address_geocerca"=>"",
                                    'alerta'=>0,
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
                                        'alerta'=>0,"address_geocerca"=>$direcciongeocerca,
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
          $subscripcion=$_SESSION["subscripcion"];


          $fecha_actual = date("Y-m-d");
          $fechaFin=date("Y-m-d",strtotime($fecha_actual."+ 30 days")); 

          //sumanos 30 días


          DB::table('vehiculos')->where('email',$email)->where('id_vehiculo',$id)
                                    ->update( array(
                                             'estatus' =>2,
                                             'subscripcion'=>$subscripcion,
                                             'Fecha_inicio'=>date("Y-m-d H:i:s"),
                                             'Fecha_termino'=>null
                                             
                                             ));

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
                                "long"=>$value->longitud
                               
                            );
                }

        }else{

            $datos[]=array(
                               
                                "alias_vehiculo"=>"",
                                "direccion"=>"",
                                "fecha"=>"",
                                "lat"=>"",
                                "long"=>""
                               
                            );

        }

        /* $result = json_encode($datos);

         return $result;*/


        return view('historico', ['datos' => $datos]);
    }

      public function facturas(){

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

        /* $result = json_encode($datos);

         return $result;*/


        return view('facturas', ['datos' => $datos]);
    }


         


}
