<?php

namespace Neox\Lumen\Messenger\Templates;

/**
 * Class OpenGraphTemplate
 * @package Neox\Lumen\Messenger\Templates
 * @see https://developers.facebook.com/docs/messenger-platform/reference/template/open-graph
 */
class OpenGraphTemplate extends GenericTemplate
{
    /**
     * @return array
     */
    public function getMessage(): array
    {
        return [
            "attachment" => [
                "type"    => "template",
                "payload" => [
                    "template_type" => "open_graph",
                    "elements"      => $this->getElementsAsArray()
                ]
            ]
        ];
    }
}
