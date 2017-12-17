<?php

namespace Neox\Lumen\Messenger;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\ServiceProvider;

class MessengerSdkServiceProvider extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->app->singleton(ClientInterface::class, function () {
            return new Client([]);
        });
    }
}
