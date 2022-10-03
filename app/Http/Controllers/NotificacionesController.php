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
            $token = '55d0bd36b35f624de6c39f1a8914dd0f';
            $twilio = new Client($sid, $token);

          
            $message = $twilio->messages
                  ->create("whatsapp:+5215571136711", // to
                           [
                               "from" => "whatsapp:+14155238886",
                               "body" => "Holaaaaa esta es una prueba"
                           ]
                  );

print($message);





    }



}
