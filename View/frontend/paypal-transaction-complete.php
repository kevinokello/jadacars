<?php

include('./clientPartials/header.php');
ob_start();

//get transaction from API
$transaction=json_decode(file_get_contents('php://input'), true);
//log transaction
file_put_contents('transaction.log', print_r($transaction, true), FILE_APPEND);

//get transaction details
$transaction_id = $transaction['transaction']['id'];
$amount = $transaction['transaction']['purchase_units'][0]['amount']['value'];
$currency = $transaction['transaction']['purchase_units'][0]['amount']['currency_code'];
$payment_status = $transaction['transaction']['status'];
$payment_type = $transaction['transaction']['intent'];
$payer_id = $transaction['transaction']['payer']['payer_id'];
$payer_email = $transaction['transaction']['payer']['email_address'];
$payer_name = $transaction['transaction']['payer']['name']['given_name'].' '.$transaction['transaction']['payer']['name']['surname'];
$payer_address = $transaction['transaction']['payer']['address']['country_code'];
$merchant_id = $transaction['transaction']['purchase_units'][0]['payee']['merchant_id'];
$merchant_email = $transaction['transaction']['purchase_units'][0]['payee']['email_address'];
$created_at = $transaction['transaction']['create_time'];
$updated_at = $transaction['transaction']['update_time'];



//save
//insert into db
$sql = "INSERT INTO `transactions` (`transaction_id`, `amount`, `currency`, `payment_status`, `payment_type`, `payer_id`, `payer_email`, `payer_name`, `payer_address`, `merchant_id`, `merchant_email`, `created_at`, `updated_at`) VALUES ('$transaction_id', '$amount', '$currency', '$payment_status', '$payment_type', '$payer_id', '$payer_email', '$payer_name', '$payer_address', '$merchant_id', '$merchant_email', '$created_at', '$updated_at')";
$res = mysqli_query($conn, $sql);

