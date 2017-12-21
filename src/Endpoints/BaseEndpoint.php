<?php

namespace Neox\Lumen\Messenger\Endpoints;

class BaseEndpoint
{
    /**
     * @var string
     */
    protected $endpoint;

    const FACEBOOK_GRAPH_URL     = 'https://graph.facebook.com';
    const FACEBOOK_GRAPH_VERSION = 'v2.6';


    /**
     * @return string
     */
    public function getRequestUri()
    {
        return self::FACEBOOK_GRAPH_URL . '/' . self::FACEBOOK_GRAPH_VERSION;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getRequestUri() . $this->endpoint . '?access_token=' . $this->getAccessToken();
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        if (function_exists('config')) {
            return config('facebook.access_token');
        }
        return env('FACEBOOK_ACCESS_TOKEN');
    }
}
