<?php

namespace Neox\Lumen\Messenger\Contracts;

interface MessengerSdkServiceContract
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
