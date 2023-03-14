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
    


        $key=env("KEY_AWS_SNS");
        $secret=env("SECRET_AWS_SNS");


            $SnSclient= new SnsClient([
                   'region' => 'us-east-1',
                   'version' => '2010-03-31',
                    'credentials' => [
                            'key' => $key,
                            'secret' => $secret,
                    ],
                 'http' => ['verify' => false]
            ]);

  
            $message = 'Hola';
            $phone = '+525586779297';
         
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
