<?php

namespace Neox\Lumen\Messenger\Templates;

/**
 * Class TextTemplate
 * @package Neox\Lumen\Messenger\Templates
 */
class TextTemplate extends Template
{

    /**
     * @var string
     */
    protected $text;


    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $message
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    public function getMessage(): array
    {
        return [
            'text' => $this->getText()
        ];
    }
}
