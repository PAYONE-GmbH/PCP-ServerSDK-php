<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PayoneCommercePlatform\Sdk\ApiClient\AuthenticationApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

$apiKey = getenv('API_KEY');
$apiSecret = getenv('API_SECRET');
$merchantId = getenv('MERCHANT_ID');

if (!$apiKey || !$apiSecret || !$merchantId) {
    echo "Please set API_KEY, API_SECRET, and MERCHANT_ID environment variables.\n";
    exit(1);
}

$config = new CommunicatorConfiguration(
    apiKey: $apiKey,
    apiSecret: $apiSecret,
    integrator: 'PHP Example App'
);
$authClient = new AuthenticationApiClient($config);

try {
    $token = $authClient->getAuthenticationTokens($merchantId);
    echo "JWT Token: " . $token->getToken() . "\n";
    echo "Token ID: " . $token->getId() . "\n";
    echo "Created: " . $token->getCreationDate() . "\n";
    echo "Expires: " . $token->getExpirationDate() . "\n";
} catch (Exception $e) {
    echo "Error retrieving authentication token: " . $e->getMessage() . "\n";
    exit(1);
}
