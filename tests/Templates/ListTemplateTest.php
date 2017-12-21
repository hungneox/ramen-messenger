<?php

namespace Neox\Ramen\Messenger\Tests\Templates;

use Neox\Ramen\Messenger\Buttons\DefaultActionButton;
use Neox\Ramen\Messenger\Buttons\PostBackButton;
use Neox\Ramen\Messenger\Buttons\UrlButton;
use Neox\Ramen\Messenger\Templates\Elements\Element;
use Neox\Ramen\Messenger\Templates\ListTemplate;
use Neox\Ramen\Messenger\Tests\TestCase;

class ListTemplateTest extends TestCase
{
    public function testToArray()
    {
        $template = (new ListTemplate())
            ->setTopElementStyle('large')
            ->addElement(
                (new Element())
                    ->setTitle('Quebec Tries to Say Au Revoir to ‘Hi,’ and Hello to ‘Bonjour’')
                    ->setSubtitle('Lire en français')
                    ->setImageUrl('https://static01.nyt.com/images/2017/12/06/world/06quebec1/06quebec1-master768.jpg')
                    ->setDefaultAction(
                        (new DefaultActionButton())
                            ->setUrl('https://www.thedodo.com/baby-rhino-blanket-bottle-1424843198.html')
                            ->setMessengerExtensions(false)
                    )
            )->addElement(
                (new Element())
                    ->setTitle('Second card')
                    ->setSubtitle('Element #2 of an hscroll')
                    ->setImageUrl('https://i.imgur.com/3UQFZnB.png')
                    ->addButton(
                        (new PostBackButton())
                            ->setTitle('Help')
                            ->setPayload('help')
                    )
            )->addButton(
                (new UrlButton())
                    ->setTitle('View more')
                    ->setUrl('https://butchiso.com')
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
                            "template_type"     => "list",
                            'top_element_style' => 'large',
                            "elements"          => [
                                [
                                    'title'          => 'Quebec Tries to Say Au Revoir to ‘Hi,’ and Hello to ‘Bonjour’',
                                    'image_url'      => 'https://static01.nyt.com/images/2017/12/06/world/06quebec1/06quebec1-master768.jpg',
                                    'subtitle'       => 'Lire en français',
                                    'buttons'        => [],
                                    'default_action' => [
                                        'type'                 => 'web_url',
                                        'url'                  => 'https://www.thedodo.com/baby-rhino-blanket-bottle-1424843198.html',
                                        'messenger_extensions' => false,
                                        'webview_height_ratio' => 'tall',
                                    ],
                                ],
                                [
                                    'title'     => 'Second card',
                                    'image_url' => 'https://i.imgur.com/3UQFZnB.png',
                                    'subtitle'  => 'Element #2 of an hscroll',
                                    'buttons'   => [
                                        [
                                            'type'    => 'postback',
                                            'title'   => 'Help',
                                            'payload' => 'help'
                                        ]
                                    ]

                                ]
                            ],
                            'buttons'           => [
                                [
                                    'type'                 => 'web_url',
                                    'title'                => 'View more',
                                    'url'                  => 'https://butchiso.com',
                                    "messenger_extensions" => false,
                                    "webview_height_ratio" => 'tall',
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $template->toArray());
    }
}
