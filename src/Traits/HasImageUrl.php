<?php

namespace Neox\Ramen\Messenger\Traits;

trait HasImageUrl
{
    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     * @return $this
     */
    public function setImageUrl(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }
}
