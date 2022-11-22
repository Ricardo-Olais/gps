<?php

session_start(); 
require_once 'shared.php';

$domain_url = $config['domain'];

$subscripcion=$_REQUEST['id'];//$_REQUEST['subscripcion'];

//$id=$_REQUEST['id'];
// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
$stripe = new \Stripe\StripeClient('sk_test_51IRNcvK9KYNU2QdIqItH66j09101WtH82MSBoeB79AscKj5AlWPFAA8GracCTPijDYvekImzxyoQpmaEOCkY37Gn00a3O0hoHA');

$resul=$stripe->subscriptions->retrieve(
  "$subscripcion",
  []
);

$id=$resul['customer'];

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
$stripe = new \Stripe\StripeClient('sk_test_51IRNcvK9KYNU2QdIqItH66j09101WtH82MSBoeB79AscKj5AlWPFAA8GracCTPijDYvekImzxyoQpmaEOCkY37Gn00a3O0hoHA');

$stripe->billingPortal->configurations->create(
  [
    'business_profile' => [
      'headline' => 'Expertos en localización vehicular, GPS preciso',
    ],
    'features' => ['invoice_history' => ['enabled' => true]],
  ]
); //cus_KlsHgoMOH9OBWj

$session = \Stripe\BillingPortal\Session::create([
  'customer' => $id,
  'return_url' => 'https://localizaminave.com/facturacion',
]);



// Redirect to the customer portal.
header("Location: " . 

$session->url);
exit();




?>