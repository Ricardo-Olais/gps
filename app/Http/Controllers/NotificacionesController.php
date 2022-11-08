<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class NotificacionesController extends Controller
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
    public function whatsapp(){


            $sid = 'ACfa9f8841463c6cf3778c5d76cb42be00';
            $token = 'de15674a3cd4d98c54d6b6bb93d1a7b8';
            $twilio = new Client($sid, $token);

          
            $message = $twilio->messages
                                      ->create("whatsapp:+5215586779297", // to
                                               [
                                                   "from" => "whatsapp:+14155238886",
                                                   "body" => "Hola esta es una prueba"
                                               ]);

print($message);





    }



}
