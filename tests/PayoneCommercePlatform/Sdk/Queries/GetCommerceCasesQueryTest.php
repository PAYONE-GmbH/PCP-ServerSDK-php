<?php

namespace PayoneCommercePlatform\Sdk\Queries;

use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\StatusCheckout;
use PHPUnit\Framework\TestCase;
use DateTime;

class GetCommerceCasesQueryTest extends TestCase
{
    public function testToQueryMap(): void
    {
        /** @var GetCommerceCasesQuery */
        $query = new GetCommerceCasesQuery();
        $query->setOffset(1);
        $query->setSize(10);
        $query->setFromDate(new DateTime("2021-01-01"));
        $query->setToDate(new DateTime("2021-01-31"));
        $query->setCommerceCaseId("123456");
        $query->setMerchantReference("7890");
        $query->setMerchantCustomerId("1234");
        $query->setIncludeCheckoutStatus([StatusCheckout::BILLED, StatusCheckout::CHARGEBACKED]);
        $query->setIncludePaymentChannel([PaymentChannel::ECOMMERCE, PaymentChannel::POS]);

        $queryMap = $query->toQueryMap();
        $this->assertEquals("1", $queryMap["offset"]);
        $this->assertEquals("10", $queryMap["size"]);
        $this->assertEquals("2021-01-01T00:00:00+00:00", $queryMap["fromDate"]);
        $this->assertEquals("2021-01-31T00:00:00+00:00", $queryMap["toDate"]);
        $this->assertEquals("123456", $queryMap["commerceCaseId"]);
        $this->assertEquals("7890", $queryMap["merchantReference"]);
        $this->assertEquals("1234", $queryMap["merchantCustomerId"]);
        $this->assertEquals("BILLED,CHARGEBACKED", $queryMap["includeCheckoutStatus"]);
        $this->assertEquals("ECOMMERCE,POS", $queryMap["includePaymentChannel"]);
    }

    public function testGetters(): void
    {
        /** @var GetCommerceCasesQuery */
        $query = new GetCommerceCasesQuery();
        $query->setOffset(1);
        $query->setSize(10);
        $query->setFromDate(new DateTime("2021-01-01"));
        $query->setToDate(new DateTime("2021-01-31"));
        $query->setCommerceCaseId("123456");
        $query->setMerchantReference("7890");
        $query->setMerchantCustomerId("1234");
        $query->setIncludeCheckoutStatus([StatusCheckout::BILLED, StatusCheckout::CHARGEBACKED]);
        $query->setIncludePaymentChannel([PaymentChannel::ECOMMERCE, PaymentChannel::POS]);

        $this->assertEquals(1, $query->getOffset());
        $this->assertEquals(10, $query->getSize());
        $this->assertEquals(new DateTime("2021-01-01"), $query->getFromDate());
        $this->assertEquals(new DateTime("2021-01-31"), $query->getToDate());
        $this->assertEquals("123456", $query->getCommerceCaseId());
        $this->assertEquals("7890", $query->getMerchantReference());
        $this->assertEquals("1234", $query->getMerchantCustomerId());
        $this->assertEquals(
            [StatusCheckout::BILLED, StatusCheckout::CHARGEBACKED],
            $query->getIncludeCheckoutStatus()
        );
        $this->assertEquals([PaymentChannel::ECOMMERCE, PaymentChannel::POS], $query->getIncludePaymentChannel());
    }

    public function testNulls(): void
    {
        /** @var GetCommerceCasesQuery */
        $query = new GetCommerceCasesQuery();
        $queryMap = $query->toQueryMap();

        $this->assertEquals(0, count($queryMap));
    }
}
