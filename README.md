# PAYONE Commerce Platform PHP SDK

[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=PAYONE-GmbH_PCP-ServerSDK-php&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=PAYONE-GmbH_PCP-ServerSDK-php)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=PAYONE-GmbH_PCP-ServerSDK-php&metric=coverage)](https://sonarcloud.io/summary/new_code?id=PAYONE-GmbH_PCP-ServerSDK-php)
![Packagist Version](https://img.shields.io/packagist/v/payone-gmbh/pcp-serversdk-php)

- A convenient PHP wrapper around API calls and responses:
  - marshals PHP request objects to HTTP requests
  - unmarshals HTTP responses to PHP response objects or PHP exceptions
- handling of all the details concerning authentication
- handling of required metadata

For a general introduction to the API and various checkout flows, see the documentation: - General introduction to the [PAYONE Commerce Platform](https://docs.payone.com/pcp/payone-commerce-platform) - Overview of the [checkout flows](https://docs.payone.com/pcp/checkout-flows) - Available [payment methods](https://docs.payone.com/pcp/checkout-flows)

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
  - [General](#general)
  - [Error Handling](#error-handling)
  - [Client Side](#client-side)
  - [Apple Pay](#apple-pay)
  - [HTTP Client Customization](#http-client-customization)
  - [Authentication Token Retrieval](#authentication-token-retrieval)
- [Demo App](#demo-app)
- [Contributing](#contributing)
- [Development](#development)
  - [Structure of this repository](#structure-of-this-repository)
  - [Release](#release)
  - [Optional: Creating a GitHub Release](#optional-creating-a-github-release)
- [License](#license)

## Requirements

This SDK requires PHP 8.2 or later.

**[back to top](#table-of-contents)**

## Installation

This SDK is currently not released on [packagist](https://packagist.org/). You can install it from GitHub by specifying a `vcs` repository within your `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/PAYONE-GmbH/PCP-ServerSDK-php"
    }
  ],
  "require": {
    "payone-gmbh/pcp-serversdk-php": "dev-main"
  }
}
```

These snippets specify the main branch, which contains the latest release. You can specify a version by inserting a git tag `vX.Y.Z` instead of `main`. Make sure to prepend the git branch or tag with `dev-`. For an in depth explanation take a look at the [Composer documentation](https://getcomposer.org/doc/05-repositories.md#vcs).

**[back to top](#table-of-contents)**

## Usage

### General

To use this SDK, you need to construct a `CommunicatorConfiguration` which encapsulates everything needed to connect to the PAYONE Commerce Platform.

```php
<?php

use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

/** @var CommunicatorConfiguration */
$config = new CommunicatorConfiguration(
        apiKey: getenv('API_KEY'),
        apiSecret: getenv('API_SECRET'),
        host: CommunicatorConfiguration::getPredefinedHosts()['prod']['url'],
        integrator: 'YOUR COMPANY NAME',
);
```

As shown above, you can use `CommunicatorConfiguration::getPredefinedHosts()` for information on the available environments. With the configuration you can create an API client for each reource you want to interact with. For example to create a commerce case you can use the `CommerceCaseApiClient`.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;

$client = new CommerceCaseApiClient($config);
```

Each client has typed parameters for the payloads and responses. You can use `phpstan` to verify the types of the parameters and return values or look for `TypeError` thrown at runtime. All payloads are availble as PHP classes within the `PayoneCommercePlatform\Sdk\Models` namespace. The SDK will automatically marshal the PHP objects to JSON and send it to the API. The response will be unmarshalled to a PHP object internally.

To create an empty commerce case you can use the `CreateCommerceCaseRequest` class:

```php
<?php

use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest;

/** @var CreateCommerceCaseResponse */
$response = $client->createCommerceCase('YOUR_MERCHANT_ID', new CreateCommerceCaseRequest());
```

The models are directly map to the API as described in the [PAYONE Commerce Platform API Reference](https://docs.payone.com/pcp/commerce-platform-api). For an in depth example you can take a look at the [demo app](#demo-app).

### Error Handling

When making a request, any client instance may throw a `PayoneCommercePlatform\Sdk\Errors\ApiException`. There are two subtypes of this exception:

- `PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException`: This exception is thrown when the API returns an well-formed error response. These errors are provided as an array of `PayoneCommercePlatform\Sdk\Models\APIError` instances via the `getErrors()` method on the exception. They usually contain useful information about what is wrong in your request or the state of the resource.
- `PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException`: This exception is a catch-all exception for any error that cannot be turned into a helpful error response. This includes network errors, malformed responses or other errors that are not directly related to the API.

### Client Side

For most [payment methods](https://docs.payone.com/pcp/commerce-platform-payment-methods), some information from the client is needed, e.g. payment information given by Apple when a payment via ApplePay suceeds. PAYONE provides client side SDKs which helps you interact the third party payment providers. You can find these SDKs under the [Payone GitHub organization](https://github.com/PAYONE-GmbH). Either way ensure to never store or even send credit card information to your server. The PAYONE Commerce Platform never needs access to the credit card information. The client side is responsible for safely retrieving a credit card token. This token must be used with this SDK.

This SDK makes no assumptions about how networking between the client and your PHP server is handled. If need to serialize a model to JSON or deserialize a client side request from a JSON string to a model you can use the static `serializeJson()` and `deserializeJson()` methods on the `BaseApiClient` class:

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;
use PayoneCommercePlatform\Sdk\Models\ApplePay\AppelPayPayment;

// to json
// make sure to add some useful data
$applePayPayment = new ApplePayPayment();
$json = BaseApiClient::serializeJson($model);

// ...and back
$applePayPaymentRequest = BaseApiClient::deserializeJson($json, ApplePayPayment::class);
```

As every API clients inherits from `BaseApiClient` you can use these methods on every client class directly.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\PaymentInformationApiClient;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;

$amountOfMoney = new AmountOfMoney(amount: 3199, currencyCode: 'EUR');
PaymentInformationApiClient::serializeJson($amountOfMoney);
// returns:
//      '{ "amount": 3199, currencyCode: "EUR" }'
```

### Apple Pay

When a client successfully makes a payment via ApplePay, it receives a [ApplePayPayment](https://developer.apple.com/documentation/apple_pay_on_the_web/applepaypayment). This structure is accessible as a model as `PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPayment`. The model is a direct representation of the ApplePayPayment. You can use the `deserializeJson()` method to convert a JSON string from a client an `ApplePayPayment` object.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;

// receive json as a string from the client with your favorite networking library or server framework
/** @var string */
$json = getJsonStringFromRequestSomehow();
$applePayPayment = BaseApiClient::deserializeJson($json, ApplePayPayment::class);
```

You can use the `PayoneCommercePlatform\Sdk\Transformer\ApplePayTransformer` to map an `ApplePayPayment` to a `MobilePaymentMethodSpecificInput` which can be used for payment executions or order requests. The transformer has a static method `transformApplePayPaymentToMobilePaymentMethodSpecificInput()` which takes an `ApplePayPayment` and returns a `MobilePaymentMethodSpecificInput`. The transformer does not check if the reponse is complete. If anything is missing the field will be set to `null`.

```php
<?php

use PayoneCommercePlatform\Sdk\Transformer\ApplePayTransformer;

$mobilePaymentMethodSpecificInput = ApplePayTransformer::transformApplePayPaymentToMobilePaymentMethodSpecificInput($applePayPayment);
```

**[back to top](#table-of-contents)**

## HTTP Client Customization

The SDK allows you to customize the underlying Guzzle HTTP client used for API requests. This provides flexibility to configure timeouts, add interceptors, set up proxies, implement custom authentication mechanisms, and more.

### Overview

HTTP client customization enables you to:

- Configure custom timeouts and connection settings
- Set up proxy servers for corporate environments
- Add custom headers and authentication
- Implement request/response middleware for logging or monitoring
- Configure SSL/TLS settings
- Add retry logic and error handling

### Global HTTP Client Configuration

You can set a global HTTP client that will be used by all API clients by passing it to the `CommunicatorConfiguration`:

```php
<?php

use GuzzleHttp\Client;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;

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
    apiKey: getenv('API_KEY'),
    apiSecret: getenv('API_SECRET'),
    host: CommunicatorConfiguration::getPredefinedHosts()['prod']['url'],
    integrator: 'YOUR COMPANY NAME',
    httpClient: $customHttpClient
);

// All API clients created with this configuration will use the custom HTTP client
$commerceCaseClient = new CommerceCaseApiClient($config);
```

### Client-Specific HTTP Client Configuration

You can also set a custom HTTP client for individual API clients, which will override the global configuration:

```php
<?php

use GuzzleHttp\Client;
use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;

// Create a client-specific HTTP client
$clientSpecificHttpClient = new Client([
    'timeout' => 60,  // Different timeout for this specific client
    'proxy' => 'http://proxy.example.com:8080'
]);

// Pass the client-specific HTTP client to the API client constructor
$commerceCaseClient = new CommerceCaseApiClient($config, $clientSpecificHttpClient);

// Or set it after construction
$commerceCaseClient->setHttpClient($clientSpecificHttpClient);
```

### Advanced Configuration Examples

#### HTTP Client with Middleware

```php
<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

// Create a handler stack and add middleware
$stack = HandlerStack::create();

// Add logging middleware
$stack->push(Middleware::mapRequest(function ($request) {
    error_log("Making request to: " . $request->getUri());
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
    apiKey: getenv('API_KEY'),
    apiSecret: getenv('API_SECRET'),
    httpClient: $httpClientWithMiddleware
);
```

#### Proxy Configuration

```php
<?php

use GuzzleHttp\Client;

// Configure HTTP client with proxy settings
$proxyHttpClient = new Client([
    'proxy' => [
        'http'  => 'http://proxy.example.com:8080',
        'https' => 'https://proxy.example.com:8080',
    ],
    'timeout' => 30,
    'verify' => '/path/to/ca-bundle.crt'  // Custom CA bundle
]);

$config = new CommunicatorConfiguration(
    apiKey: getenv('API_KEY'),
    apiSecret: getenv('API_SECRET'),
    httpClient: $proxyHttpClient
);
```

### Priority Logic

The SDK uses the following priority order when determining which HTTP client to use:

1. **Client-specific HTTP client** (highest priority) - Set via constructor parameter or `setHttpClient()` method
2. **Global HTTP client** - Set in `CommunicatorConfiguration`
3. **Default Guzzle client** (lowest priority) - Used when no custom client is configured

This allows you to have a global configuration for most clients while still being able to customize specific clients when needed.

### Backward Compatibility

The HTTP client customization feature maintains full backward compatibility:

- Existing code continues to work without any changes
- Default behavior remains unchanged when no custom HTTP client is provided
- All existing tests continue to pass

### Common Use Cases

#### Corporate Environment with Proxy

```php
$corporateClient = new Client([
    'proxy' => getenv('CORPORATE_PROXY'),
    'timeout' => 45,
    'verify' => '/etc/ssl/certs/ca-certificates.crt'
]);
```

#### Development Environment with Debugging

```php
$debugClient = new Client([
    'timeout' => 120,  // Longer timeout for debugging
    'debug' => true,   // Enable debug output
    'verify' => false  // Disable SSL verification for local testing
]);
```

#### Production Environment with Monitoring

```php
$stack = HandlerStack::create();
$stack->push(Middleware::mapRequest(function ($request) {
    // Log request metrics to monitoring system
    return $request;
}));

$productionClient = new Client([
    'handler' => $stack,
    'timeout' => 15,
    'connect_timeout' => 5
]);
```

**[back to top](#table-of-contents)**

## Authentication Token Retrieval

To interact with certain client-side SDKs (such as the credit card tokenizer), you need to generate a short-lived authentication JWT token for your merchant. This token can be retrieved using the SDK as follows:

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\AuthenticationApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

$apiKey = getenv('API_KEY');
$apiSecret = getenv('API_SECRET');
$merchantId = getenv('MERCHANT_ID');

$config = new CommunicatorConfiguration(
    apiKey: $apiKey,
    apiSecret: $apiSecret,
    integrator: 'YOUR COMPANY NAME'
);
$authClient = new AuthenticationApiClient($config);

$token = $authClient->getAuthenticationTokens($merchantId);
echo "JWT Token: " . $token->getToken() . "\n";
echo "Token ID: " . $token->getId() . "\n";
echo "Created: " . $token->getCreationDate() . "\n";
echo "Expires: " . $token->getExpirationDate() . "\n";
```

This token can then be used for secure operations such as initializing the credit card tokenizer or other client-side SDKs that require merchant authentication. The token is valid for a limited time (10 minutes) and should be handled securely.

**Note:** The `getAuthenticationTokens` method requires a valid `merchantId`. Optionally, you can provide an `X-Request-ID` header for tracing requests.

**[back to top](#table-of-contents)**

## Demo App

This repository contains a demo app that showcases how to implement common use cases, like a [Step-by-Step Checkout](https://docs.payone.com/pcp/checkout-flows/step-by-step-checkout) and an [One-Stop-Checkout](https://docs.payone.com/pcp/checkout-flows/one-step-checkout). For each use case the demo app contains a protected method in the top level class `DemoApp`. You can run the app to execute the code within in the sandbox API. This is a good way to test, if your setup is correct.

Before running the app ensure you have run `composer install` and `composer dumb-autoload` within the demo app directory (`./examples/demo-app`). By default, all API calls are sent to the pre-production environment of the PAYONE Commerce Platform. Note that the created entities cannot be completely deleted.

You can run it within the demo app directory via `php src/DemoApp.php`, make sure to provide all necessary environment variables:

1. `API_KEY` a valid api key for the PAYONE Commerce Platform
1. `API_SECRET` a valid api secret for the PAYONE Commerce Platform
1. `MERCHANT_ID` the merchant id which is needed to identify entities, e.g. commerce cases and checkouts, that belong to you.

[Jump to the demo app](./examples/demo-app/src/DemoApp.php)

**[back to top](#table-of-contents)**

## Contributing

See [Contributing](./CONTRIBUTING.md)

**[back to top](#table-of-contents)**

## Development

Ensure you have PHP 8.2 or higher installed. You will need [composer](https://getcomposer.org/) and [xdebug](https://xdebug.org/docs/install). A pretty version of the coverage report will be placed in `coverage`, after running `composer run-script coverage-report`.

### Structure of this repository

This repository consists out of the following components:

1. The source code of the SDK itself: `/src`
2. The source code of the unit and integration tests (including the examples): `/tests`
3. The source code for demos is located `examples/*`. Make sure to run `composer install` and `composer dumb-autoload` before. Within the specific demo before launching it.

### Release

This SDK follows semantic versioning (semver). To relase a new version, create a branch `release/X.Y.Z` and run `prepare_release.sh X.Y.Z`. The script automatically updates the `SDK_VERSION` property within the `CommunicatorConfiguration` class and the version field in the root composer.json, package.json and package-lock.json file. After that the changes are automatically committed and tagged as `vX.Y.Z`.

After calling the `prepare_release.sh` script, it is recommended to manually trigger the changelog generation script (which uses [conventional-changelog](https://github.com/conventional-changelog/conventional-changelog)).

1. **Conventional Commit Messages**:
   - Ensure all commit messages follow the conventional commit format, which helps in automatic changelog generation.
   - Commit messages should be in the format: `type(scope): subject`.

2. **Enforcing Commit Messages**:
   - We enforce conventional commit messages using [Lefthook](https://github.com/evilmartians/lefthook) with [commitlint](https://github.com/conventional-changelog/commitlint).
   - This setup ensures that all commit messages are validated before they are committed.

3. **Generate Changelog**:
   - Run the changelog generation script to update the `CHANGELOG.md` file:
     ```sh
     npm run changelog
     ```
   - Review and commit the updated changelog before proceeding with the release.

When the release is ready, a PR should be created for release branch. Select `develop` as the base branch. After merging into `develop`, merge `develop` into `main`.

### Optional: Creating a GitHub Release

Once you've pushed your latest changes to the repository, developers can start using the latest version by pulling it from GitHub. However, to make the release more visible and provide detailed release notes, you can optionally create a GitHub release.

1. **Navigate to the Releases Page**: Go to the "Releases" section of your repository on GitHub.
2. **Draft a New Release**: Click "Draft a new release".
3. **Tag the Release**: Select the version tag that corresponds to the commit you want to release (e.g., `v0.1.0`). If the tag doesn't exist, you can create it here.
4. **Release Title**: Add a descriptive title for the release (e.g., `v0.1.0 - Initial Release`).
5. **Auto-Generated Release Notes**: GitHub can automatically generate release notes based on merged pull requests and commit history. You can review these notes, adjust the content, and highlight important changes.
6. **Publish the Release**: Once you're satisfied with the release notes, click "Publish release".

Creating a GitHub release is optional but beneficial, as it provides additional context and visibility for your users. Developers can then reference this specific release tag in their `composer.json` file when adding the package as a dependency.

For detailed guidance, refer to the [GitHub documentation on managing releases](https://docs.github.com/en/repositories/releasing-projects-on-github/managing-releases-in-a-repository).

**[back to top](#table-of-contents)**

## License

This project is licensed under the MIT License - see the [LICENSE](./LICENSE) file for details.

**[back to top](#table-of-contents)**

---

Thank you for using our SDK for Online Payments! If you have any questions or need further assistance, feel free to open an issue or contact us.
