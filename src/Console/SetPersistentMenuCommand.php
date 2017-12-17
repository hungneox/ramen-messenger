<?php

namespace Neox\Lumen\Messenger\Console;

use Neox\Lumen\Messenger\Endpoints\MessengerProfileEndpoint;
use Neox\Lumen\Messenger\PersistentMenu\PersistentMenu;

/**
 * Class SetPersistentMenuCommand
 * @package Neox\Lumen\Messenger\Console
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
            (new MessengerProfileEndpoint())->__toString(),
            $this->getMenu()->toArray()
        );
    }
}
