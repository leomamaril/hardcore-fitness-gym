<?php
require __DIR__ . '/vendor/autoload.php'; // Autoload Guzzle

$secretKey = 'sk_test_87UjNUsADDzTjdoPMMEq1yXd'; // Replace with your PayMongo Secret Key
$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.paymongo.com/v1/',
    'headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic ' . base64_encode($secretKey . ':'), // Basic Auth
    ],
]);
?>