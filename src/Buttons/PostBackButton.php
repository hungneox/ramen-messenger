<?php

namespace Neox\Ramen\Messenger\Buttons;

use Neox\Ramen\Messenger\Traits\HasPayload;

/**
 * Class PostBackButton
 * @package Neox\Ramen\Messenger\Buttons
 */
class PostBackButton extends Button
{
    use HasPayload;

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
