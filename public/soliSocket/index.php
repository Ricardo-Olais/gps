<?php

require __DIR__ . '/vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$email=$_REQUEST['email'];
$msg=$_REQUEST['msg'];
$client = new Client(new Version2X('https://localizaminave.com:3000'));
$client->initialize();
$client->emit('send-message', [
    'email' => $email,
    'msg'=>$msg,
    'latitud' => '-39.777777',
    'longitud'=> '100.883232'
]);
$client->close();

?>