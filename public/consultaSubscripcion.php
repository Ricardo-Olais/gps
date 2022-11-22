<?php

session_start(); 
require_once 'shared.php';

$domain_url = $config['domain'];

$subscripcion="sub_1M70G4K9KYNU2QdIqXAMR8fu";//$_REQUEST['subscripcion'];

//$id=$_REQUEST['id'];
// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
$stripe = new \Stripe\StripeClient('sk_test_51IRNcvK9KYNU2QdIqItH66j09101WtH82MSBoeB79AscKj5AlWPFAA8GracCTPijDYvekImzxyoQpmaEOCkY37Gn00a3O0hoHA');

$resul=$stripe->subscriptions->retrieve(
  "$subscripcion",
  []
);



//print_r($resul['customer']);

$response=new stdClass();

$response->estatus=$resul['status'];

echo json_encode($response);



?>