<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing data related to the account the customer has with you.
 */
class CustomerAccount
{
    /**
     * @var string|null Creation date and time of the customer account in ISO 8601 format (UTC).
     * Accepted formats are:
     *
     * * YYYY-MM-DD'T'HH:mm:ss'Z'
     * * YYYY-MM-DD'T'HH:mm:ss+XX:XX
     * * YYYY-MM-DD'T'HH:mm:ss-XX:XX
     * * YYYY-MM-DD'T'HH:mm'Z'
     * * YYYY-MM-DD'T'HH:mm+XX:XX
     * * YYYY-MM-DD'T'HH:mm-XX:XX
     */
    #[SerializedName('createDate')]
    protected ?string $createDate;

    public function __construct(
        ?string $createDate = null
    ) {
        $this->createDate = $createDate;
    }

    // Getters and Setters
    public function getCreateDate(): ?string
    {
        return $this->createDate;
    }

    public function setCreateDate(?string $createDate): self
    {
        $this->createDate = $createDate;
        return $this;
    }
}
