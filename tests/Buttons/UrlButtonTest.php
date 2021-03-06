<?php

namespace Neox\Ramen\Messenger\Tests\Templates\Payload\Buttons;

use Neox\Ramen\Messenger\Buttons\UrlButton;
use Neox\Ramen\Messenger\Tests\TestCase;

class UrlButtonTest extends TestCase
{
    public function testToArray()
    {
        $button = (new UrlButton())->setUrl('http://example.com');

        $expected = [
            'type'                 => 'web_url',
            'title'                => null,
            'url'                  => 'http://example.com',
            "messenger_extensions" => false,
            "webview_height_ratio" => 'tall',
        ];

        $this->assertEquals($expected, $button->toArray());
    }
}
