<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class RedirectPaymentProduct900SpecificInput
{
    /**
     * @var CaptureTrigger|null Indicates the event upon which the payment should be captured.
     */
    #[SerializedName('captureTrigger')]
    protected ?CaptureTrigger $captureTrigger;

    public function __construct(?CaptureTrigger $captureTrigger = null)
    {
        $this->captureTrigger = $captureTrigger;
    }

    public function getCaptureTrigger(): ?CaptureTrigger
    {
        return $this->captureTrigger;
    }

    public function setCaptureTrigger(?CaptureTrigger $captureTrigger): self
    {
        $this->captureTrigger = $captureTrigger;
        return $this;
    }
}
