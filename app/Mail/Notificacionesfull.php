<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notificacionesfull extends Mailable
{
    use Queueable, SerializesModels;

    public $cuerpoMensaje;
    public $remitente;
    public $fechaCaducidad;
    public $totalArchivos;
    public $mensaje;
    public $size;
    public $link;
    public $contra;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cuerpoMensaje,$remitente,$fechaCaducidad,$totalArchivos,$mensaje,$size,$link,$contra)
    {
        $this->cuerpoMensaje = $cuerpoMensaje;
        $this->remitente = $remitente;
        $this->fechaCaducidad = $fechaCaducidad;
        $this->totalArchivos=$totalArchivos;
        $this->mensaje=$mensaje;
        $this->size=$size;
        $this->link=$link;
        $this->contra=$contra;
       

        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $fecha="de ".$this->remitente." por medio de fasttransfer ".date("d-m-Y H:i:s");
        return $this->from('noreply@fasttransfer.com.mx', "Fasttransfer")->subject("Has recibido archivos ".$fecha)->view('mails.email');
        //return $this->view('mails.notificaciones');
    }
}
