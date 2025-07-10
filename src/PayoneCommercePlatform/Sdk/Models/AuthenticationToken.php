<?php

namespace PayoneCommercePlatform\Sdk\Models;

class AuthenticationToken
{
    /** @var string */
    private $token;
    /** @var string */
    private $id;
    /** @var string */
    private $creationDate;
    /** @var string */
    private $expirationDate;

    public function getToken(): string
    {
        return $this->token;
    }
    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }
    public function getId(): string
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }
    public function setCreationDate(string $creationDate): self
    {
        $this->creationDate = $creationDate;
        return $this;
    }
    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }
    public function setExpirationDate(string $expirationDate): self
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }
}
