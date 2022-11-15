<?php
session_start(); 

include('shared.php');


$domain_url = $config['domain'];

$subscription=$_REQUEST['id'];



    $cancelarSubscripcion = \Stripe\Subscription::update(

      "$subscription",
      [
        'cancel_at_period_end' => true,
      ]
    );




$mil = $cancelarSubscripcion['current_period_end'];
$seconds = $mil / 1000;
$response=new StdClass();
$fechaExpira=date("Y-m-d H:i:s", $cancelarSubscripcion['current_period_end']);

$response->expira=$fechaExpira;

echo json_encode($response);

 












