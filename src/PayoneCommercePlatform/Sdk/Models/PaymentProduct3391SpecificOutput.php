<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\InstallmentOption;

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

    /**
     * @param InstallmentOption[]|null $installmentOptions List of installment options.
     */
    public function __construct(
        ?array $installmentOptions = null
    ) {
        $this->installmentOptions = $installmentOptions;
    }

    // Getters and Setters
    /**
     * @return InstallmentOption[]|null List of installment options.
     */
    public function getInstallmentOptions(): ?array
    {
        return $this->installmentOptions;
    }

    /**
     * @param InstallmentOption[]|null $installmentOptions List of installment options.
     * @return self
     */
    public function setInstallmentOptions(?array $installmentOptions): self
    {
        $this->installmentOptions = $installmentOptions;
        return $this;
    }
}
