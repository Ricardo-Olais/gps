<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Bienvenida extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $texto;
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario,$texto)
    {
        $this->usuario = $usuario;
        $this->texto=$texto;
         
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
  
        return $this->from('atn_clientes@localizaminave.com', "GPS Tracker")->subject("Bienvenido a Localizaminave.com")->view('mails.bienvenida');
        //return $this->view('mails.notificaciones');
    }
}
