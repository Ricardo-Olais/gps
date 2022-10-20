<?php
session_start(); 
require_once 'shared.php';

$domain_url = $config['domain'];

$subscription=$_SESSION["subscripcion"];

$cancelarSubscripcion = \Stripe\Subscription::update(

	"$subscription",
  [
    'cancel_at_period_end' => true,
  ]
);

//print_r($cancelarSubscripcion);









