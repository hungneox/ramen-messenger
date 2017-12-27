<?php

namespace Neox\Ramen\Messenger;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Neox\Ramen\Messenger\Contracts\MessengerServiceContract;
use Neox\Ramen\Messenger\Endpoints\MessagesEndpoint;
use Neox\Ramen\Messenger\Templates\Template;
use Neox\Ramen\Messenger\Templates\TextTemplate;

class MessengerService implements MessengerServiceContract
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
        if ($this->sender === $this->getPageId()) {
            return;
        }

        if (mb_strtolower($text) === mb_strtolower($message)) {
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

        $this->sends((new TextTemplate($this->sender, $message)));
    }

    /**
     * Send message to messenger
     *
     * @param Template $template
     */
    public function sends(Template $template)
    {
        $this->httpClient->post((string)(new MessagesEndpoint()), $template->toArray());
    }


    public function listen()
    {
        //@TODO Listen to a list of registered keywords
    }

    /**
     * @return string
     */
    public function getPageId()
    {
        if (function_exists('config')) {
            return config('facebook.page_id');
        }

        return env('FACEBOOK_PAGE_ID');
    }
}
