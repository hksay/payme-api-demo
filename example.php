<?php

use Kato\PayMe\ApiClient;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$clientId = $_ENV['CLIENT_ID'];
$clientSecret = $_ENV['CLIENT_SECRET'];
$signingKeyId = $_ENV['SIGNING_KEY_ID'];
$signingKey = $_ENV['SIGNING_KEY'];
$apiUrl = $_ENV['API_END_POINT'];
$version= $_ENV['API_VERSION'];

$client = new ApiClient($clientId, $clientSecret, $signingKeyId, $signingKey, $apiUrl);

$request = json_decode('{
    "totalAmount": 3.77,
    "currencyCode": "HKD",
    "effectiveDuration":600,
    "notificationUri":"https://webhook.site/a8355331-d748-4951-bf6b-7e02f6fce605",
    "appSuccessCallback":"www.example.com/success",
     "appFailCallback":"www.example.com/failure",
    "merchantData": {
        "orderId": "ID12345678",
        "orderDescription": "Description displayed to customer",
        "additionalData": "Arbitrary additional data - logged but not displayed",
        "shoppingCart": [
            {
                "category1": "General categorization",
                "category2": "More specific categorization",
                "category3": "Highly specific categorization",
                "quantity": 1,
                "price": 1,
                "name": "Item 1",
                "sku": "SKU987654321",
                "currencyCode": "HKD"
            },
            {
                "category1": "General categorization",
                "category2": "More specific categorization",
                "category3": "Highly specific categorization",
                "quantity": 2,
                "price": 1,
                "name": "Item 2",
                "sku": "SKU678951234",
                "currencyCode": "HKD"
            }
        ]
    }
}', true);
$response = $client->payment()->requests($request);
var_dump($response);

$requestStatus = $client->payment()->status($response['paymentRequestId']);
var_dump($requestStatus);

$cancelRequest = $client->payment()->cancel($response['paymentRequestId']);
var_dump($cancelRequest);

$transactions = $client->payment()->transactions();
var_dump($transactions);

$transactionId = '1';
$transaction = $client->payment()->transaction($transactionId);
var_dump($transaction);

$refundsRequest = json_decode('{
  "amount": 1.00,
  "currencyCode": "HKD",
  "reasonCode": "01",
  "reasonMessage": "Damaged stock returned to store"
}', true);

$refunds = $client->payment()->refunds($transactionId, $refundsRequest);
var_dump($refunds);
