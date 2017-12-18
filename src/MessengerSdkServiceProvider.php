<?php

namespace Neox\Lumen\Messenger;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Neox\Lumen\Messenger\Contracts\MessengerSdkServiceContract;

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

        $this->app->singleton(MessengerSdkServiceContract::class, function () {
            return new MessengerSdkService(
                $this->app->make(ClientInterface::class),
                $this->app->make(Request::class)
            );
        });
    }
}
