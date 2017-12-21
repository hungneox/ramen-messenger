<?php

namespace Neox\Ramen\Messenger\Templates;

/**
 * Class MediaTemplate
 * @package Neox\Ramen\Messenger\Templates
 * @see https://developers.facebook.com/docs/messenger-platform/reference/template/media
 */
class MediaTemplate extends GenericTemplate
{
    /**
     * Media template only accepts ONE element
     *
     * @return array
     */
    public function getMessage(): array
    {
        return [
            "attachment" => [
                "type"    => "template",
                "payload" => [
                    "template_type" => "media",
                    "elements"      => $this->getElementsAsArray()
                ]
            ]
        ];
    }
}
