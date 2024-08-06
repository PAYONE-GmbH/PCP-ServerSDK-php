<?php

namespace PayoneCommercePlatform\Sdk\Queries;

use PayoneCommercePlatform\Sdk\Models\StatusCheckout;
use PayoneCommercePlatform\Sdk\Models\ExtendedCheckoutStatus;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PHPUnit\Framework\TestCase;
use DateTime;

class GetCheckoutsQueryTest extends TestCase
{
    public function testToQueryMap(): void
    {
        // arrange
        /** @var GetCheckoutsQuery */
        $query = new GetCheckoutsQuery();
        $query->setOffset(1);
        $query->setSize(10);
        $query->setFromDate(new DateTime("2021-01-01"));
        $query->setToDate(new DateTime("2021-01-31"));
        $query->setFromCheckoutAmount(100);
        $query->setToCheckoutAmount(200);
        $query->setFromOpenAmount(50);
        $query->setToOpenAmount(150);
        $query->setFromCollectedAmount(10);
        $query->setToCollectedAmount(20);
        $query->setFromCancelledAmount(5);
        $query->setToCancelledAmount(15);
        $query->setFromRefundAmount(1);
        $query->setToRefundAmount(2);
        $query->setFromChargebackAmount(100);
        $query->setToChargebackAmount(200);
        $query->setCheckoutId("123456");
        $query->setMerchantReference("7890");
        $query->setMerchantCustomerId("1234");
        $query->setIncludePaymentProductId(["12", "456"]);
        $query->setIncludeCheckoutStatus([StatusCheckout::BILLED, StatusCheckout::CHARGEBACKED]);
        $query->setIncludeExtendedCheckoutStatus(
            [ExtendedCheckoutStatus::OPEN, ExtendedCheckoutStatus::DELETED]
        );
        $query->setIncludePaymentChannel([PaymentChannel::ECOMMERCE, PaymentChannel::POS]);
        $query->setPaymentReference("1234");
        $query->setPaymentId("5678");
        $query->setFirstName("John");
        $query->setSurname("Doe");
        $query->setEmail("john.doe@example.com");
        $query->setPhoneNumber("1234567890");
        $query->setDateOfBirth("1980-01-01");
        $query->setCompanyInformation("Company Inc.");

        // act
        $queryMap = $query->toQueryMap();

        // assert
        $this->assertEquals("1", $queryMap["offset"]);
        $this->assertEquals("10", $queryMap["size"]);
        $this->assertEquals("2021-01-01T00:00:00+00:00", $queryMap["fromDate"]);
        $this->assertEquals("2021-01-31T00:00:00+00:00", $queryMap["toDate"]);
        $this->assertEquals("100", $queryMap["fromCheckoutAmount"]);
        $this->assertEquals("200", $queryMap["toCheckoutAmount"]);
        $this->assertEquals("50", $queryMap["fromOpenAmount"]);
        $this->assertEquals("150", $queryMap["toOpenAmount"]);
        $this->assertEquals("10", $queryMap["fromCollectedAmount"]);
        $this->assertEquals("20", $queryMap["toCollectedAmount"]);
        $this->assertEquals("5", $queryMap["fromCancelledAmount"]);
        $this->assertEquals("15", $queryMap["toCancelledAmount"]);
        $this->assertEquals("1", $queryMap["fromRefundAmount"]);
        $this->assertEquals("2", $queryMap["toRefundAmount"]);
        $this->assertEquals("100", $queryMap["fromChargebackAmount"]);
        $this->assertEquals("200", $queryMap["toChargebackAmount"]);
        $this->assertEquals("123456", $queryMap["checkoutId"]);
        $this->assertEquals("7890", $queryMap["merchantReference"]);
        $this->assertEquals("1234", $queryMap["merchantCustomerId"]);
        $this->assertEquals("12,456", $queryMap["includePaymentProductId"]);
        $this->assertEquals("BILLED,CHARGEBACKED", $queryMap["includeCheckoutStatus"]);
        $this->assertEquals("OPEN,DELETED", $queryMap["includeExtendedCheckoutStatus"]);
        $this->assertEquals("ECOMMERCE,POS", $queryMap["includePaymentChannel"]);
        $this->assertEquals("1234", $queryMap["paymentReference"]);
        $this->assertEquals("5678", $queryMap["paymentId"]);
        $this->assertEquals("John", $queryMap["firstName"]);
        $this->assertEquals("Doe", $queryMap["surname"]);
        $this->assertEquals("john.doe@example.com", $queryMap["email"]);
        $this->assertEquals("1234567890", $queryMap["phoneNumber"]);
        $this->assertEquals("1980-01-01", $queryMap["dateOfBirth"]);
        $this->assertEquals("Company Inc.", $queryMap["companyInformation"]);
    }

    public function testNulls(): void
    {
        /** @var GetCheckoutsQuery */
        $query = new GetCheckoutsQuery();
        $queryMap = $query->toQueryMap();

        $this->assertEquals(0, count($queryMap));
    }
}
