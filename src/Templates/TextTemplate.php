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

    public function getMessage(): array
    {
        return [
            'text' => $this->getText()
        ];
    }
}
