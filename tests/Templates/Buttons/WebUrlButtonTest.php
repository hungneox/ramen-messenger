<?php

namespace Neox\Lumen\Messenger\Tests\Templates\Buttons;

use Neox\Lumen\Messenger\Templates\Buttons\WebUrlButton;
use Neox\Lumen\Messenger\Tests\TestCase;

class WebUrlButtonTest extends TestCase
{
    public function testToArray()
    {
        $button = (new WebUrlButton())->setUrl('http://example.com');

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
