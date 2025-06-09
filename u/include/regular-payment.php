<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

// PayMongo API endpoint
$apiUrl = 'https://api.paymongo.com/v1/links';

// Your PayMongo Secret Key
$secretKey = 'sk_test_87UjNUsADDzTjdoPMMEq1yXd';

// Request payload
$payload = [
    'data' => [
        'attributes' => [
            'amount' => 10000, // Amount in cents (₱100.00 = 10000 cents)
            'description' => 'Payment for service', // Description of the payment
            'currency' => 'PHP', // Currency
        ],
    ],
];

// Initialize Guzzle client
$client = new Client();

try {
    // Send POST request to PayMongo API
    $response = $client->request('POST', $apiUrl, [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode($secretKey . ':'), // Basic Auth with secret key
            'Content-Type' => 'application/json',
        ],
        'json' => $payload,
    ]);

    // Decode the response
    $responseData = json_decode($response->getBody(), true);

    // Extract the payment link
    $paymentLink = $responseData['data']['attributes']['checkout_url'];

    // Redirect the user to the payment link
    header('Location: ' . $paymentLink);
    exit(); // Ensure no further code is executed after redirection

} catch (ClientException $e) {
    // Handle API errors
    $response = $e->getResponse();
    $errorDetails = json_decode($response->getBody()->getContents(), true);
    echo "Error: " . $errorDetails['errors'][0]['detail'] . "\n";
}