<?php
$host = '192.168.0.12';
$port = '3001';
/*$path = 'C:/xampp/htdocs/gps/public/notificacioness/';
$transport = 'tlsv1.2';
$ssl = ['ssl' => [
          'local_cert'  => $path . 'ab74f2e62ff8f417.PEM',       // SSL Certificate
          'local_pk'    => $path . 'llaveRicardo.PEM',    // SSL Keyfile
          'disable_compression' => true,             // TLS compression attack vulnerability
          'verify_peer'         => false,            // Set this to true if acting as an SSL client
          'ssltransport' => $transport,              // Transport Methods such as 'tlsv1.1', tlsv1.2' 
        ] ];
$ssl_context = stream_context_create($ssl);*/

 $server = stream_socket_server("tcp://{$host}:{$port}", $errno, $errorMessage,STREAM_SERVER_BIND|STREAM_SERVER_LISTEN);
//$server = stream_socket_server($transport . '://' . $host . ':' . $port, $errno, $errstr, STREAM_SERVER_BIND|STREAM_SERVER_LISTEN, $ssl_context);

echo "Inicia servicio en el puerto 3001\n";

if (!$server) {  die("$errstr ($errno)"); } 
$clients = array($server);
$write  = NULL;
$except = NULL;
while (true) {
  $changed = $clients;
  stream_select($changed, $write, $except, 10);
  if (in_array($server, $changed)) {
    $client = @stream_socket_accept($server);

   // echo $client;

    if (!$client){'echo nada';}


    if (!$client){ continue; }
    $clients[] = $client;
    $ip = stream_socket_get_name( $client, true );
    echo "Nuevo cliente conectado desde $ip\n";
    
    stream_set_blocking($client, true);
   // $headers = socket_read($client, 1024);
    $headers = fread($client,2048);
    handshake($client, $headers, $host, $port);


    stream_set_blocking($client, false);

    send_message($clients, mask($ip . ' connectado'));
    $found_socket = array_search($server, $changed);
    unset($changed[$found_socket]);     
  }
  foreach ($changed as $changed_socket) {
    $ip = stream_socket_get_name( $changed_socket, true );
   // $buffer = stream_get_contents($changed_socket,1024);

    $buffer = fread($changed_socket, 1024);

    //$buffer = @socket_read($changed_socket,2048,PHP_NORMAL_READ);

  //  @socket_recv($changed_socket, $buffer, 2048,PHP_NORMAL_READ);



    //echo "buffer: ".$buffer."\n";

    //$bytes = @socket_recv($changed_socket, $buffer, 2048,PHP_NORMAL_READ);

        if ($buffer == false) {
      echo "Cliente desconectado desde $ip\n";
      @fclose($changed_socket);
            $found_socket = array_search($changed_socket, $clients);
            unset($clients[$found_socket]);
        }


    $unmasked = unmask($buffer);

    //echo "unmasked :".$unmasked."\n";


    if ($unmasked != "") { echo "\nReceived a Message from $ip:\n\"$unmasked\" \n"; }

    $response = mask($unmasked);

     echo "Data: ".$response."\n";


    //send_message($clients, $response);
  }
}
fclose($server);

function unmask($text) {
    $length = @ord($text[1]) & 127;
    if($length == 126) {    
        $masks = substr($text, 4, 4);    
        $data = substr($text, 8); }
    elseif($length == 127) {    
        $masks = substr($text, 10, 4); 
        $data = substr($text, 14); }
    else { 
        $masks = substr($text, 2, 4); 
        $data = substr($text, 6); }
    $text = "";
    for ($i = 0; $i < strlen($data); ++$i) { 
        $text .= $data[$i] ^ $masks[$i % 4];    
    }
    return $text;
}
function mask($text) {
    $b1 = 0x80 | (0x1 & 0x0f);
    $length = strlen($text);
    if($length <= 125)
        $header = pack('CC', $b1, $length);
    elseif($length > 125 && $length < 65536)
        $header = pack('CCn', $b1, 126, $length);
    elseif($length >= 65536)
        $header = pack('CCNN', $b1, 127, $length);
    return $header.$text;
}
function handshake($client, $rcvd, $host, $port){
    $headers = array();
    $lines = preg_split("/\r\n/", $rcvd);
    foreach($lines as $line)
    {
        $line = rtrim($line);
        if(preg_match('/\A(\S+): (.*)\z/', $line, $matches)){
            $headers[$matches[1]] = $matches[2];
        }
    }
    

    $secKey = @$headers['Sec-WebSocket-Key'];
    $secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));

    //$secAccept='Kfh9QIsMVZcl6xEPYxPHzW8SZ8w=';

   


   //  $secAccept = base64_encode(pack('H*', sha1($secKey .'258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
    //hand shaking header
    $upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
    "Upgrade: websocket\r\n" .
    "Connection: Upgrade\r\n" .
    "WebSocket-Origin: $host\r\n" .
    "WebSocket-Location: ws://$host:$port\r\n".
   "Sec-WebSocket-Accept:$secAccept\r\n\r\n";


  //fwrite($client, $upgrade);

  fwrite($client, $upgrade,strlen($upgrade));
}
function send_message($clients, $msg){
    foreach($clients as $changed_socket){
    @fwrite($changed_socket, $msg);
    }
}
?>