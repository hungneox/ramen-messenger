<?php

namespace Neox\Ramen\Messenger\Console;

use Neox\Ramen\Messenger\Endpoints\MessengerProfileEndpoint;
use Neox\Ramen\Messenger\PersistentMenu\PersistentMenu;

/**
 * Class SetPersistentMenuCommand
 * @package Neox\Ramen\Messenger\Console
 */
abstract class SetPersistentMenuCommand extends AbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'messenger:persistent-menu:set';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set persistent menu for messenger profile.';

    abstract public function getMenu(): PersistentMenu;

    /**
     * @inheritdoc
     */
    public function handle()
    {
        $this->httpClient->post(
            (string)(new MessengerProfileEndpoint()),
            $this->getMenu()->toArray()
        );
    }
}
