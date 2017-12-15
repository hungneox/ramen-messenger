<?php

namespace Neox\Lumen\Messenger\Templates;

use Neox\Lumen\Messenger\Templates\Payload\Traits\HasButtons;

/**
 * Class ListTemplate
 * @package Neox\Lumen\Messenger\Templates
 * @see https://developers.facebook.com/docs/messenger-platform/reference/template/list
 */
class ListTemplate extends GenericTemplate
{
    use HasButtons;

    /**
     * @var string
     */
    protected $topElementStyle = 'large';

    /**
     * @return string
     */
    public function getTopElementStyle(): string
    {
        return $this->topElementStyle;
    }

    /**
     * @param string $topElementStyle
     * @return ListTemplate
     */
    public function setTopElementStyle(string $topElementStyle): ListTemplate
    {
        $this->topElementStyle = $topElementStyle;
        return $this;
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return [
            "attachment" => [
                "type"    => "template",
                "payload" => [
                    "template_type"     => "list",
                    "top_element_style" => $this->getTopElementStyle(),
                    "elements"          => $this->getElementsAsArray(),
                    "buttons"           => $this->getButtonsAsArray()
                ]
            ]
        ];
    }
}
