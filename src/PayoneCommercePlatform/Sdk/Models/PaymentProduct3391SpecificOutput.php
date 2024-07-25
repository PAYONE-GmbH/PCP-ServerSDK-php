<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Output specific to payment product 3391.
 */
class PaymentProduct3391SpecificOutput
{
    /**
     * @var InstallmentOption[]|null List of installment options.
     */
    #[SerializedName('installmentOptions')]
    protected ?array $installmentOptions;

    public function __construct(
        ?array $installmentOptions = null
    ) {
        $this->installmentOptions = $installmentOptions;
    }

    // Getters and Setters
    public function getInstallmentOptions(): ?array
    {
        return $this->installmentOptions;
    }

    public function setInstallmentOptions(?array $installmentOptions): self
    {
        $this->installmentOptions = $installmentOptions;
        return $this;
    }
}
