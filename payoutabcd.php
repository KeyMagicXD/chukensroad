<?php
function generateSign(array $params, $secretkey)
{
    ksort($params);
    $string = [];
    foreach ($params as $key => $value) {
        if ($key == 'sign' || $value === null) continue; // Exclude sign parameter and null values
        $string[] = $key . '=' . $value;
    }
    $signStr = implode('&', $string) . $secretkey; // No need to append '&key=' again

    return strtolower(md5($signStr)); // Convert signature result to lowercase
}


// Prepare your parameters
$params = [
    'mer_no' => '8890359',
    'order_no' => 'PYT'.time(),
    'order_amount' => '1800.00',
    'acc_code'=>'BANK',
    'acc_name'=> 'Sibananda Kuanr',
    'acc_no'=>'40943790327',
    'province'=> 'SBIN0006417',
    'currency' => 'INR',
    'method' => 'fund.apply',
    'returnurl' => 'https://selimdemo.site/wkpay/payout/payoutcallback.php',
    // Optionally add other parameters if needed
];

// Add your secret key
$secretkey = '300741ba332b64a1f9cf30b82b1f8ad8'; // Replace with your actual secret key

// Generate the signature
$params['sign'] = generateSign($params, $secretkey);

// Prepare JSON data for POST request
$data = json_encode($params);

// Set up CURL
$ch = curl_init('https://wkpluss.com/gateway/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data)
]);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Print the response
    echo $response;
}

// Close CURL
curl_close($ch);