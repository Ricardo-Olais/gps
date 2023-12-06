<?php
$host = '192.168.0.12';
$port = '3001';
$path = 'C:/xampp/htdocs/gps/public/notificaciones/';
$transport = 'tlsv1.3';
$ssl = ['ssl' => [
          'local_cert'  => $path . 'ab74f2e62ff8f417.PEM',       // SSL Certificate
          'local_pk'    => $path . 'llaveRicardo.PEM',    // SSL Keyfile
          'disable_compression' => true,             // TLS compression attack vulnerability
          'verify_peer'         => false,            // Set this to true if acting as an SSL client
          'ssltransport' => $transport,              // Transport Methods such as 'tlsv1.1', tlsv1.2' 
        ] ];
$ssl_context = stream_context_create($ssl);
$server = stream_socket_server($transport . '://' . $host . ':' . $port, $errno, $errstr, STREAM_SERVER_BIND|STREAM_SERVER_LISTEN, $ssl_context);
if (!$server) {  die("$errstr ($errno)"); } 
$clients = array($server);
$write  = NULL;
$except = NULL;
while (true) {
  $changed = $clients;
  stream_select($changed, $write, $except, 10);
  if (in_array($server, $changed)) {
    $client = @stream_socket_accept($server);
    if (!$client){ continue; }
    $clients[] = $client;
    $ip = stream_socket_get_name( $client, true );
    echo "New Client connected from $ip\n";
    
    stream_set_blocking($client, true);
    $headers = fread($client, 1500);
    handshake($client, $headers, $host, $port);
    stream_set_blocking($client, false);

    send_message($clients, mask($ip . ' connected'));
    $found_socket = array_search($server, $changed);
    unset($changed[$found_socket]);     
  }
  foreach ($changed as $changed_socket) {
    $ip = stream_socket_get_name( $changed_socket, true );
    $buffer = stream_get_contents($changed_socket);
        if ($buffer == false) {
      echo "Client Disconnected from $ip\n";
      @fclose($changed_socket);
            $found_socket = array_search($changed_socket, $clients);
            unset($clients[$found_socket]);
        }
    $unmasked = unmask($buffer);
    if ($unmasked != "") { echo "\nReceived a Message from $ip:\n\"$unmasked\" \n"; }
    $response = mask($unmasked);
    send_message($clients, $response);
  }
}
fclose($server);

function unmask($text) {
    $length = @ord($text[1]) & 127;
    if($length == 126) {    $masks = substr($text, 4, 4);    $data = substr($text, 8); }
    elseif($length == 127) {    $masks = substr($text, 10, 4); $data = substr($text, 14); }
    else { $masks = substr($text, 2, 4); $data = substr($text, 6); }
    $text = "";
    for ($i = 0; $i < strlen($data); ++$i) { $text .= $data[$i] ^ $masks[$i % 4];    }
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
    $secKey = $headers['Sec-WebSocket-Key'];
    $secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
    //hand shaking header
    $upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
    "Upgrade: websocket\r\n" .
    "Connection: Upgrade\r\n" .
    "WebSocket-Origin: $host\r\n" .
    "WebSocket-Location: wss://$host:$port\r\n".
    "Sec-WebSocket-Version: 13\r\n" .
    "Sec-WebSocket-Accept:$secAccept\r\n\r\n";
  fwrite($client, $upgrade);
}
function send_message($clients, $msg){
    foreach($clients as $changed_socket){
    @fwrite($changed_socket, $msg);
    }
}
?>