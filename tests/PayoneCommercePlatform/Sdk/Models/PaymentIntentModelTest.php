<?php

namespace PayoneCommercePlatform\Sdk\Models;

use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;
use PHPUnit\Framework\TestCase;

class PaymentIntentModelTest extends TestCase
{
    public function testAllOfSchemasUseTheirDeclaredParentModels(): void
    {
        self::assertInstanceOf(CartItemData::class, new CartItemInput());
        self::assertInstanceOf(CreatePaymentIntent::class, new CreatePaymentIntentRequest());
        self::assertInstanceOf(PaymentIntentResponseData::class, new PaymentIntentOutput());
        self::assertInstanceOf(PaymentIntentResponseData::class, new PaymentIntentResponse());
        self::assertInstanceOf(PaymentProduct840SpecificOutputData::class, new PaymentProduct840SpecificOutput());
        self::assertInstanceOf(PaymentProduct840SpecificOutputData::class, new PaymentProduct840SpecificOutputForIntent());
        self::assertInstanceOf(RedirectPaymentProduct840SpecificInputData::class, new RedirectPaymentProduct840SpecificInput());
        self::assertInstanceOf(AddressPersonal::class, new ShippingAddress());
        self::assertInstanceOf(OrderLineDetailsInput::class, new OrderLineDetailsPatch(100, 1));
        self::assertInstanceOf(OrderLineDetailsInput::class, new OrderLineDetailsResult(100, 1));
        self::assertInstanceOf(PaymentReferences::class, new PaymentReferencesForRefund('reference'));
    }

    public function testInheritedPropertiesSerializeWithChildProperties(): void
    {
        $model = new CreatePaymentIntentRequest(
            amountOfMoney: new AmountOfMoney(1337, 'EUR'),
            paymentMethodSpecificInput: new PaymentMethodSpecificInputForIntent(
                new RedirectPaymentMethodSpecificInputForIntent(
                    paymentProductId: 840,
                    paymentProduct840SpecificInput: new RedirectPaymentProduct840SpecificInputData(javaScriptSdkFlow: true),
                ),
            ),
        );

        self::assertSame(
            '{"paymentMethodSpecificInput":{"redirectPaymentMethodSpecificInput":{"paymentProductId":840,"paymentProduct840SpecificInput":{"javaScriptSdkFlow":true}}},"amountOfMoney":{"amount":1337,"currencyCode":"EUR"}}',
            BaseApiClient::serializeJson($model),
        );
    }
}
