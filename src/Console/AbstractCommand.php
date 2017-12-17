<?php

namespace  Neox\Lumen\Messenger\Console;

use GuzzleHttp\ClientInterface;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

abstract class AbstractCommand extends Command
{
    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * AbstractCommand constructor.
     *
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        parent::__construct();
        $this->httpClient = $httpClient;
    }
}
