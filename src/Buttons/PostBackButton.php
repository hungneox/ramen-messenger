<?php

namespace Neox\Lumen\Messenger\Buttons;

/**
 * Class PostBackButton
 * @package Neox\Lumen\Messenger\Buttons
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
