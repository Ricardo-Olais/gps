#!/usr/bin/php
<?php
    error_reporting(E_ALL);
    set_time_limit(0);
    ob_implicit_flush();
    $hoy = date('Y-m-d h:i:s');
    
    $servidor='127.0.0.1';
    $puerto ='21100';
  
    
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
                $data = fread($socket, 128);
                echo ">data: " . $data . "\n";
                $tk103_data = explode(',', $data);
                $response = "";
               
                if (!$data)
                {
                    unset($client_sockets[array_search($socket, $client_sockets) ]);
                    @fclose($socket);
                    echo "client disconnected. total clients: " . count($client_sockets) . "\n";
                    continue;
                }
               /* if (sizeof($response) > 0)
                {
                    echo "[ RESPONSE ]".$response."\n";
                    fwrite($socket, $response);
                }*/
            }
        }
    }
    /**
     * Classe para traducao da hora padrao nmea para o padrao timestamp do mysql
     */
    inicia_socket($servidor,$puerto);
?>