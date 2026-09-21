<?php

namespace PayoneCommercePlatform\Sdk\Models;

use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;
use PHPUnit\Framework\TestCase;

class PaymentIntentModelTest extends TestCase
{
    public function testAllOfSchemasUseTheirDeclaredParentModels(): void
    {
        self::assertInstanceOf(CartItemData::class, new CartItemInput());
        self::assertInstanceOf(CreatePaymentIntent::class, new CreatePaymentIntentRequest(new PaymentReferencesForPaymentIntent('reference')));
        self::assertInstanceOf(PaymentIntentResponseData::class, new PaymentIntentOutput());
        self::assertInstanceOf(PaymentIntentResponseData::class, new PaymentIntentResponse());
        self::assertInstanceOf(RedirectPaymentProduct840SpecificInputData::class, new RedirectPaymentProduct840SpecificInput());
        self::assertInstanceOf(AddressPersonal::class, new ShippingAddress());
        self::assertInstanceOf(OrderLineDetailsInput::class, new OrderLineDetailsPatch(100, 1));
        self::assertInstanceOf(OrderLineDetailsInput::class, new OrderLineDetailsResult(100, 1));
        self::assertInstanceOf(PaymentReferences::class, new PaymentReferencesForRefund('reference'));
    }

    public function testInheritedPropertiesSerializeWithChildProperties(): void
    {
        $model = new CreatePaymentIntentRequest(
            references: new PaymentReferencesForPaymentIntent('intent-reference'),
            amountOfMoney: new AmountOfMoney(1337, 'EUR'),
            paymentMethodSpecificInput: new PaymentMethodSpecificInputForIntent(
                new RedirectPaymentMethodSpecificInputForIntent(
                    paymentProductId: 840,
                    paymentProduct840SpecificInput: new RedirectPaymentProduct840SpecificInputData(javaScriptSdkFlow: true),
                ),
            ),
        );

        self::assertSame(
            '{"paymentMethodSpecificInput":{"redirectPaymentMethodSpecificInput":{"paymentProductId":840,"paymentProduct840SpecificInput":{"javaScriptSdkFlow":true}}},"amountOfMoney":{"amount":1337,"currencyCode":"EUR"},"references":{"merchantReference":"intent-reference"}}',
            BaseApiClient::serializeJson($model),
        );
    }

    public function testRedirectPaymentProduct840SpecificInputSerializesPaymentId(): void
    {
        $model = new RedirectPaymentProduct840SpecificInput(paymentId: '3066019730_1');

        self::assertSame(
            '{"paymentId":"3066019730_1"}',
            BaseApiClient::serializeJson($model),
        );
        self::assertSame('3066019730_1', $model->getPaymentId());
    }

    public function testPaymentIntentUsesRequiredReferenceType(): void
    {
        $model = new CreatePaymentIntentRequest(references: new PaymentReferencesForPaymentIntent('intent-reference'));

        self::assertSame('{"references":{"merchantReference":"intent-reference"}}', BaseApiClient::serializeJson($model));
    }

    public function testPayPalOutputModelsMatchTheirDistinctSchemas(): void
    {
        $paymentOutput = new PaymentProduct840SpecificOutput(customerAccount: new PaymentProduct840CustomerAccount(payerId: 'payer'));
        $intentOutput = new PaymentProduct840SpecificOutputForIntent(customerAccount: new PaymentProduct840CustomerAccountForIntent(emailAddress: 'buyer@example.com'));

        self::assertSame('{"customerAccount":{"payerId":"payer"}}', BaseApiClient::serializeJson($paymentOutput));
        self::assertSame('{"customerAccount":{"emailAddress":"buyer@example.com"}}', BaseApiClient::serializeJson($intentOutput));
    }
}
