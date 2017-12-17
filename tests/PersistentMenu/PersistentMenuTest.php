<?php

namespace Neox\Lumen\Messenger\Tests\PersistentMenu;

use Neox\Lumen\Messenger\Buttons\PostBackButton;
use Neox\Lumen\Messenger\Buttons\UrlButton;
use Neox\Lumen\Messenger\PersistentMenu\Menu;
use Neox\Lumen\Messenger\PersistentMenu\PersistentMenu;
use Neox\Lumen\Messenger\Tests\TestCase;

class PersistentMenuTest extends TestCase
{
    public function testToArray()
    {
        $menu = (new PersistentMenu())
            ->addMenu(
                (new Menu())->addItem(
                    (new Menu())
                        ->setType('nested')
                        ->setTitle('My Account')
                        ->addItem(
                            (new UrlButton())
                                ->setTitle('History')
                                ->setUrl('https://www.wikiwand.com/en/History')
                        )->addItem(
                            (new PostBackButton())
                                ->setTitle('Pay Bill')
                                ->setPayload('PAYBILL_PAYLOAD')
                        )->addItem(
                            (new UrlButton())
                                ->setTitle('Example')
                                ->setUrl('http://example.com')
                        )
                )->addItem(
                    (new UrlButton())
                        ->setTitle('Latest News')
                        ->setUrl('https://www.messenger.com/')
                )
            )->addMenu(
                (new Menu())->addItem(
                    (new UrlButton())
                        ->setTitle('Latest News FI')
                        ->setUrl('https://yle.fi/uutiset')
                )->setLocale('fi_FI')
            );

        $expected = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json'    => [
                "persistent_menu" => [
                    [
                        'locale'                  => 'default',
                        'composer_input_disabled' => false,
                        'call_to_actions'         => [
                            [
                                'title'           => 'My Account',
                                'type'            => 'nested',
                                'call_to_actions' => [
                                    [
                                        'type'                 => 'web_url',
                                        'title'                => 'History',
                                        'url'                  => 'https://www.wikiwand.com/en/History',
                                        "messenger_extensions" => false,
                                        "webview_height_ratio" => 'tall',
                                    ],
                                    [
                                        'type'    => 'postback',
                                        'title'   => 'Pay Bill',
                                        'payload' => 'PAYBILL_PAYLOAD'
                                    ],
                                    [
                                        'type'                 => 'web_url',
                                        'title'                => 'Example',
                                        'url'                  => 'http://example.com',
                                        "messenger_extensions" => false,
                                        "webview_height_ratio" => 'tall',
                                    ]
                                ]
                            ],
                            [
                                'type'                 => 'web_url',
                                'title'                => 'Latest News',
                                'url'                  => 'https://www.messenger.com/',
                                "messenger_extensions" => false,
                                "webview_height_ratio" => 'tall',
                            ]
                        ]
                    ],
                    [
                        'locale'                  => 'fi_FI',
                        'composer_input_disabled' => false,
                        'call_to_actions'         => [
                            [
                                'type'                 => 'web_url',
                                'title'                => 'Latest News FI',
                                'url'                  => 'https://yle.fi/uutiset',
                                "messenger_extensions" => false,
                                "webview_height_ratio" => 'tall',
                            ]
                        ],
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $menu->toArray());
    }
}
