<?php

namespace Neox\Ramen\Messenger\Endpoints;

class BaseEndpoint
{
    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $params = [];

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
     * @return array
     */
    public function getParams()
    {
        return array_merge($this->params, [
            'access_token' => $this->getAccessToken()
        ]);
    }

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function addParam(string $key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueryParams()
    {
        return http_build_query($this->getParams());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getRequestUri() . $this->endpoint . '?' . $this->getQueryParams();
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        if (function_exists('config')) {
            return config('facebook.access_token');
        }
        return env('FACEBOOK_ACCESS_TOKEN') ?? '';
    }
}
