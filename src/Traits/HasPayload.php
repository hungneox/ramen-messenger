<?php

namespace Neox\Ramen\Messenger\Traits;

trait HasPayload
{
    /**
     * @var string
     */
    protected $payload;

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload ?? '';
    }

    /**
     * @param string $payload
     * @return $this
     */
    public function setPayload(string $payload)
    {
        $this->payload = $payload;
        return $this;
    }
}
