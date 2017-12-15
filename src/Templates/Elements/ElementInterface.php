<?php

namespace Neox\Lumen\Messenger\Templates\Elements;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Interface ElementInterface
 * @package Neox\Jarvis\Messenger\Templates\Payload\Elements
 */
interface ElementInterface extends Arrayable
{
    /**
     * @return array
     */
    public function toArray();
}
