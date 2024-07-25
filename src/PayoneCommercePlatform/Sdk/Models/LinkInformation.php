<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description URL and content type information for a web resource.
 */
class LinkInformation
{
    /**
     * @var string URL of link.
     */
    #[SerializedName('href')]
    protected string $href;

    /**
     * @var string Content type of linked data.
     */
    #[SerializedName('type')]
    protected string $type;

    public function __construct(
        string $href,
        string $type
    ) {
        $this->href = $href;
        $this->type = $type;
    }

    // Getters and Setters
    public function getHref(): string
    {
        return $this->href;
    }

    public function setHref(string $href): self
    {
        $this->href = $href;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
}
