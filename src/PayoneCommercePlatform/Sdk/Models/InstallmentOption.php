<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\LinkInformation;

/**
 * @description Installment option object.
 */
class InstallmentOption
{
    /**
     * @var string Installment option Identifier. Use this in the Complete Payment for the selected installment option.
     */
    #[SerializedName('installmentOptionId')]
    protected string $installmentOptionId;

    /**
     * @var int The number of monthly payments for this installment.
     */
    #[SerializedName('numberOfPayments')]
    protected int $numberOfPayments;

    /**
     * @var AmountOfMoney Monthly rate amount.
     */
    #[SerializedName('monthlyAmount')]
    protected AmountOfMoney $monthlyAmount;

    /**
     * @var AmountOfMoney Last rate amount.
     */
    #[SerializedName('lastRateAmount')]
    protected AmountOfMoney $lastRateAmount;

    /**
     * @var int Effective interest amount in percent with two decimals.
     */
    #[SerializedName('effectiveInterestRate')]
    protected int $effectiveInterestRate;

    /**
     * @var int Nominal interest amount in percent with two decimals.
     */
    #[SerializedName('nominalInterestRate')]
    protected int $nominalInterestRate;

    /**
     * @var AmountOfMoney Total rate amount.
     */
    #[SerializedName('totalAmount')]
    protected AmountOfMoney $totalAmount;

    /**
     * @var string Due date of first rate. Format: YYYYMMDD.
     */
    #[SerializedName('firstRateDate')]
    protected string $firstRateDate;

    /**
     * @var LinkInformation Link with credit information.
     */
    #[SerializedName('creditInformation')]
    protected LinkInformation $creditInformation;

    public function __construct(
        string $installmentOptionId,
        int $numberOfPayments,
        AmountOfMoney $monthlyAmount,
        AmountOfMoney $lastRateAmount,
        int $effectiveInterestRate,
        int $nominalInterestRate,
        AmountOfMoney $totalAmount,
        string $firstRateDate,
        LinkInformation $creditInformation
    ) {
        $this->installmentOptionId = $installmentOptionId;
        $this->numberOfPayments = $numberOfPayments;
        $this->monthlyAmount = $monthlyAmount;
        $this->lastRateAmount = $lastRateAmount;
        $this->effectiveInterestRate = $effectiveInterestRate;
        $this->nominalInterestRate = $nominalInterestRate;
        $this->totalAmount = $totalAmount;
        $this->firstRateDate = $firstRateDate;
        $this->creditInformation = $creditInformation;
    }

    // Getters and Setters
    public function getInstallmentOptionId(): string
    {
        return $this->installmentOptionId;
    }

    public function setInstallmentOptionId(string $installmentOptionId): self
    {
        $this->installmentOptionId = $installmentOptionId;
        return $this;
    }

    public function getNumberOfPayments(): int
    {
        return $this->numberOfPayments;
    }

    public function setNumberOfPayments(int $numberOfPayments): self
    {
        $this->numberOfPayments = $numberOfPayments;
        return $this;
    }

    public function getMonthlyAmount(): AmountOfMoney
    {
        return $this->monthlyAmount;
    }

    public function setMonthlyAmount(AmountOfMoney $monthlyAmount): self
    {
        $this->monthlyAmount = $monthlyAmount;
        return $this;
    }

    public function getLastRateAmount(): AmountOfMoney
    {
        return $this->lastRateAmount;
    }

    public function setLastRateAmount(AmountOfMoney $lastRateAmount): self
    {
        $this->lastRateAmount = $lastRateAmount;
        return $this;
    }

    public function getEffectiveInterestRate(): int
    {
        return $this->effectiveInterestRate;
    }

    public function setEffectiveInterestRate(int $effectiveInterestRate): self
    {
        $this->effectiveInterestRate = $effectiveInterestRate;
        return $this;
    }

    public function getNominalInterestRate(): int
    {
        return $this->nominalInterestRate;
    }

    public function setNominalInterestRate(int $nominalInterestRate): self
    {
        $this->nominalInterestRate = $nominalInterestRate;
        return $this;
    }

    public function getTotalAmount(): AmountOfMoney
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(AmountOfMoney $totalAmount): self
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    public function getFirstRateDate(): string
    {
        return $this->firstRateDate;
    }

    public function setFirstRateDate(string $firstRateDate): self
    {
        $this->firstRateDate = $firstRateDate;
        return $this;
    }

    public function getCreditInformation(): LinkInformation
    {
        return $this->creditInformation;
    }

    public function setCreditInformation(LinkInformation $creditInformation): self
    {
        $this->creditInformation = $creditInformation;
        return $this;
    }
}
