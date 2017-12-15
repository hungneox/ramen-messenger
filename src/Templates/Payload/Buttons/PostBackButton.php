<?php

namespace Neox\Lumen\Messenger\Templates\Payload\Buttons;

/**
 * Class PostBackButton
 * @package Neox\Lumen\Messenger\Templates\Payload\Buttons
 */
class PostBackButton extends Button
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
        return $this->payload;
    }

    /**
     * @param string $payload
     * @return Button
     */
    public function setPayload(string $payload): Button
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type'    => self::TYPE_POSTBACK,
            'title'   => $this->getTitle(),
            'payload' => $this->getPayload()
        ];
    }
}
