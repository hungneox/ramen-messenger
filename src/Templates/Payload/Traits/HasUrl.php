<?php

namespace Neox\Lumen\Messenger\Templates\Payload\Traits;

/**
 * Trait HasUrl
 * @package Neox\Lumen\Messenger\Payload\Traits
 */
trait HasUrl
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this;
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }
}
