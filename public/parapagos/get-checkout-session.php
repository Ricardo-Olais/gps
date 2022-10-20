<?php
session_start(); 
require_once 'shared.php';

// Fetch the Checkout Session to display the JSON result on the success page
$id = $_GET['sessionId'];
$checkout_session = \Stripe\Checkout\Session::retrieve($id);

//echo json_encode($checkout_session);

//aqui vamos a guardar los datos


$subscription=$checkout_session['subscription'];

$_SESSION["subscripcion"]=$subscription;