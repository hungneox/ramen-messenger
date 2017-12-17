<?php

use Neox\Lumen\Messenger\Endpoints;

class Endpoint
{
    const FACEBOOK_GRAPH_URL     = 'https://graph.facebook.com';
    const FACEBOOK_GRAPH_VERSION = '/v2.6';

    const ENDPOINT_MESSAGES          = '/me/messages';
    const ENDPOINT_MESSENGER_PROFILE = '/me/messenger_profile';

    /**
     * @return string
     */
    public static function getRequestUri()
    {
        return self::FACEBOOK_GRAPH_URL . self::FACEBOOK_GRAPH_VERSION;
    }

    /**
     * @return string
     */
    public static function getRequestMessagesUrl()
    {
        return self::getRequestUri() . self::ENDPOINT_MESSAGES;
    }

    /**
     * @return string
     */
    public static function messengerProfile()
    {
        return self::getRequestUri() . self::ENDPOINT_MESSENGER_PROFILE;
    }
}
