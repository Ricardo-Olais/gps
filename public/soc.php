#!/usr/bin/php
<?php
    error_reporting(E_ALL);
    set_time_limit(0);
    ob_implicit_flush();
    $hoy = date('Y-m-d h:i:s');
    
    $servidor='192.168.0.12'; 
    $puerto ='3001';
  
    
    $pid = getmypid();

    
    function inicia_socket($servidor,$puerto)
    {
        $server = stream_socket_server("tcp://{$servidor}:{$puerto}", $errno, $errorMessage);



        if($server === false)
        {
            die("stream_socket_server error: $errorMessage");
        }
        $client_sockets = array();
        while(true)
        {
            $read_sockets = $client_sockets;
            $read_sockets[] = $server;
            if(!stream_select($read_sockets, $write, $except, 300000))
            {
                die('stream_select error.');
            }
            if(in_array($server, $read_sockets))
            {
                $new_client = stream_socket_accept($server);


                if($new_client)
                {
                    echo "IN: " . stream_socket_get_name($new_client, true) . "\n";
                    $client_sockets[] = $new_client;
                    echo "Conexiones Totales: " . count($client_sockets) . "\n\n";
                }
                unset($read_sockets[array_search($server, $read_sockets) ]);
            }
            foreach($read_sockets as $socket)
            {
                //$data = fread($socket, 128);

              //  $data=stream_socket_recvfrom($socket, 1500);
                $ip = stream_socket_get_name($socket, true );
                $buffer = stream_get_contents($socket);


                     if ($buffer == false) {
                              echo "Cliente desconectado desde $ip\n";
                              @fclose($changed_socket);
                                    $found_socket = array_search($socket,$client_sockets);
                                    unset($client_sockets[$found_socket]);
                        }

                      $unmasked = unmask($buffer);


                if ($unmasked != "") { echo "\nReceived a Message from $ip:\n\"$unmasked\" \n"; }

                   $response = mask($unmasked);

                    echo ">data: " . $response . "\n";
                   // send_message($client_sockets, $response);

               // echo "Data: '" . stream_socket_recvfrom($socket, 1500) . "'\n";


              //  echo ">data: " . $data . "\n";


                /*$tk103_data = explode(',', $data);
                $response = "";
               
                if (!$data)
                {
                    unset($client_sockets[array_search($socket, $client_sockets) ]);
                    @fclose($socket);
                    echo "client disconnected. total clients: " . count($client_sockets) . "\n";
                    continue;
                }*/
               /* if (sizeof($response) > 0)
                {
                    echo "[ RESPONSE ]".$response."\n";
                    fwrite($socket, $response);
                }*/
            }
        }
    }


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

    /**
     * Classe para traducao da hora padrao nmea para o padrao timestamp do mysql
     */
    inicia_socket($servidor,$puerto);
?>