<?php

namespace Neox\Ramen\Messenger;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Neox\Ramen\Messenger\Contracts\MessengerServiceContract;

class MessengerServiceProvider extends ServiceProvider
{
    const CONFIG_KEY = 'facebook';

    /**
     * @inheritdoc
     */
    public function register()
    {
        // In Ramen application configuration files needs to be loaded implicitly
        if ($this->app instanceof \Laravel\Lumen\Application) {
            $this->app->configure(self::CONFIG_KEY);
        } else {
            $this->publishes([$this->configPath() => config_path('facebook.php')]);
        }

        $this->registerBindings();
    }

    /**
    * Registers container bindings.
    */
    protected function registerBindings()
    {
        $this->app->singleton(ClientInterface::class, function () {
            return new Client([]);
        });

        $this->app->singleton(MessengerServiceContract::class, function () {
            return new MessengerService(
                $this->app->make(ClientInterface::class),
                $this->app->make(Request::class)
            );
        });
    }

    /**
     * Default config file path
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/facebook.php';
    }
}
