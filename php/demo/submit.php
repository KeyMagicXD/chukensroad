<?php

require '../src/Payment';
require '../src/Validator';
require '../src/Crypto';

$fname          = $_POST['full_name'];
$product_name   = $_POST['product_name'];
$email          = $_POST['email'];
$amount         = $_POST['amount'];
$contact        = $_POST['contact'];



/**
 *  Parameters requires to initialize an object of Payment are as follow.
 *  mid => Merchant Id provided by Paykun
 *  accessToken => Access Token provided by Paykun
 *  encKey =>  Encryption provided by Paykun
 *  isLive => Set true for production environment and false for sandbox or testing mode
 *  isCustomTemplate => Set true for non composer projects, will disable twig template
 */
$obj = new \Paykun\Checkout\Payment('532103130967600', '6FD534F8E8F0FF9D6AB9EB8D3EA7B8C3', '19C13884E1E8CB5A4745941E68982D2D', true, true);

$successUrl = str_replace("request", "success", $_SERVER['HTTP_REFERER']);
$failUrl 	= str_replace("request", "failed", $_SERVER['HTTP_REFERER']);

// Initializing Order
$obj->initOrder(generateByMicrotime(), $product_name,  $amount, $successUrl,  $failUrl, 'INR');

// Add Customer
$obj->addCustomer($fname, $email, $contact);

// Add Shipping address
$obj->addShippingAddress('', '', '', '', '');

$obj->addBillingAddress('', '', '', '', '');
// Add Billing Address

//Enable if require custom fields
$obj->setCustomFields(array('udf_1' => 'Some Dummy text'));
//Render template and submit the form
echo $obj->submit();

/* Check for transaction status
 * Once your success or failed url called then create an instance of Payment same as above and then call getTransactionInfo like below
 *  $obj = new Payment('merchantUId', 'accessToken', 'encryptionKey', true, true); //Second last false if sandbox mode
 *  $transactionData = $obj->getTransactionInfo(Get payment-id from the success or failed url);
 *  Process $transactionData as per your requirement
 *
 * */


function generateByMicrotime() {
    $microtime = str_replace('.', '', microtime(true));
    return (substr($microtime, 0, 14));
}
?>