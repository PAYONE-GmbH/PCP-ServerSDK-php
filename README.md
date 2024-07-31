# PAYONE Commerce Platform Server SDK PHP

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

- [Requirements](#requirements)
- [Installation](#installation)
- [Demo App](#demo-app)
- [API Reference](#api-reference)
- [CommunicatorConfiguration](#communicatorconfiguration)
  - [Setup your configuration](#setup-your-configuration)
  - [Constants](#constants)
  - [Methods](#methods)
    - [`__construct`](#construct)
    - [`setApiKey`](#setapikey)
    - [`getApiKey`](#getapikey)
    - [`setApiSecret`](#setapisecret)
    - [`getApiSecret`](#getapisecret)
    - [`getIntegrator`](#getintegrator)
    - [`setIntegrator`](#setintegrator)
    - [`setHost`](#sethost)
    - [`getHost`](#gethost)
    - [`getClientMetaInfo`](#getclientmetainfo)
    - [`setClientMetaInfo`](#setclientmetainfo)
    - [`addClientMetaInfo`](#addclientmetainfo)
    - [`getServerMetaInfo`](#getservermetainfo)
    - [`setServerMetaInfo`](#setservermetainfo)
    - [`addServerMetaInfo`](#addservermetainfo)
    - [`getPredefinedHosts`](#getpredefinedhosts)
- [API Clients](#api-clients)
  - [CheckoutApiClient](#checkoutapiclient)
    - [Methods](#methods-1)
      - [`createCheckout`](#createcheckout)
      - [`deleteCheckout`](#deletecheckout)
      - [`getCheckout`](#getcheckout)
      - [`getCheckouts`](#getcheckouts)
      - [`updateCheckout`](#updatecheckout)
  - [CommerceCaseApiClient](#commercecaseapiclient)
    - [Methods](#methods-2)
      - [`createCommerceCase`](#createcommercecase)
      - [`getCommerceCase`](#getcommercecase)
      - [`getCommerceCases`](#getcommercecases)
      - [`updateCommerceCase`](#updatecommercecase)
  - [OrderManagementCheckoutActionsApiClient](#ordermanagementcheckoutactionsapiclient)
    - [Methods](#methods-3)
      - [`cancelOrder`](#cancelorder)
      - [`createOrder`](#createorder)
      - [`deliverOrder`](#deliverorder)
      - [`returnOrder`](#returnorder)
  - [PaymentExecutionApiClient](#paymentexecutionapiclient)
    - [Methods](#methods-4)
      - [`cancelPaymentExecution`](#cancelpaymentexecution)
      - [`capturePaymentExecution`](#capturepaymentexecution)
      - [`completePayment`](#completepayment)
      - [`createPayment`](#createpayment)
      - [`refundPaymentExecution`](#refundpaymentexecution)
  - [PaymentInformationApiClient](#paymentinformationapiclient)
    - [Methods](#methods-5)
      - [`createPaymentInformation`](#createpaymentinformation)
      - [`getPaymentInformation`](#getpaymentinformation)
- [Contributing](#contributing)
- [Development](#development)
- [Structure of this repository](#structure-of-this-repository)

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
        "payone-gmbh/pcp-serversdk-php": "main"
    }
}
```

This snippets specify the main branch which contains the latest release. You can specify a version by inserting a git tag `vX.Y.Z` instead of `main`.

## Demo App

This repo contains a demo app that showcases how to implement a [Step-by-Step Checkout](https://docs.payone.com/pcp/checkout-flows/step-by-step-checkout) and a [One-Stop-Checkout](https://docs.payone.com/pcp/checkout-flows/one-step-checkout).

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

### API Clients

There's a API client class for each resource:

1. [`PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient`](#CheckoutApiClient)
1. [`PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient`](#CommerceCaseApiClient)
1. [`PayoneCommercePlatform\Sdk\ApiClient\OrderManagementCheckoutActionsApiClient`](#OrderManagementCheckoutActionsApiClient)
1. [`PayoneCommercePlatform\Sdk\ApiClient\PaymentExecutionApiClient`](#PaymentExecutionApiClient)
1. [`PayoneCommercePlatform\Sdk\ApiClient\PaymentInformationApiClient`](#PaymentInformationApiClient)

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
