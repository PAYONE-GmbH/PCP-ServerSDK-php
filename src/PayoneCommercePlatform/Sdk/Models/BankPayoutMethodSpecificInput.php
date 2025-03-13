<?php

namespace PayoneCommercePlatform\Sdk\Models;

use PayoneCommercePlatform\Sdk\Models\SepaTransferPaymentProduct772SpecificInput;

class BankPayoutMethodSpecificInput
{
    /**
     * @var int
     */
    private $paymentProductId;

    /**
     * @var SepaTransferPaymentProduct772SpecificInput|null
     */
    private $paymentProduct772SpecificInput;

    public function __construct(
        int $paymentProductId,
        ?SepaTransferPaymentProduct772SpecificInput $paymentProduct772SpecificInput = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct772SpecificInput = $paymentProduct772SpecificInput;
    }

    /**
     * @return int
     */
    public function getPaymentProductId(): int
    {
        return $this->paymentProductId;
    }

    /**
     * @return SepaTransferPaymentProduct772SpecificInput|null
     */
    public function getPaymentProduct772SpecificInput(): ?SepaTransferPaymentProduct772SpecificInput
    {
        return $this->paymentProduct772SpecificInput;
    }
}
