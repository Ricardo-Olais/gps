<?php
session_start(); 

include('shared.php');
include('conexion.php');


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

$sql = "UPDATE vehiculos SET Fecha_termino='$fechaExpira' WHERE subscripcion='$subscription'";
$query = mysqli_query($conexion, $sql);

$response->expira=$fechaExpira;

echo json_encode($response);

 












