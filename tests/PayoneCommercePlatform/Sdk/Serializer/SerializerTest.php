<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use _PHPStan_62c6a0a8b\Nette\DI\Definitions\Reference;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\PaymentEvent;
use PayoneCommercePlatform\Sdk\Models\PaymentType;
use PayoneCommercePlatform\Sdk\Models\RedirectData;
use PayoneCommercePlatform\Sdk\Models\RedirectionData;
use PayoneCommercePlatform\Sdk\Models\RedirectPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\RedirectPaymentProduct840SpecificInput;
use PayoneCommercePlatform\Sdk\Models\References;
use PayoneCommercePlatform\Sdk\Models\StatusValue;
use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\Models\AddressPersonal;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\PaymentExecution;

use PayoneCommercePlatform\Sdk\Models\CartItemInput;
use PayoneCommercePlatform\Sdk\Models\CartItemInvoiceData;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\OrderRequest;
use PayoneCommercePlatform\Sdk\Models\ProductType;
use PayoneCommercePlatform\Sdk\Models\OrderLineDetailsInput;
use PayoneCommercePlatform\Sdk\Models\Shipping;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartInput;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;

class SerializerTest extends TestCase
{
  use TestApiClientTrait;

  public function setUp(): void
  {
    $this->initTestConfig();
  }



  public function testDeserializeJson(): void
  {
    $expectedResponse = new RedirectionData(
      returnUrl: 'test'
    );
    // json representation of the applepaypayment response above
    $json = '{
      "returnUrl": "test"
    }';

    $response = BaseApiClient::deserializeJson($json, RedirectionData::class);

    $this->assertEquals($expectedResponse, $response);
  }
}
