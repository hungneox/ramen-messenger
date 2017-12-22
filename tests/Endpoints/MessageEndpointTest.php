<?php

namespace Neox\Ramen\Messenger\Tests\Endpoints;

use Neox\Ramen\Messenger\Endpoints\MessagesEndpoint;
use Neox\Ramen\Messenger\Tests\TestCase;

class MessageEndpointTest extends TestCase
{
    public function testToString()
    {
        $this->assertEquals(
            'https://graph.facebook.com/v2.6/me/messages?access_token=',
            (string)(new MessagesEndpoint())
        );
    }
}
