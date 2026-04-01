<?php

namespace PayoneCommercePlatform\Sdk\Models;

use DateTime;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing data related to the account the customer has with you.
 */
class CustomerAccount
{
    /**
     * @var DateTime|null Creation date and time of the customer account in ISO 8601 format (UTC).
     */
    #[SerializedName('createDate')]
    protected ?DateTime $createDate;

    public function __construct(
        ?DateTime $createDate = null
    ) {
        $this->createDate = $createDate;
    }

    // Getters and Setters
    public function getCreateDate(): ?DateTime
    {
        return $this->createDate;
    }

    public function setCreateDate(?DateTime $createDate): self
    {
        $this->createDate = $createDate;
        return $this;
    }
}
