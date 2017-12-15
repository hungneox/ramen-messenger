<?php

namespace Neox\Lumen\Messenger\Tests\Templates;

use Neox\Lumen\Messenger\Templates\TextTemplate;
use Neox\Lumen\Messenger\Tests\TestCase;

class TextTemplateTest extends TestCase
{
    public function testToArray()
    {
        $template = (new TextTemplate())
            ->setRecipientId('1100178880089558')
            ->setText('Hello World');

        $expected = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json'    => [
                'recipient' => [
                    'id' => '1100178880089558'
                ],
                'message' => [
                    'text' => 'Hello World'
                ]
            ]
        ];

        $this->assertEquals($expected, $template->toArray());
    }
}
