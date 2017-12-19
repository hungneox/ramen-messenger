<?php

namespace Neox\Lumen\Messenger\Tests\Endpoints;

use Neox\Lumen\Messenger\Endpoints\MessengerProfileEndpoint;
use Neox\Lumen\Messenger\Tests\TestCase;

class MessageProfileEndpointTest extends TestCase
{
    public function testToString()
    {
        $this->assertEquals(
            'https://graph.facebook.com/v2.6/me/messenger_profile?access_token=',
            (new MessengerProfileEndpoint())->__toString()
        );
    }
}
