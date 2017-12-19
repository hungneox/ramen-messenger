<?php

namespace Neox\Lumen\Messenger\Tests\Endpoints;

use Neox\Lumen\Messenger\Endpoints\MessagesEndpoint;
use Neox\Lumen\Messenger\Tests\TestCase;

class MessageEndpointTest extends TestCase
{
    public function testToString()
    {
        $this->assertEquals(
            'https://graph.facebook.com/v2.6/me/messages?access_token=',
            (new MessagesEndpoint())->__toString()
        );
    }
}
