<?php

namespace Neox\Ramen\Messenger\Tests\Endpoints;

use Neox\Ramen\Messenger\Endpoints\MessengerProfileEndpoint;
use Neox\Ramen\Messenger\Tests\TestCase;

class MessageProfileEndpointTest extends TestCase
{
    public function testToString()
    {
        $this->assertEquals(
            'https://graph.facebook.com/v2.6/me/messenger_profile?access_token=',
            (string)(new MessengerProfileEndpoint())
        );
    }
}
