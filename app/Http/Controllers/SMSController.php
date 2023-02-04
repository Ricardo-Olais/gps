<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;
use Aws\Route53\Route53Client;

class SMSController extends Controller
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
    public function envia()
    {
        
        $key="AKIAZIFGW5GSV2N7JU6U";
        $secret="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";


            $SnSclient= new SnsClient([
                   'region' => 'us-east-1',
                   'version' => '2010-03-31',
                    'credentials' => [
                            'key' => $key,
                            'secret' => $secret,
                    ]
            ]);

  
            $message = 'Alerta de Geocerca: Hola el vehículo Kia ha salido del área permitida, visita https://localizaminave.com/tracker';
            $phone = '+525586779297';


            $result = $SnSclient->publish([
                    'Message' => $message,
                    'PhoneNumber' => $phone,
                ]);


            //print_r($result);

            try {
                $result = $SnSclient->publish([
                    'Message' => $message,
                    'PhoneNumber' => $phone,
                ]);

               
                var_dump($result);
            } catch (AwsException $e) {
                // output error message if fails
                error_log("error es ". $e->getMessage());
            } 
    }
}
