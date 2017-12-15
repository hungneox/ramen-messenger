<?php

namespace Neox\Lumen\Messenger\Templates;

use Illuminate\Support\Collection;
use Neox\Lumen\Messenger\Templates\Elements\ElementInterface;

/**
 * Class GenericTemplate
 * @package Neox\Lumen\Messenger\Templates
 * @see https://developers.facebook.com/docs/messenger-platform/reference/template/generic/
 */
class GenericTemplate extends Template
{

    /**
     * @var
     */
    protected $elements;

    /**
     * @return Collection
     */
    public function getElements(): Collection
    {
        return collect($this->elements);
    }

    /**
     * @return array
     */
    public function getElementsAsArray(): array
    {
        return $this->getElements()->map(function (ElementInterface $element) {
            return $element->toArray();
        })->toArray();
    }


    /**
     * @param mixed $elements
     * @return GenericTemplate
     */
    public function setElements($elements)
    {
        $this->elements = $elements;
        return $this;
    }

    /**
     * @param ElementInterface $element
     * @return $this
     */
    public function addElement(ElementInterface $element)
    {
        $this->elements[] = $element;
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
                    "template_type" => "generic",
                    "elements"      => $this->getElementsAsArray()
                ]
            ]
        ];
    }
}
