<?php

namespace Neox\Lumen\Messenger\Templates;

use Neox\Lumen\Messenger\Traits\HasText;

/**
 * Class TextTemplate
 * @package Neox\Lumen\Messenger\Templates
 */
class TextTemplate extends Template
{
    use HasText;

    /**
     * TextTemplate constructor.
     *
     * @param string|null $recipientId
     * @param string|null $text
     */
    public function __construct(string $recipientId = null, string $text = null)
    {
        $this->text        = $text;
        $this->recipientId = $recipientId;
    }

    /**
     * @inheritdoc
     */
    public function getMessage(): array
    {
        return [
            'text' => $this->getText()
        ];
    }
}
