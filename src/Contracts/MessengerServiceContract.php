<?php

namespace Neox\Ramen\Messenger\Contracts;

use Neox\Ramen\Messenger\Templates\Template;

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

    /**
     * @param Template $template
     */
    public function sends(Template $template);
}
