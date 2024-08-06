<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use PayoneCommercePlatform\Sdk\Models\CancelPaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CancelResponse;
use PayoneCommercePlatform\Sdk\Models\CapturePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CartItemInvoiceData;
use PayoneCommercePlatform\Sdk\Models\CartItemResult;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\DeliverRequest;
use PayoneCommercePlatform\Sdk\Models\DeliverResponse;
use PayoneCommercePlatform\Sdk\Models\DeliverType;
use PayoneCommercePlatform\Sdk\Models\OrderLineDetailsResult;
use PayoneCommercePlatform\Sdk\Models\OrderRequest;
use PayoneCommercePlatform\Sdk\Models\OrderResponse;
use PayoneCommercePlatform\Sdk\Models\OrderType;
use PayoneCommercePlatform\Sdk\Models\PaymentOutput;
use PayoneCommercePlatform\Sdk\Models\PaymentReferences;
use PayoneCommercePlatform\Sdk\Models\PaymentResponse;
use PayoneCommercePlatform\Sdk\Models\References;
use PayoneCommercePlatform\Sdk\Models\RefundOutput;
use PayoneCommercePlatform\Sdk\Models\RefundPaymentResponse;
use PayoneCommercePlatform\Sdk\Models\ReturnRequest;
use PayoneCommercePlatform\Sdk\Models\ReturnResponse;
use PayoneCommercePlatform\Sdk\Models\ReturnType;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartResult;
use PayoneCommercePlatform\Sdk\Models\StatusValue;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;

class OrderManagementCheckoutActionsApiClientTest extends TestCase
{
    use TestApiClientTrait;

    private OrderManagementCheckoutActionsApiClient $orderManagementCheckoutActionsApiClient;

    public function setUp(): void
    {
        $this->initTestConfig();
        $this->orderManagementCheckoutActionsApiClient = new OrderManagementCheckoutActionsApiClient($this->communicatorConfiguration, $this->httpClient);
    }

    public function testCancelOrderSuccessful(): void
    {
        $cancelResponse = new CancelResponse(
            cancelPaymentResponse: new CancelPaymentResponse(
                payment: new PaymentResponse(paymentOutput: new PaymentOutput(), status: StatusValue::CREATED)
            ),
        );
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: $this->orderManagementCheckoutActionsApiClient->serializeJson($cancelResponse)));

        $response = $this->orderManagementCheckoutActionsApiClient->cancelOrder('1', '2', '3');

        $this->assertEquals($cancelResponse, $response);
    }

    public function testCancelOrderUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: $this->orderManagementCheckoutActionsApiClient->serializeJson($errorResponse)));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $this->orderManagementCheckoutActionsApiClient->cancelOrder('1', '2', '3');
    }

    public function testCancelOrderUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $this->orderManagementCheckoutActionsApiClient->cancelOrder('1', '2', '3');
    }

    public function testCreateOrderSuccessful(): void
    {
        $orderResponse = new OrderResponse(
            createPaymentResponse: new CreatePaymentResponse(),
            shoppingCart: new ShoppingCartResult(
                items: [
                  new CartItemResult(invoiceData: new CartItemInvoiceData('desc')),
                  new CartItemResult(orderLineDetails: new OrderLineDetailsResult(productPrice: 1340, quantity: 1))
                ]
            )
        );
        $this->httpClient->method('send')->willReturn(new Response(status: 201, body: $this->orderManagementCheckoutActionsApiClient->serializeJson($orderResponse)));

        $payload = new OrderRequest(
            orderReferences: new References('ref'),
            orderType: OrderType::PARTIAL
        );
        $response = $this->orderManagementCheckoutActionsApiClient->createOrder('1', '2', '3', $payload);

        $this->assertEquals($orderResponse, $response);
    }

    public function testCreateOrderUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: $this->orderManagementCheckoutActionsApiClient->serializeJson($errorResponse)));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new OrderRequest(
            orderReferences: new References('ref'),
            orderType: OrderType::PARTIAL
        );
        $this->orderManagementCheckoutActionsApiClient->createOrder('1', '2', '3', $payload);
    }

    public function testCreateOrderUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new OrderRequest(
            orderReferences: new References('ref'),
            orderType: OrderType::PARTIAL
        );
        $this->orderManagementCheckoutActionsApiClient->createOrder('1', '2', '3', $payload);
    }

    public function testDeliverOrderSuccessful(): void
    {
        $deliverResponse = new DeliverResponse(capturePaymentResponse: new CapturePaymentResponse());
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: $this->orderManagementCheckoutActionsApiClient->serializeJson($deliverResponse)));

        $payload = new DeliverRequest(deliverType: DeliverType::PARTIAL, isFinal: false);
        $response = $this->orderManagementCheckoutActionsApiClient->deliverOrder('1', '2', '3', $payload);

        $this->assertEquals($deliverResponse, $response);
    }

    public function testDeliverOrderUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: $this->orderManagementCheckoutActionsApiClient->serializeJson($errorResponse)));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new DeliverRequest(deliverType: DeliverType::PARTIAL, isFinal: false);
        $this->orderManagementCheckoutActionsApiClient->deliverOrder('1', '2', '3', $payload);
    }

    public function testDeliverOrderUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new DeliverRequest(deliverType: DeliverType::PARTIAL, isFinal: false);
        $this->orderManagementCheckoutActionsApiClient->deliverOrder('1', '2', '3', $payload);
    }

    public function testReturnOrderSuccessful(): void
    {
        $returnResponse = new ReturnResponse(
            returnPaymentResponse: new RefundPaymentResponse(
                refundOutput: new RefundOutput(references: new PaymentReferences('ref'))
            )
        );
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: $this->orderManagementCheckoutActionsApiClient->serializeJson($returnResponse)));

        $payload = new ReturnRequest(returnType: ReturnType::PARTIAL, returnReason: 'didnt like it');
        $response = $this->orderManagementCheckoutActionsApiClient->returnOrder('1', '2', '3', $payload);

        $this->assertEquals($returnResponse, $response);
    }

    public function testReturnOrderUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: $this->orderManagementCheckoutActionsApiClient->serializeJson($errorResponse)));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new ReturnRequest(returnType: ReturnType::PARTIAL, returnReason: 'didnt like it');
        $this->orderManagementCheckoutActionsApiClient->returnOrder('1', '2', '3', $payload);
    }

    public function testReturnOrderUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new ReturnRequest(returnType: ReturnType::PARTIAL, returnReason: 'didnt like it');
        $this->orderManagementCheckoutActionsApiClient->returnOrder('1', '2', '3', $payload);
    }
}
