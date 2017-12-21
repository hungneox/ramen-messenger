<?php

namespace Neox\Ramen\Messenger\Contracts;

interface MessengerServiceContract
{
    /**
     * @param string $message
     */
    public function hears(string $message, callable $callback);

    /**
     * @param string $message
     */
    public function replies(string $message);
}
