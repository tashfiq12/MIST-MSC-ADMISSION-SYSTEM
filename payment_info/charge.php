<?php
  require_once('vendor/autoload.php');
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');
   error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
  session_start();
 if($_SESSION['login']!==true){
        header('location:../login.php');
  }
   $idd=$_SESSION['id'];
  \Stripe\Stripe::setApiKey('sk_test_zeR7US098TjKQNYMlQ7YhgIv');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $first_name = $POST['first_name'];
 $last_name = $POST['last_name'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => 50,
  "currency" => "usd",
  "description" => "MIST MSC REGISTRATION SYSTEM",
  "customer" => $customer->id
));

// Customer Data
$customerData = [
  'id' => $idd,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

// Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);


// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $idd,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);