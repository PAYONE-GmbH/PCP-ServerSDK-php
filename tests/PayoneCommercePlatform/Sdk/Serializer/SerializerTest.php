<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\Models\RedirectionData;
use PHPUnit\Framework\TestCase;
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
