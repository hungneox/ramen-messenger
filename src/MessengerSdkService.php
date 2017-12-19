<?php

namespace Neox\Lumen\Messenger;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Neox\Lumen\Messenger\Contracts\MessengerSdkServiceContract;
use Neox\Lumen\Messenger\Endpoints\MessagesEndpoint;
use Neox\Lumen\Messenger\Templates\TextTemplate;

class MessengerSdkService implements MessengerSdkServiceContract
{

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $sender;

    /**
     * AbstractCommand constructor.
     *
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient, Request $request)
    {
        $this->httpClient = $httpClient;
        $this->request    = $request;
    }

    /**
     * @param string $message
     */
    public function hears(string $message, callable $callback)
    {
        //@TODO Beautify this
        $events = $this->request->get('entry')[0]['messaging'];

        $this->sender = $events[0]['sender']['id'];
        $text         = $events[0]['message']['text'];

        // Don't handle message from the bot itself
        if ($this->sender === env('FACEBOOK_PAGE_ID')) {
            return;
        }

        if ($text === $message) {
            $callback($this);
        }
    }

    /**
     * @param string $message
     *
     * @throws \InvalidArgumentException
     */
    public function replies(string $message)
    {
        //@TODO Beautify this
        if (empty($message)) {
            throw new \InvalidArgumentException('Message text cannot be empty!');
        }

        $this->httpClient->post(
            (new MessagesEndpoint())->__toString(),
            (new TextTemplate())
                ->setRecipientId($this->sender)
                ->setText($message)->toArray()
        );
    }
}