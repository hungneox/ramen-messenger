<?php

namespace Neox\Lumen\Messenger\Templates\Traits;

/**
 * Trait HasUrl
 * @package Neox\Lumen\Messenger\Traits
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
