<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use PayoneCommercePlatform\Sdk\Models\CancelPaymentRequest;
use PayoneCommercePlatform\Sdk\Models\CancelPaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CancellationReason;
use PayoneCommercePlatform\Sdk\Models\CapturePaymentRequest;
use PayoneCommercePlatform\Sdk\Models\CapturePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CompletePaymentRequest;
use PayoneCommercePlatform\Sdk\Models\CompletePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CustomerDevice;
use PayoneCommercePlatform\Sdk\Models\MerchantAction;
use PayoneCommercePlatform\Sdk\Models\PaymentCreationOutput;
use PayoneCommercePlatform\Sdk\Models\PaymentExecutionRequest;
use PayoneCommercePlatform\Sdk\Models\PaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentReferences;
use PayoneCommercePlatform\Sdk\Models\PaymentResponse;
use PayoneCommercePlatform\Sdk\Models\PaymentStatusOutput;
use PayoneCommercePlatform\Sdk\Models\RedirectData;
use PayoneCommercePlatform\Sdk\Models\RefundOutput;
use PayoneCommercePlatform\Sdk\Models\RefundPaymentResponse;
use PayoneCommercePlatform\Sdk\Models\RefundRequest;
use PayoneCommercePlatform\Sdk\Models\ReturnInformation;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;

class PaymentExecutionApiClientTest extends TestCase
{
    use TestApiClientTrait;
    protected PaymentExecutionApiClient $paymentExecutionClient;

    public function setUp(): void
    {
        $this->initTestConfig();
        $this->paymentExecutionClient = new PaymentExecutionApiClient($this->communicatorConfiguration, $this->httpClient);
    }

    public function testCancelPaymentExecutionSuccessful(): void
    {
        $cancelPaymentResponse = new CancelPaymentResponse(new PaymentResponse());
        $this->httpClient->method('send')->willReturn(new Response(status: 204, body: BaseApiClient::getSerializer()->serialize($cancelPaymentResponse, 'json')));

        $payload = new CancelPaymentRequest(CancellationReason::UNDELIVERABLE);
        $response = $this->paymentExecutionClient->cancelPaymentExecution('1', '2', '3', '4', $payload);

        $this->assertEquals($cancelPaymentResponse, $response);
    }

    public function testCancelPaymentExecutionUnsuccessful400(): void
    {
        $errorReponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorReponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new CancelPaymentRequest(CancellationReason::FRAUDULENT);
        $this->paymentExecutionClient->cancelPaymentExecution('1', '2', '3', '4', $payload);
    }

    public function testCancelPaymentExecutionUnsuccessful500(): void
    {
        $errorReponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new CancelPaymentRequest(CancellationReason::CONSUMER_REQUEST);
        $this->paymentExecutionClient->cancelPaymentExecution('1', '2', '3', '4', $payload);
    }

    public function capturePaymentExecutionSuccessful(): void
    {
        $capturePaymentResponse = new CapturePaymentResponse(statusOutput: new PaymentStatusOutput());
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($capturePaymentResponse, 'json')));

        $payload = new CapturePaymentRequest(amount: 20000, isFinal: true);
        $response = $this->paymentExecutionClient->capturePaymentExecution('1', '2', '3', '4', $payload);
    }

    public function capturePaymentExecutionUnsuccessful400(): void
    {
        $errorReponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorReponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new CapturePaymentRequest(amount: 20000, isFinal: true, cancellationReason: CancellationReason::DUPLICATE);
        $this->paymentExecutionClient->capturePaymentExecution('1', '2', '3', '4', $payload);
    }

    public function capturePaymentExecutionUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new CapturePaymentRequest(amount: 50000, isFinal: true, cancellationReason: CancellationReason::DUPLICATE);
        $this->paymentExecutionClient->capturePaymentExecution('1', '2', '3', '4', $payload);
    }

    public function testCompletePaymentSuccessful(): void
    {
        $completePaymentResponse = new CompletePaymentResponse(payment: new PaymentResponse(id: 'unicorn'));
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($completePaymentResponse, 'json')));

        $payload = new CompletePaymentRequest(device: new CustomerDevice('127.0.0.1', 'token'));
        $response = $this->paymentExecutionClient->completePayment('1', '2', '3', '4', $payload);

        $this->assertEquals($completePaymentResponse, $response);
    }

    public function testCompletePaymentUnsuccessful400(): void
    {
        $errorReponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorReponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new CompletePaymentRequest(device: new CustomerDevice('127.0.0.1', 'token-2'));
        $this->paymentExecutionClient->completePayment('1', '2', '3', '4', $payload);
    }

    public function testCompletePaymentUnsuccessful500(): void
    {
        $errorReponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new CompletePaymentRequest(device: new CustomerDevice('127.0.0.1', 'token-3'));
        $this->paymentExecutionClient->completePayment('1', '2', '3', '4', $payload);
    }

    public function testCreatePaymentSuccessful(): void
    {
        $createPaymentResponse = new CreatePaymentResponse(
            creationOutput: new PaymentCreationOutput('ref-to-something'),
            merchantAction: new MerchantAction('SHOW_FORM', new RedirectData('http://example.com')),
        );
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($createPaymentResponse, 'json')));

        $payload = new PaymentExecutionRequest(new PaymentMethodSpecificInput());
        $response = $this->paymentExecutionClient->createPayment('1', '2', '3', $payload);

        $this->assertEquals($createPaymentResponse, $response);
    }

    public function testCreatePaymentUnsuccessful400(): void
    {
        $errorReponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorReponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new PaymentExecutionRequest(new PaymentMethodSpecificInput());
        $this->paymentExecutionClient->createPayment('1', '2', '3', $payload);
    }

    public function testCreatePaymentUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new PaymentExecutionRequest(new PaymentMethodSpecificInput());
        $this->paymentExecutionClient->createPayment('1', '2', '3', $payload);
    }

    public function testRefundPaymentSuccessful(): void
    {
        $refundPaymentResponse = new RefundPaymentResponse(refundOutput: new RefundOutput(references: new PaymentReferences('test-merchant')));
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($refundPaymentResponse, 'json')));

        $payload = new RefundRequest(return: new ReturnInformation(returnReason: 'test-reason', items: []));
        $response = $this->paymentExecutionClient->refundPaymentExecution('1', '2', '3', '4', $payload);

        $this->assertEquals($refundPaymentResponse, $response);
    }

    public function testRefundPaymentUnsuccessful400(): void
    {
        $errorReponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorReponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);


        $payload = new RefundRequest(return: new ReturnInformation(returnReason: 'test-reason', items: []));
        $this->paymentExecutionClient->refundPaymentExecution('1', '2', '3', '4', $payload);
    }

    public function testRefundPaymentUnsuccessful500(): void
    {
        $errorReponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);


        $payload = new RefundRequest(return: new ReturnInformation(returnReason: 'test-reason', items: []));
        $this->paymentExecutionClient->refundPaymentExecution('1', '2', '3', '4', $payload);
    }
}
