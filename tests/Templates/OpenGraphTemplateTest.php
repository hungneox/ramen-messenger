<?php

namespace Neox\Lumen\Messenger\Tests\Templates;

use Neox\Lumen\Messenger\Templates\Buttons\WebUrlButton;
use Neox\Lumen\Messenger\Templates\Elements\OpenGraphElement;
use Neox\Lumen\Messenger\Templates\OpenGraphTemplate;
use Neox\Lumen\Messenger\Tests\TestCase;

class OpenGraphTemplateTest extends TestCase
{
    public function testToArray()
    {
        $template = (new OpenGraphTemplate())
            ->addElement(
                (new OpenGraphElement())
                    ->setUrl('https://open.spotify.com/track/7GhIk7Il098yCjg4BQjzvb')
                    ->addButton(
                        (new WebUrlButton())
                            ->setUrl('https://en.wikipedia.org/wiki/Rickrolling')
                            ->setTitle('View More')
                    )
            )->setRecipientId('1100178880089558');

        $expected = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json'    => [
                'recipient' => [
                    'id' => '1100178880089558'
                ],
                'message'   => [
                    "attachment" => [
                        "type"    => "template",
                        "payload" => [
                            "template_type" => "open_graph",
                            "elements"      => [
                                [
                                    'url'     => 'https://open.spotify.com/track/7GhIk7Il098yCjg4BQjzvb',
                                    'buttons' => [
                                        [
                                            'type'                 => 'web_url',
                                            'title'                => 'View More',
                                            'url'                  => 'https://en.wikipedia.org/wiki/Rickrolling',
                                            'messenger_extensions' => false,
                                            'webview_height_ratio' => 'tall'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $template->toArray());
    }
}
