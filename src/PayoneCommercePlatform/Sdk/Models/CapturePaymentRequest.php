<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description If the shopping cart is specified, a Capture is made with the amount of the shopping cart for the items that are specified.
 */
class CapturePaymentRequest
{
    /**
     * @var int|null Here you can specify the amount that you want to capture (specified in cents, where single digit currencies are presumed to have 2 digits). The amount can be lower than the amount that was authorized, but not higher. If left empty, the full amount will be captured and the request will be final. If the full amount is captured, the request will also be final.
     */
    #[SerializedName('amount')]
    protected ?int $amount;

    /**
     * @var bool This property indicates whether this will be the final operation. If the full amount should not be captured but the property is set to true, the remaining amount will automatically be cancelled.
     */
    #[SerializedName('isFinal')]
    protected bool $isFinal;

    /**
     * @var CancellationReason|null The reason for cancellation.
     */
    #[SerializedName('cancellationReason')]
    protected ?CancellationReason $cancellationReason;

    /**
     * @var PaymentReferences|null Details of the payment references.
     */
    #[SerializedName('references')]
    protected ?PaymentReferences $references;

    /**
     * @var DeliveryInformation|null Details of the delivery information.
     */
    #[SerializedName('delivery')]
    protected ?DeliveryInformation $delivery;

    public function __construct(
        ?int $amount = null,
        bool $isFinal = false,
        ?CancellationReason $cancellationReason = null,
        ?PaymentReferences $references = null,
        ?DeliveryInformation $delivery = null
    ) {
        $this->amount = $amount;
        $this->isFinal = $isFinal;
        $this->cancellationReason = $cancellationReason;
        $this->references = $references;
        $this->delivery = $delivery;
    }

    // Getters and Setters
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getIsFinal(): bool
    {
        return $this->isFinal;
    }

    public function setIsFinal(bool $isFinal): self
    {
        $this->isFinal = $isFinal;
        return $this;
    }

    public function getCancellationReason(): ?CancellationReason
    {
        return $this->cancellationReason;
    }

    public function setCancellationReason(?CancellationReason $cancellationReason): self
    {
        $this->cancellationReason = $cancellationReason;
        return $this;
    }

    public function getReferences(): ?PaymentReferences
    {
        return $this->references;
    }

    public function setReferences(?PaymentReferences $references): self
    {
        $this->references = $references;
        return $this;
    }

    public function getDelivery(): ?DeliveryInformation
    {
        return $this->delivery;
    }

    public function setDelivery(?DeliveryInformation $delivery): self
    {
        $this->delivery = $delivery;
        return $this;
    }
}
