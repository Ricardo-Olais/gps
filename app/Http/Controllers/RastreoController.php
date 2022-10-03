<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
                    "alerta2"=>""


                );

        }

         $result = json_encode($datos);

         return $result;


    }

    public function vehiculosasignados(){

        //$email=$_REQUEST['email'];

       $email=Auth::user()->email;


        $gps = DB::table('vehiculos')->where('email',$email)->get()->where('estatus',1);
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
            
                       $datos[]=array(
                                "id"=>$value->id_vehiculo, 
                                "id_imei_android"=>$value->id_imei_android, 
                                "alias_vehiculo"=>$value->alias_vehiculo,
                                "conductor"=>$value->conductor,
                                "geocerca"=>$value->geocerca,
                                "placas"=>$value->placa,
                                "estatus"=>$value->estatus,
                                "colorestatus"=>$estatusColor,
                                "email"=>$email


                            );
                }

        }

        /* $result = json_encode($datos);

         return $result;*/


        return view('vehiculos', ['datos' => $datos]);
    }

    public function actualizanumero(){

          DB::table('vehiculos')->where('id_vehiculo', $_REQUEST['id'])
                            ->update( array(
                            'id_imei_android'=>$_REQUEST['android']));

        $datos['rows']=array("valida"=>"true");

              return json_encode($datos);

    }

    public function guardavehiculo(){


        // $email = Auth::user()->email;

          //$email ="r.hernandez@lidcorp.mx";

          $email=Auth::user()->email;
 
           foreach($_POST as $nombre_campo => $valor)
            { 
                $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
                eval($asignacion); 
                
            }


            date_default_timezone_set('America/Mexico_City');
            $fecha=date("Y-m-d H:i:s");
           

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
                  'estatus'=>0,
                  'subscripcion'=>'',
                  'geocerca'=>$geocerca,
                  'telefono'=>"+52".$telefono,
                  'address_geocerca'=>''

                 ] );

            $telefono="+52".$telefono;

           
            $mensaje="Bienvenido a localiza mi nave, tu dispositivo $alias se agregó a tu cuenta de manera exitosa, descarga la app localizaminave y scanea el código QR generado para vincular el sistema gps a nuestros servidores.";


            $this->whatsapp($mensaje,$telefono);

            return response()->json(['valida' =>"true"]);

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

            DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                                  ->update(array('fija'=>$_REQUEST['estatus'],"alerta2"=>0));

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

            DB::table('vehiculos')->where('id_imei_android', $_REQUEST['numero'])
                                  ->update(array('activaGeocerca'=>$_REQUEST['estatus'],'alerta'=>0));

              $datos['rows']=array("valida"=>"true");

              return json_encode($datos);
         }



         


}
