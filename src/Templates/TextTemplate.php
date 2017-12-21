<?php

namespace Neox\Ramen\Messenger\Templates;

use Neox\Ramen\Messenger\Traits\HasText;

/**
 * Class TextTemplate
 * @package Neox\Ramen\Messenger\Templates
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
