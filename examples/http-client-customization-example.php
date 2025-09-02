<?php

/**
 * HTTP Client Customization Example
 * 
 * This example demonstrates how to customize the HTTP client used by the
 * PAYONE Commerce Platform PHP SDK for different scenarios.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;
use PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient;

/**
 * Example 1: Global HTTP Client Configuration
 * 
 * Configure a custom HTTP client globally that will be used by all API clients
 */
function globalHttpClientExample(): void
{
    echo "=== Global HTTP Client Configuration ===\n";
    
    // Create a custom Guzzle client with specific configuration
    $customHttpClient = new Client([
        'timeout' => 30,
        'connect_timeout' => 10,
        'verify' => true,
        'headers' => [
            'User-Agent' => 'MyApp/1.0'
        ]
    ]);

    // Pass the custom client to the configuration
    $config = new CommunicatorConfiguration(
        apiKey: getenv('API_KEY') ?: 'test-key',
        apiSecret: getenv('API_SECRET') ?: 'test-secret',
        host: CommunicatorConfiguration::getPredefinedHosts()['prod']['url'],
        integrator: 'HTTP Client Example',
        httpClient: $customHttpClient
    );

    // All API clients created with this configuration will use the custom HTTP client
    $commerceCaseClient = new CommerceCaseApiClient($config);
    $checkoutClient = new CheckoutApiClient($config);
    
    echo "Global HTTP client configured with 30s timeout and custom User-Agent\n";
    echo "Both CommerceCaseApiClient and CheckoutApiClient will use this configuration\n\n";
}

/**
 * Example 2: Client-Specific HTTP Client Configuration
 * 
 * Override the global HTTP client for specific API clients
 */
function clientSpecificHttpClientExample(): void
{
    echo "=== Client-Specific HTTP Client Configuration ===\n";
    
    // Global configuration with a standard HTTP client
    $globalHttpClient = new Client(['timeout' => 15]);
    $config = new CommunicatorConfiguration(
        apiKey: getenv('API_KEY') ?: 'test-key',
        apiSecret: getenv('API_SECRET') ?: 'test-secret',
        httpClient: $globalHttpClient
    );

    // Create a client-specific HTTP client with different settings
    $clientSpecificHttpClient = new Client([
        'timeout' => 60,  // Longer timeout for this specific client
        'proxy' => getenv('HTTP_PROXY'), // Use proxy if configured
        'headers' => [
            'X-Custom-Header' => 'SpecialClient'
        ]
    ]);

    // Method 1: Pass client-specific HTTP client via constructor
    $commerceCaseClient = new CommerceCaseApiClient($config, $clientSpecificHttpClient);
    
    // Method 2: Set client-specific HTTP client after construction
    $checkoutClient = new CheckoutApiClient($config);
    $checkoutClient->setHttpClient($clientSpecificHttpClient);
    
    echo "CommerceCaseApiClient uses client-specific HTTP client (60s timeout, proxy, custom header)\n";
    echo "CheckoutApiClient also uses the same client-specific configuration\n";
    echo "Other clients would still use the global configuration (15s timeout)\n\n";
}

/**
 * Example 3: HTTP Client with Middleware
 * 
 * Demonstrate advanced HTTP client customization with Guzzle middleware
 */
function httpClientWithMiddlewareExample(): void
{
    echo "=== HTTP Client with Middleware ===\n";
    
    // Create a handler stack and add middleware
    $stack = HandlerStack::create();
    
    // Add logging middleware
    $stack->push(Middleware::mapRequest(function ($request) {
        echo "Making request to: " . $request->getUri() . "\n";
        return $request;
    }));
    
    // Add retry middleware for failed requests
    $stack->push(Middleware::retry(function ($retries, $request, $response, $exception) {
        return $retries < 3 && ($exception || ($response && $response->getStatusCode() >= 500));
    }));

    // Create HTTP client with the custom handler stack
    $httpClientWithMiddleware = new Client([
        'handler' => $stack,
        'timeout' => 30,
        'headers' => [
            'X-SDK-Version' => '1.3.0'
        ]
    ]);

    $config = new CommunicatorConfiguration(
        apiKey: getenv('API_KEY') ?: 'test-key',
        apiSecret: getenv('API_SECRET') ?: 'test-secret',
        httpClient: $httpClientWithMiddleware
    );

    $client = new CommerceCaseApiClient($config);
    
    echo "HTTP client configured with request logging and retry middleware\n";
    echo "All requests will be logged and automatically retried on failure\n\n";
}

/**
 * Example 4: Priority Logic Demonstration
 * 
 * Show how the SDK prioritizes different HTTP client configurations
 */
function priorityLogicExample(): void
{
    echo "=== HTTP Client Priority Logic ===\n";
    
    // 1. Global HTTP client
    $globalClient = new Client(['timeout' => 10]);
    $config = new CommunicatorConfiguration(
        apiKey: 'test-key',
        apiSecret: 'test-secret',
        httpClient: $globalClient
    );
    
    // 2. Client-specific HTTP client (overrides global)
    $clientSpecificClient = new Client(['timeout' => 20]);
    $apiClient = new CommerceCaseApiClient($config, $clientSpecificClient);
    
    echo "Priority 1: Client-specific HTTP client (20s timeout) - ACTIVE\n";
    echo "Priority 2: Global HTTP client (10s timeout) - OVERRIDDEN\n";
    echo "Priority 3: Default Guzzle client - NOT USED\n\n";
    
    // Remove client-specific client to fall back to global
    $apiClient->setHttpClient(null);
    echo "After removing client-specific client:\n";
    echo "Priority 1: Client-specific HTTP client - NOT SET\n";
    echo "Priority 2: Global HTTP client (10s timeout) - ACTIVE\n";
    echo "Priority 3: Default Guzzle client - NOT USED\n\n";
}

/**
 * Main execution
 */
function main(): void
{
    echo "PAYONE Commerce Platform PHP SDK - HTTP Client Customization Examples\n";
    echo "====================================================================\n\n";
    
    globalHttpClientExample();
    clientSpecificHttpClientExample();
    httpClientWithMiddlewareExample();
    priorityLogicExample();
    
    echo "Examples completed successfully!\n";
    echo "For more information, see the README.md file.\n";
}

// Run examples if this file is executed directly
if (basename(__FILE__) === basename($_SERVER['SCRIPT_NAME'])) {
    main();
}
