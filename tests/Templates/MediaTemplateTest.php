<?php

namespace Neox\Lumen\Messenger\Tests\Templates;

use Neox\Lumen\Messenger\Buttons\UrlButton;
use Neox\Lumen\Messenger\Templates\Elements\MediaElement;
use Neox\Lumen\Messenger\Templates\MediaTemplate;
use Neox\Lumen\Messenger\Tests\TestCase;

class MediaTemplateTest extends TestCase
{
    public function testToArray()
    {
        $template = (new MediaTemplate())
            ->addElement(
                (new MediaElement())
                    ->setUrl('https://www.facebook.com/abcnews.au/videos/10157780705989988/')
                    ->setMediaType(MediaElement::TYPE_VIDEO)
                    ->addButton(
                        (new UrlButton())
                            ->setTitle('More videos')
                            ->setUrl('https://www.facebook.com/abcnews.au')
                    )
            )
            ->setRecipientId('1100178880089558');

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
                            "template_type" => "media",
                            "elements"      => [
                                [
                                    'media_type' => 'video',
                                    'url'        => 'https://www.facebook.com/abcnews.au/videos/10157780705989988/',
                                    'buttons'    => [
                                        [
                                            'type'                 => 'web_url',
                                            'url'                  => 'https://www.facebook.com/abcnews.au',
                                            'title'                => 'More videos',
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
