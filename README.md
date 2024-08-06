# PAYONE Commerce Platform Server SDK PHP

**NOTE**: This SDK is still under development. Some things may be broken, features may change in non-compatible ways or will be removed completely.

The PHP SDK helps you to communicate with the PAYONE commerce platform server API. Its primary features are:

* convenient PHP wrapper around the API calls and responses:
  * marshals PHP request objects to HTTP requests
  * unmarshalls HTTP responses to PHP response objects or PHP exceptions
* handling of all the details concerning authentication
* handling of required meta data

For a general introduction to the API and the different checkout flows see the documentation:
    - General introduction to the [PAYONE Commerce Platform](https://docs.payone.com/pcp/payone-commerce-platform)
    - Overview of the [checkout flows](https://docs.payone.com/pcp/checkout-flows)
    - Available [payment methods](https://docs.payone.com/pcp/checkout-flows)

## Table of Contents

1. [PAYONE Commerce Platform Server SDK PHP](#payone-commerce-platform-server-sdk-php)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Usage](#usage)
   - [Error Handling](#error-handling)
   - [Client Side](#client-side)
   - [Apple Pay](#apple-pay)
5. [Demo App](#demo-app)
6. [API Reference](#api-reference)
   - [CommunicatorConfiguration](#communicatorconfiguration)
     - [Setup your configuration](#setup-your-configuration)
     - [Constants](#constants)
     - [Methods](#methods)
   - [Queries](#queries)
     - [GetCommerceCasesQuery](#getcommercecasesquery)
     - [GetCheckoutsQuery](#getcheckoutsquery)
   - [API Clients](#api-clients)
     - [BaseApiClient](#baseapiclient)
     - [CheckoutApiClient](#checkoutapiclient)
     - [CommerceCaseApiClient](#commercecaseapiclient)
     - [OrderManagementCheckoutActionsApiClient](#ordermanagementcheckoutactionsapiclient)
     - [PaymentExecutionApiClient](#paymentexecutionapiclient)
     - [PaymentInformationApiClient](#paymentinformationapiclient)
7. [Contributing](#contributing)
8. [Development](#development)
   - [Structure of this repository](#structure-of-this-repository)
   - [Release](#release)

## Requirements

PHP 8.2 or above is required.

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

This snippets specify the main branch which contains the latest release. You can specify a version by inserting a git tag `vX.Y.Z` instead of `main`. Make sure to prepend the git branch or tag with `dev-`. For a in depth explanation take a look at the [composer documentation](https://getcomposer.org/doc/05-repositories.md#vcs).

## Usage

To use this SDK you need to construct a `CommunicatorConfiguration` which encapsulate everything needed to connect to the PAYONE Commerce Platform.

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
As shown above, you can use `CommunicatorConfiguration::getPredefinedHosts()` for information on the availble environments. With the configuration you can create an API client for each reource you want to interact with. For example to create a commerce case you can use the `CommerceCaseApiClient`.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;

$client = new CommerceCaseApiClient($config);
```

 Each client has typed parameters for the payloads and responses. You can use `phpstan` to verify the types of the parameters and return values or look for `TypeError` thrown at runtime. All payloads are availble as PHP classes within the `PayoneCommercePlatform\Sdk\Models` namespace. The SDK will automatically marshal the PHP objects to JSON and send it to the API. The response will be unmarshalled to a PHP object. 

 To create an empty commerce case you can use the `CreateCommerceCaseRequest` class:

```php
<?php

use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest;

/** @var CreateCommerceCaseResponse */
$response = $client->createCommerceCase('YOUR_MERCHANT_ID', new CreateCommerceCaseRequest());
```

The models directly map to the API as described in [PAYONE Commerce Platform API Reference](https://docs.payone.com/pcp/commerce-platform-api). For an in depth example you can take a look at the [demo app](#demo-app).

### Error Handling

When making a request any client may throw a `PayoneCommercePlatform\Sdk\Errors\ApiException`. There two subtypes of this exception:

- `PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException`: This exception is thrown when the API returns an well-formed error response. The given errors are marshalled to `PayoneCommercePlatform\Sdk\Models\APIError` objects which are availble via the `getErrors()` method. They usually contain usual information about what is wrong in your request or the state of the resource.
- `PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException`: This exception is a catch-all exception for any error that cannot be turned into a helpful error response. This includes network errors, malformed responses or other errors that are not directly related to the API.

### Client Side

For most [payment methods](https://docs.payone.com/pcp/commerce-platform-payment-methods) some information from the client is needed, e.g. payment information given by Apple when a payment via ApplePay suceeds. PAYONE provides client side SDKs which helps you interact the third party payment providers. You can find the SDKs under the [Payone GitHub organization](https://github.com/PAYONE-GmbH). Either way ensure to never store or even send credit card information to your server. The PAYONE Commerce Platform never needs access to the credit card information. The client side is responsible for safely retrieving a credit card token. This token must be used with this SDK.

This SDKs makes no assumption about how the networking between the client and your PHP server is done. If need to serialize a model to JSON or deserialize a client side request from a JSON string to a model you can use the static `serializeJson()` and `deserializeJson()` methods on the `BaseApiClient` class:

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

When a client is successfully made a payment via ApplePay it receives a [ApplePayPayment](https://developer.apple.com/documentation/apple_pay_on_the_web/applepaypayment). This structure is accessible as a model as `PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPayment`. You can use this model to create a payment information record for a checkout. The model is a direct representation of the ApplePayPayment object. You can use the `serializeJson()` method to convert the model to a JSON string which can be send to the PAYONE Commerce Platform.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;

// receive json as a string from the client with your favorite networking library or server framework
/** @var string */
$json = getJsonStringFromRequestSomehow();
$applePayPayment = BaseApiClient::deserializeJson($json, ApplePayPayment::class);
```

You can use the `PayoneCommercePlatform\Sdk\Transformer\ApplePayTransformer` to map an `ApplePayPayment` to a `MobilePaymentMethodSpecificInput` which can be used for payment executions or order requests. The transformer has a static method `transformApplePayPaymentToMobilePaymentMethodSpecificInput()` which takes an `ApplePayPayment` and returns a `MobilePaymentMethodSpecificInput`. The transformer does not check if the reponse is complete, if anything is missing the field will be set to `null`.

```php
<?php

use PayoneCommercePlatform\Sdk\Transformer\ApplePayTransformer;

$mobilePaymentMethodSpecificInput = ApplePayTransformer::transformApplePayPaymentToMobilePaymentMethodSpecificInput($applePayPayment);
```

## Demo App

This repo contains a demo app that showcases how to implement common use cases, like a [Step-by-Step Checkout](https://docs.payone.com/pcp/checkout-flows/step-by-step-checkout) and an [One-Stop-Checkout](https://docs.payone.com/pcp/checkout-flows/one-step-checkout). For each use case the demo app contains a protected method in the top level class `DemoApp`. You can run the app to execute the code within in the sandbox API. This is a good way to test, if your setup is correct.

Before running the app ensure you have run `composer install` and `composer dumb-autoload` within the demo app directory (`./examples/demo-app`). By default all API calls are send to the pre-production environment of the PAYONE Commerce Platform. Note that the created entities can't deleted completely.

You can run it within the demo app directory via `php src/DemoApp.php`, make sure to provide all necessary environment variables:
1. `API_KEY` a valid api key for the PAYONE Commerce Platform
1. `API_SECRET` a valid api secret for the PAYONE Commerce Platform
1. `MERCHANT_ID` the merchant id which is needed to identify entities, e.g. commerce cases and checkouts, that belong to you.

[Jump to the demo app](./examples/demo-app/src/DemoApp.php)


## API Reference

All contents of this SDK are availble under the namespace `PayoneCommercePlatform\Sdk`. The SDK groups the endpoints of every resource into its own client, e.g. the `PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient` can be used to interact with a checkout. To instantiate a singular client a `PayoneCommercePlatform\Sdk\CommunicatorConfiguration` instance has to provided which at least needs an API Key and Secret to connect to PAYONE Commerce Platform. The reponses and requests as well as their contained objects are provided as PHP classes and enums within the `PayoneCommercePlatform\Sdk\Models` namespace.

### CommunicatorConfiguration
The CommunicatorConfiguration class is responsible for configuring the connection to the PAYONE Commerce Platform. This class holds essential information such as API keys, host URLs, and metadata required to authenticate and interact with the platform's API. Its needed as configuration to interact with any of the resources. Ensure that the API key and secret are securely stored and only passed to the configuration instance when needed.

#### Setup your configuration

To create a configuration object `apiKey` and `apiSecret` are required. You can use `CommunicatorConfiguration::getPredefinedHosts()` to get information about different environments of the PAYONE Commerce Platform. Currently `prod` and `preprod` are available. You should also provide an integrator as a `string`, this helps us in debugging and monitoring process.

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

You shouldn't need to provide `serverMetaInfo`. This property can automatically be detected. and will send your OS, PHP Version and SDK to the PCP for debugging purposes.

#### Constants

**`SDK_VERSION`**  
*Description*: The version of the SDK.
*type*: `string`

#### Methods

##### `__construct`

```php
public function __construct(
    string $apiKey,
    string $apiSecret,
    ?string $host = null,
    ?string $integrator = null,
    ?array $serverMetaInfo = null,
    ?array $clientMetaInfo = null
)
```

**Description**:  
Constructor to initialize the configuration with required and optional parameters.

**Parameters**:
- `string $apiKey`: The API key for authentication.
- `string $apiSecret`: The API secret for authentication.
- `string|null $host`: The host URL for the PAYONE Commerce Platform API. Defaults to the production URL if not provided.
- `string|null $integrator`: Information about the integrator using the SDK.
- `array|null $serverMetaInfo`: Metadata about the server environment.
- `array|null $clientMetaInfo`: Metadata about the client environment.

##### `setApiKey`

```php
public function setApiKey(string $apiKey): self
```

**Description**:  
Sets the API key.

**Parameters**:
- `string $apiKey`: The API key for authentication.

**Returns**:  
`self`

##### `getApiKey`

```php
public function getApiKey(): string
```

**Description**:  
Gets the API key.

**Returns**:  
`string` - The API key.

##### `setApiSecret`

```php
public function setApiSecret(string $apiSecret): self
```

**Description**:  
Sets the API secret.

**Parameters**:
- `string $apiSecret`: The API secret for authentication.

**Returns**:  
`self`

##### `getApiSecret`

```php
public function getApiSecret(): string
```

**Description**:  
Gets the API secret.

**Returns**:  
`string` - The API secret.

##### `getIntegrator`

```php
public function getIntegrator(): ?string
```

**Description**:  
Gets the integrator information.

**Returns**:  
`string|null` - The integrator information, or `null` if not set.

##### `setIntegrator`

```php
public function setIntegrator(?string $integrator): self
```

**Description**:  
Sets the integrator information.

**Parameters**:
- `string|null $integrator`: The integrator information.

**Returns**:  
`self`

##### `setHost`

```php
public function setHost(string $host): self
```

**Description**:  
Sets the host URL. Automatically removes any trailing slash from the provided URL.

**Parameters**:
- `string $host`: The host URL for the PAYONE Commerce Platform API.

**Returns**:  
`self`

##### `getHost`

```php
public function getHost(): string
```

**Description**:  
Gets the host URL.

**Returns**:  
`string` - The host URL.

##### `getClientMetaInfo`

```php
public function getClientMetaInfo(): array
```

**Description**:  
Gets the client metadata information.

**Returns**:  
`array<string, string>` - The client metadata information.

##### `setClientMetaInfo`

```php
public function setClientMetaInfo(array $clientMetaInfo): self
```

**Description**:  
Sets the client metadata information.

**Parameters**:
- `array<string, string> $clientMetaInfo`: The client metadata information.

**Returns**:  
`self`

##### `addClientMetaInfo`

```php
public function addClientMetaInfo(string $key, string $value): self
```

**Description**:  
Adds an entry to the client metadata information.

**Parameters**:
- `string $key`: The key for the metadata entry.
- `string $value`: The value for the metadata entry.

**Returns**:  
`self`

##### `getServerMetaInfo`

```php
public function getServerMetaInfo(): array
```

**Description**:  
Gets the server metadata information.

**Returns**:  
`array<string, string>` - The server metadata information.

##### `setServerMetaInfo`

```php
public function setServerMetaInfo(array $serverMetaInfo): self
```

**Description**:  
Sets the server metadata information.

**Parameters**:
- `array<string, string> $serverMetaInfo`: The server metadata information.

**Returns**:  
`self`

##### `addServerMetaInfo`

```php
public function addServerMetaInfo(string $key, string $value): self
```

**Description**:  
Adds an entry to the server metadata information.

**Parameters**:
- `string $key`: The key for the metadata entry.
- `string $value`: The value for the metadata entry.

**Returns**:  
`self`

##### `getPredefinedHosts`

```php
public static function getPredefinedHosts(): array
```

**Description**:  
Gets an array of predefined host settings for the PAYONE Commerce Platform.

**Returns**:  
`array<string, array{url: string, description: string}>` - An array of predefined host settings.

### Queries

For the `getCommerceCases()` and `getCheckouts()` you set the query parameter by passing a `PayoneCommercePlatform\Sdk\Models\GetCommerceCasesQuery` or `PayoneCommercePlatform\Sdk\Models\GetCheckoutsQuery` respectively. These objects have typed properties which can be set to filter the results. The conversion from the object to a query string is done automatically by the SDK.

#### GetCommerceCasesQuery

The properties are directly mapped to the query parameters of the [commerce case API](https://docs.payone.com/pcp/commerce-platform-api#tag/CommerceCase/operation/getCommerceCases)

The `GetCommerceCasesQuery` class is used to build and structure query parameters when fetching commerce cases via the PAYONE Commerce Platform API. It allows you to filter and limit the results by various criteria such as date range, merchant details, checkout status, and payment channels.

##### `offset`
- **Type**: `int|null`
- **Description**: The offset of the first item in the result set. This is used for pagination.
- **Setter**: `public function setOffset(?int $offset): self`
- **Getter**: `public function getOffset(): ?int`

##### `size`
- **Type**: `int|null`
- **Description**: The maximum number of items to return in the result set. This is used for pagination.
- **Setter**: `public function setSize(?int $size): self`
- **Getter**: `public function getSize(): ?int`

##### `fromDate`
- **Type**: `DateTime|null`
- **Description**: The start date for filtering commerce cases.
- **Setter**: `public function setFromDate(?DateTime $fromDate): self`
- **Getter**: `public function getFromDate(): ?DateTime`

##### `toDate`
- **Type**: `DateTime|null`
- **Description**: The end date for filtering commerce cases.
- **Setter**: `public function setToDate(?DateTime $toDate): self`
- **Getter**: `public function getToDate(): ?DateTime`

##### `commerceCaseId`
- **Type**: `string|null`
- **Description**: The unique identifier for a commerce case.
- **Setter**: `public function setCommerceCaseId(?string $commerceCaseId): self`
- **Getter**: `public function getCommerceCaseId(): ?string`

##### `merchantReference`
- **Type**: `string|null`
- **Description**: A reference identifier provided by the merchant.
- **Setter**: `public function setMerchantReference(?string $merchantReference): self`
- **Getter**: `public function getMerchantReference(): ?string`

##### `merchantCustomerId`
- **Type**: `string|null`
- **Description**: The unique identifier of the customer as provided by the merchant.
- **Setter**: `public function setMerchantCustomerId(?string $merchantCustomerId): self`
- **Getter**: `public function getMerchantCustomerId(): ?string`

##### `includeCheckoutStatus`
- **Type**: `array<StatusCheckout>|null`
- **Description**: An array of `StatusCheckout` enums to filter commerce cases by checkout status.
- **Setter**: `public function setIncludeCheckoutStatus(?array $includeCheckoutStatus): self`
- **Getter**: `public function getIncludeCheckoutStatus(): ?array`

##### `includePaymentChannel`
- **Type**: `array<PaymentChannel>|null`
- **Description**: An array of `PaymentChannel` enums to filter commerce cases by payment channels.
- **Setter**: `public function setIncludePaymentChannel(?array $includePaymentChannel): self`
- **Getter**: `public function getIncludePaymentChannel(): ?array`

#### GetCheckoutsQuery

The properties are directly mapped to the query parameters of the [checkout API](https://docs.payone.com/pcp/commerce-platform-api#tag/Checkout/operation/getCheckouts)

The `GetCheckoutsQuery` class is used to build and structure query parameters when fetching checkout data via the PAYONE Commerce Platform API. It allows you to filter and limit the results by various criteria such as date range, amounts, merchant details, checkout statuses, and payment channels.

##### `offset`
- **Type**: `int|null`
- **Description**: The offset of the first item in the result set. This is used for pagination.
- **Setter**: `public function setOffset(?int $offset): self`
- **Getter**: `public function getOffset(): ?int`

##### `size`
- **Type**: `int|null`
- **Description**: The maximum number of items to return in the result set. This is used for pagination.
- **Setter**: `public function setSize(?int $size): self`
- **Getter**: `public function getSize(): ?int`

##### `fromDate`
- **Type**: `DateTime|null`
- **Description**: The start date for filtering checkouts.
- **Setter**: `public function setFromDate(?DateTime $fromDate): self`
- **Getter**: `public function getFromDate(): ?DateTime`

##### `toDate`
- **Type**: `DateTime|null`
- **Description**: The end date for filtering checkouts.
- **Setter**: `public function setToDate(?DateTime $toDate): self`
- **Getter**: `public function getToDate(): ?DateTime`

##### `fromCheckoutAmount`
- **Type**: `int|null`
- **Description**: The minimum checkout amount for filtering.
- **Setter**: `public function setFromCheckoutAmount(?int $fromCheckoutAmount): self`
- **Getter**: `public function getFromCheckoutAmount(): ?int`

##### `toCheckoutAmount`
- **Type**: `int|null`
- **Description**: The maximum checkout amount for filtering.
- **Setter**: `public function setToCheckoutAmount(?int $toCheckoutAmount): self`
- **Getter**: `public function getToCheckoutAmount(): ?int`

##### `fromOpenAmount`
- **Type**: `int|null`
- **Description**: The minimum open amount for filtering.
- **Setter**: `public function setFromOpenAmount(?int $fromOpenAmount): self`
- **Getter**: `public function getFromOpenAmount(): ?int`

##### `toOpenAmount`
- **Type**: `int|null`
- **Description**: The maximum open amount for filtering.
- **Setter**: `public function setToOpenAmount(?int $toOpenAmount): self`
- **Getter**: `public function getToOpenAmount(): ?int`

##### `fromCollectedAmount`
- **Type**: `int|null`
- **Description**: The minimum collected amount for filtering.
- **Setter**: `public function setFromCollectedAmount(?int $fromCollectedAmount): self`
- **Getter**: `public function getFromCollectedAmount(): ?int`

##### `toCollectedAmount`
- **Type**: `int|null`
- **Description**: The maximum collected amount for filtering.
- **Setter**: `public function setToCollectedAmount(?int $toCollectedAmount): self`
- **Getter**: `public function getToCollectedAmount(): ?int`

##### `fromCancelledAmount`
- **Type**: `int|null`
- **Description**: The minimum cancelled amount for filtering.
- **Setter**: `public function setFromCancelledAmount(?int $fromCancelledAmount): self`
- **Getter**: `public function getFromCancelledAmount(): ?int`

##### `toCancelledAmount`
- **Type**: `int|null`
- **Description**: The maximum cancelled amount for filtering.
- **Setter**: `public function setToCancelledAmount(?int $toCancelledAmount): self`
- **Getter**: `public function getToCancelledAmount(): ?int`

##### `fromRefundAmount`
- **Type**: `int|null`
- **Description**: The minimum refund amount for filtering.
- **Setter**: `public function setFromRefundAmount(?int $fromRefundAmount): self`
- **Getter**: `public function getFromRefundAmount(): ?int`

##### `toRefundAmount`
- **Type**: `int|null`
- **Description**: The maximum refund amount for filtering.
- **Setter**: `public function setToRefundAmount(?int $toRefundAmount): self`
- **Getter**: `public function getToRefundAmount(): ?int`

##### `fromChargebackAmount`
- **Type**: `int|null`
- **Description**: The minimum chargeback amount for filtering.
- **Setter**: `public function setFromChargebackAmount(?int $fromChargebackAmount): self`
- **Getter**: `public function getFromChargebackAmount(): ?int`

##### `toChargebackAmount`
- **Type**: `int|null`
- **Description**: The maximum chargeback amount for filtering.
- **Setter**: `public function setToChargebackAmount(?int $toChargebackAmount): self`
- **Getter**: `public function getToChargebackAmount(): ?int`

##### `checkoutId`
- **Type**: `string|null`
- **Description**: The unique identifier of the checkout.
- **Setter**: `public function setCheckoutId(?string $checkoutId): self`
- **Getter**: `public function getCheckoutId(): ?string`

##### `merchantReference`
- **Type**: `string|null`
- **Description**: A reference identifier provided by the merchant.
- **Setter**: `public function setMerchantReference(?string $merchantReference): self`
- **Getter**: `public function getMerchantReference(): ?string`

##### `merchantCustomerId`
- **Type**: `string|null`
- **Description**: The unique identifier of the customer as provided by the merchant.
- **Setter**: `public function setMerchantCustomerId(?string $merchantCustomerId): self`
- **Getter**: `public function getMerchantCustomerId(): ?string`

##### `includePaymentProductId`
- **Type**: `array<string>|null`
- **Description**: An array of payment product IDs to include in the search.
- **Setter**: `public function setIncludePaymentProductId(?array $includePaymentProductId): self`
- **Getter**: `public function getIncludePaymentProductId(): ?array`

##### `includeCheckoutStatus`
- **Type**: `array<StatusCheckout>|null`
- **Description**: An array of `StatusCheckout` enums to filter checkouts by status.
- **Setter**: `public function setIncludeCheckoutStatus(?array $includeCheckoutStatus): self`
- **Getter**: `public function getIncludeCheckoutStatus(): ?array`

##### `includeExtendedCheckoutStatus`
- **Type**: `array<ExtendedCheckoutStatus>|null`
- **Description**: An array of `ExtendedCheckoutStatus` enums to filter checkouts by extended status.
- **Setter**: `public function setIncludeExtendedCheckoutStatus(?array $includeExtendedCheckoutStatus): self`
- **Getter**: `public function getIncludeExtendedCheckoutStatus(): ?array`

##### `includePaymentChannel`
- **Type**: `array<PaymentChannel>|null`
- **Description**: An array of `PaymentChannel` enums to filter checkouts by payment channel.
- **Setter**: `public function setIncludePaymentChannel(?array $includePaymentChannel): self`
- **Getter**: `public function getIncludePaymentChannel(): ?array`

##### `paymentReference`
- **Type**: `string|null`
- **Description**: The payment reference for filtering.
- **Setter**: `public function setPaymentReference(?string $paymentReference): self`
- **Getter**: `public function getPaymentReference(): ?string`

##### `paymentId`
- **Type**: `string|null`
- **Description**: The payment ID for filtering.
- **Setter**: `public function setPaymentId(?string $paymentId): self`
- **Getter**: `public function getPaymentId(): ?string`

##### `firstName`
- **Type**: `string|null`
- **Description**: The first name of the customer for filtering.
- **Setter**: `public function setFirstName(?string $firstName): self`
- **Getter**: `public function getFirstName(): ?string`

##### `surname`
- **Type**: `string|null`
- **Description**: The surname of the customer for filtering.
- **Setter**: `public function setSurname(?string $surname): self`
- **Getter**: `public function getSurname(): ?string`

##### `email`
- **Type**: `string|null`
- **Description**: The email of the customer for filtering.
- **Setter**: `public function setEmail(?string $email): self`
- **Getter**: `public function getEmail(): ?string`

##### `phoneNumber`
- **Type**: `string|null`
- **Description**: The phone number of the customer for filtering.
- **Setter**: `public function setPhoneNumber(?string $phoneNumber): self`
- **Getter**: `public function getPhoneNumber(): ?string`

##### `dateOfBirth`
- **Type**: `string|null`
- **Description**: The date of birth of the customer for filtering.
- **Setter**: `public function setDateOfBirth(?string $dateOfBirth): self`
- **Getter**: `public function getDateOfBirth(): ?string`

##### `companyInformation`
- **Type**: `string|null`
- **Description**: The company information for filtering.
- **Setter**: `public function setCompanyInformation(?string $companyInformation): self`
- **Getter**: `public function getCompanyInformation(): ?string`


### API Clients

There's a API client class for each resource:

1. [`PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient`](#CheckoutApiClient)
1. [`PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient`](#CommerceCaseApiClient)
1. [`PayoneCommercePlatform\Sdk\ApiClient\OrderManagementCheckoutActionsApiClient`](#OrderManagementCheckoutActionsApiClient)
1. [`PayoneCommercePlatform\Sdk\ApiClient\PaymentExecutionApiClient`](#PaymentExecutionApiClient)
1. [`PayoneCommercePlatform\Sdk\ApiClient\PaymentInformationApiClient`](#PaymentInformationApiClient)

#### BaseApiClient

All clients inherit from `PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient`. You may want to use its static methods to serialize and deserialize JSON strings to models from this SDK. The respective methods `serializeJson()` and `deserializeJson()` are available on every client class as static methods as well. Note that these methods have undefined behavior when used with classes that are not part of this SDK.

##### Static Methods

###### `deserializeJson`

**Description**:  
A generic function that deserializes a JSON string into an instance of the specified class type.

**Parameters**:
- `string $data`: The JSON string to deserialize.
- `class-string<T>`: The fully qualified class name of the type to deserialize the JSON string into.

**Returns**:  
- `T` - An instance of the specified class type

**Exceptions**:

- `NotEncodableValueException`
- `UnexpectedValueException`

###### `serializeJson`

**Description**:
Serializes an object or array into a JSON string. The method ensures that empty objects are serialized as `'{}'` rather than `'[]'`. Any property that itself maybe a model from the `PayoneCommercePlatform\Sdk\Models` namespace or an array of models is resursively serialized. T

**Parameters**:
- `mixed $data`: The data to be serialized into a JSON string.

**Returns**:
`string`: A JSON string representing the input data.

#### CheckoutApiClient

The `CheckoutApiClient` class provides methods to interact with the Checkout resource of the PAYONE Commerce Platform API. This includes creating, updating, retrieving, and deleting checkouts within a commerce case.

You can create a `CheckoutApiClient` by providing a `CommunicatorConfiguration`. [All endpoints](https://docs.payone.com/pcp/commerce-platform-api#tag/Checkout) are directly exposed as methods on the instance.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient;

$config = new CommunicatorConfiguration('API_KEY', 'API_SECRET');
$client = new CheckoutApiClient($config);
```

##### Methods

###### `createCheckout`

```php
public function createCheckout(
    string $merchantId,
    string $commerceCaseId,
    CreateCheckoutRequest $createCheckoutRequest
): CreateCheckoutResponse
```

**Description**:  
Creates a new checkout within an existing commerce case.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant. A Checkout is associated with exactly one merchant.
- `string $commerceCaseId`: The unique identifier of a commerce case.
- `CreateCheckoutRequest $createCheckoutRequest`: The request body containing details for creating the checkout.

**Returns**:  
`CreateCheckoutResponse` - The response object containing details of the created checkout.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `deleteCheckout`

```php
public function deleteCheckout(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId
): void
```

**Description**:  
Deletes an existing checkout.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a commerce case.
- `string $checkoutId`: The unique identifier of the checkout to be deleted.

**Returns**:  
`void`

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `getCheckout`

```php
public function getCheckout(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId
): CheckoutResponse
```

**Description**:  
Retrieves details of a specific checkout.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a commerce case.
- `string $checkoutId`: The unique identifier of the checkout to retrieve.

**Returns**:  
`CheckoutResponse` - The response object containing details of the retrieved checkout.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `getCheckouts`

```php
public function getCheckouts(
    string $merchantId,
    GetCheckoutsQuery $query = new GetCheckoutsQuery()
): CheckoutsResponse
```

**Description**:  
Retrieves a list of checkouts based on the provided search parameters.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `GetCheckoutsQuery $query`: The query parameters used to filter the checkouts.

**Returns**:  
`CheckoutsResponse` - The response object containing a list of checkouts that match the search parameters.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `updateCheckout`

```php
public function updateCheckout(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    PatchCheckoutRequest $patchCheckoutRequest
): void
```

**Description**:  
Modifies an existing checkout.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a commerce case.
- `string $checkoutId`: The unique identifier of the checkout to be updated.
- `PatchCheckoutRequest $patchCheckoutRequest`: The request body containing the modifications to be applied to the checkout.

**Returns**:  
`void`

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

#### CommerceCaseApiClient

The `CommerceCaseApiClient` class provides methods to interact with the Commerce Case resource of the PAYONE Commerce Platform API. This includes creating, updating, retrieving, and searching commerce cases.

You can create a `CommerceCaseApiClient` by providing a `CommunicatorConfiguration`. [All endpoints](https://docs.payone.com/pcp/commerce-platform-api#tag/CommerceCase) are directly exposed as methods on the instance.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;

$config = new CommunicatorConfiguration('API_KEY', 'API_SECRET');
$client = new CommerceCaseApiClient($config);
```

##### Methods

###### `createCommerceCase`

```php
public function createCommerceCase(
    string $merchantId,
    CreateCommerceCaseRequest $createCommerceCaseRequest
): CreateCommerceCaseResponse
```

**Description**:  
Creates a new commerce case for a specified merchant.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant. A Commerce Case is associated with exactly one merchant.
- `CreateCommerceCaseRequest $createCommerceCaseRequest`: The request body containing details for creating the commerce case.

**Returns**:  
`CreateCommerceCaseResponse` - The response object containing details of the created commerce case.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `getCommerceCase`

```php
public function getCommerceCase(
    string $merchantId,
    string $commerceCaseId
): CommerceCaseResponse
```

**Description**:  
Retrieves details of a specific commerce case.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of the commerce case to retrieve.

**Returns**:  
`CommerceCaseResponse` - The response object containing details of the retrieved commerce case.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `getCommerceCases`

```php
public function getCommerceCases(
    string $merchantId,
    GetCommerceCasesQuery $query = new GetCommerceCasesQuery()
): array
```

**Description**:  
Retrieves a list of commerce cases based on the provided search parameters.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `GetCommerceCasesQuery $query`: The query parameters used to filter the commerce cases.

**Returns**:  
`array<CommerceCaseResponse>` - An array of `CommerceCaseResponse` objects representing the retrieved commerce cases.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `updateCommerceCase`

```php
public function updateCommerceCase(
    string $merchantId,
    string $commerceCaseId,
    Customer $customer
): void
```

**Description**:  
Updates an existing commerce case with new customer information.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of the commerce case to update.
- `Customer $customer`: The customer data to update in the commerce case.

**Returns**:  
`void`

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

#### OrderManagementCheckoutActionsApiClient

The `OrderManagementCheckoutActionsApiClient` class provides methods to manage orders related to checkouts within a commerce case. This includes operations such as creating, canceling, delivering, and returning orders.

You can create a `OrderManagementCheckoutActionsApiClient` by providing a `CommunicatorConfiguration`. [All endpoints](https://docs.payone.com/pcp/commerce-platform-api#tag/OrderManagementCheckoutActions) are directly exposed as methods on the instance.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\OrderManagementCheckoutActionsApiClient;

$config = new CommunicatorConfiguration('API_KEY', 'API_SECRET');
$client = new OrderManagementCheckoutActionsApiClient($config);
```

##### Methods

###### `cancelOrder`

```php
public function cancelOrder(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    ?CancelRequest $cancelRequest = null
): CancelResponse
```

**Description**:  
Marks items of a Checkout as canceled and automatically cancels the payment associated with those items.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant. A Checkout is associated with exactly one merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `CancelRequest|null $cancelRequest`: The request body containing details for the cancellation (optional).

**Returns**:  
`CancelResponse` - The response object containing details of the canceled order.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `createOrder`

```php
public function createOrder(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    OrderRequest $orderRequest
): OrderResponse
```

**Description**:  
Creates an order that will automatically execute a payment.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant. A Checkout is associated with exactly one merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `OrderRequest $orderRequest`: The request body containing details for creating the order.

**Returns**:  
`OrderResponse` - The response object containing details of the created order.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `deliverOrder`

```php
public function deliverOrder(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    DeliverRequest $deliverRequest
): DeliverResponse
```

**Description**:  
Marks items of a Checkout as delivered and automatically captures the payment associated with those items.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant. A Checkout is associated with exactly one merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `DeliverRequest $deliverRequest`: The request body containing details for delivering the order.

**Returns**:  
`DeliverResponse` - The response object containing details of the delivered order.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `returnOrder`

```php
public function returnOrder(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    ?ReturnRequest $returnRequest = null
): ReturnResponse
```

**Description**:  
Marks items of a Checkout as returned and automatically refunds the payment associated with those items.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant. A Checkout is associated with exactly one merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `ReturnRequest|null $returnRequest`: The request body containing details for the return (optional).

**Returns**:  
`ReturnResponse` - The response object containing details of the returned order.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

#### PaymentExecutionApiClient

The `PaymentExecutionApiClient` class provides methods to manage the execution of payments within a commerce case. This includes operations such as creating, canceling, capturing, completing, and refunding payments.

You can create a `PaymentExecutionApiClient` by providing a `CommunicatorConfiguration`. [All endpoints](https://docs.payone.com/pcp/commerce-platform-api#tag/PaymentExecution) are directly exposed as methods on the instance.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\PaymentExecutionApiClient;

$config = new CommunicatorConfiguration('API_KEY', 'API_SECRET');
$client = new PaymentExecutionApiClient($config);
```

##### Methods

####### `cancelPaymentExecution`

```php
public function cancelPaymentExecution(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    string $paymentExecutionId,
    CancelPaymentRequest $cancelPaymentRequest
): CancelPaymentResponse
```

**Description**:  
Cancels a payment that has been previously executed.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `string $paymentExecutionId`: The unique identifier of a payment execution.
- `CancelPaymentRequest $cancelPaymentRequest`: The request body containing details for the payment cancellation.

**Returns**:  
`CancelPaymentResponse` - The response object containing details of the canceled payment.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `capturePaymentExecution`

```php
public function capturePaymentExecution(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    string $paymentExecutionId,
    CapturePaymentRequest $capturePaymentRequest
): CapturePaymentResponse
```

**Description**:  
Captures a payment that has been authorized but not yet captured.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `string $paymentExecutionId`: The unique identifier of a payment execution.
- `CapturePaymentRequest $capturePaymentRequest`: The request body containing details for the payment capture.

**Returns**:  
`CapturePaymentResponse` - The response object containing details of the captured payment.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `completePayment`

```php
public function completePayment(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    string $paymentExecutionId,
    CompletePaymentRequest $completePaymentRequest
): CompletePaymentResponse
```

**Description**:  
Completes a payment that has been partially processed or requires finalization.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `string $paymentExecutionId`: The unique identifier of a payment execution.
- `CompletePaymentRequest $completePaymentRequest`: The request body containing details for completing the payment.

**Returns**:  
`CompletePaymentResponse` - The response object containing details of the completed payment.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `createPayment`

```php
public function createPayment(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    PaymentExecutionRequest $paymentExecutionRequest
): CreatePaymentResponse
```

**Description**:  
Creates a new payment execution for a checkout.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `PaymentExecutionRequest $paymentExecutionRequest`: The request body containing details for the payment execution.

**Returns**:  
`CreatePaymentResponse` - The response object containing details of the created payment execution.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `refundPaymentExecution`

```php
public function refundPaymentExecution(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    string $paymentExecutionId,
    RefundRequest $refundRequest
): RefundPaymentResponse
```

**Description**:  
Refunds a payment that has been previously captured.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `string $paymentExecutionId`: The unique identifier of a payment execution.
- `RefundRequest $refundRequest`: The request body containing details for the payment refund.

**Returns**:  
`RefundPaymentResponse` - The response object containing details of the refunded payment.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

#### PaymentInformationApiClient

The `PaymentInformationApiClient` class provides methods to create and retrieve payment information associated with a commerce case and a checkout.

You can create a `PaymentInformationApiClient` by providing a `CommunicatorConfiguration`. [All endpoints](https://docs.payone.com/pcp/commerce-platform-api#tag/PaymentInformation) are directly exposed as methods on the instance.

```php
<?php

use PayoneCommercePlatform\Sdk\ApiClient\PaymentInformationApiClient;

$config = new CommunicatorConfiguration('API_KEY', 'API_SECRET');
$client = new PaymentInformationApiClient($config);
```

##### Methods

###### `createPaymentInformation`

```php
public function createPaymentInformation(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    PaymentInformationRequest $paymentInformationRequest
): PaymentInformationResponse
```

**Description**:  
Creates a new payment information record associated with a specific checkout.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `PaymentInformationRequest $paymentInformationRequest`: The request body containing details for creating the payment information.

**Returns**:  
`PaymentInformationResponse` - The response object containing details of the created payment information.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

###### `getPaymentInformation`

```php
public function getPaymentInformation(
    string $merchantId,
    string $commerceCaseId,
    string $checkoutId,
    string $paymentInformationId
): PaymentInformationResponse
```

**Description**:  
Retrieves details of an existing payment information record associated with a specific checkout.

**Parameters**:
- `string $merchantId`: The unique identifier of the merchant.
- `string $commerceCaseId`: The unique identifier of a Commerce Case.
- `string $checkoutId`: The unique identifier of a Checkout.
- `string $paymentInformationId`: The unique identifier of the payment information.

**Returns**:  
`PaymentInformationResponse` - The response object containing details of the payment information.

**Exceptions**:
- `ApiErrorResponseException`
- `ApiResponseRetrievalException`

## Contributing

We welcome contributions from the community. If you want to contribute, please follow these steps:

1. Fork the repository.
1. Create a new branch (`git checkout -b feature-branch`).
1. Make your changes.
1. Commit your changes (`git commit -am 'Add new feature'`).
1. Push to the branch (`git push origin feature-branch`).
1. Create a new Pull Request.

Please make sure to follow the coding standards and write appropriate tests for your changes. You can run `composer run-script lint` to check for potential errors with `phpstan`. Use `composer run-script format` to ensure you're code is formatted consistently. To run tests run `composer run-script test`

## Development

Ensure you have PHP 8.2 or higher installed. You will need [composer](https://getcomposer.org/) and [xdebug](https://xdebug.org/docs/install). An pretty version of the coverage report can will be placed in `coverage`, after running `composer run-script coverage-report`.

### Structure of this repository

This repository consists out of the following components:

1. The source code of the SDK itself: `/src`
2. The source code of the unit and integration tests (including the examples): `/tests`
3. The source code for demos is located `examples/*`. Make sure to run `composer install` and `composer dumb-autoload` before. Within the specific demo before launching it.

### Release

This SDK follows semver for versioning. To relase a new version create a branch `release/X.Y.Z` and run `prepare_release.sh X.Y.Z`. The script automatically replaces the `SDK_VERSION` property within the `CommunicatorConfiguration` class and version field in the root `composer.json` file. After that it commits the changes and tags the commit as `vX.Y.Z`.

This branch should then merged into `develop` and immediately into `main` after that.
