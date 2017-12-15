<?php

namespace Neox\Lumen\Messenger\Templates;

use Neox\Lumen\Messenger\Traits\HasButtons;
use Neox\Lumen\Messenger\Traits\HasText;

/**
 * Class ButtonTemplate
 * @package Neox\Lumen\Messenger\Templates
 * @see https://developers.facebook.com/docs/messenger-platform/reference/template/button
 */
class ButtonTemplate extends Template
{
    use HasButtons;
    use HasText;

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return [
            "attachment" => [
                "type"    => "template",
                "payload" => [
                    "template_type" => "button",
                    "text"          => $this->getText(),
                    "buttons"       => $this->getButtonsAsArray()
                ]
            ]
        ];
    }
}
