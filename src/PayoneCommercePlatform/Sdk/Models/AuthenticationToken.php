<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing AuthenticationToken details.
 */
class AuthenticationToken
{
    /**
     * @var string|null The authentication token string.
     */
    #[SerializedName('token')]
    protected ?string $token;

    /**
     * @var string|null The unique identifier for the token.
     */
    #[SerializedName('id')]
    protected ?string $id;

    /**
     * @var string|null The creation date of the token.
     */
    #[SerializedName('creationDate')]
    protected ?string $creationDate;

    /**
     * @var string|null The expiration date of the token.
     */
    #[SerializedName('expirationDate')]
    protected ?string $expirationDate;

    public function __construct(
        ?string $token = null,
        ?string $id = null,
        ?string $creationDate = null,
        ?string $expirationDate = null
    ) {
        $this->token = $token;
        $this->id = $id;
        $this->creationDate = $creationDate;
        $this->expirationDate = $expirationDate;
    }

    // Getters and Setters
    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getCreationDate(): ?string
    {
        return $this->creationDate;
    }

    public function setCreationDate(?string $creationDate): self
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function getExpirationDate(): ?string
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?string $expirationDate): self
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }
}
