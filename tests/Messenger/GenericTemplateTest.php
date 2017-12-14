<?php

namespace Neox\Lumen\Tests\Messenger\Templates;

use Neox\Lumen\Messenger\Templates\Buttons\PostBackButton;
use Neox\Lumen\Messenger\Templates\Buttons\WebUrlButton;
use Neox\Lumen\Messenger\Templates\Elements\Element;
use Neox\Lumen\Messenger\Templates\GenericTemplate;
use Neox\Lumen\Tests\TestCase;

class GenericTemplateTest extends TestCase
{
    public function testEmptyTemplate()
    {
        $template = (new GenericTemplate())->setRecipientId('1100178880089558');

        $expected = [
            "attachment" => [
                "type"    => "template",
                "payload" => [
                    "template_type" => "generic",
                    "elements"      => []
                ]
            ]
        ];

        $this->assertEquals($expected, $template->toArray());
    }

    public function testWithElement()
    {
        $template = (new GenericTemplate())->addElement(
            (new Element())
                ->setTitle('Quebec Tries to Say Au Revoir to ‘Hi,’ and Hello to ‘Bonjour’')
                ->setSubtitle('Lire en français')
                ->setImageUrl('https://static01.nyt.com/images/2017/12/06/world/06quebec1/06quebec1-master768.jpg')
                ->addButton(
                    (new WebUrlButton())
                        ->setTitle('Link to Article')
                        ->setUrl('https://www.nytimes.com/2017/12/05/world/canada/bonjour-hi-quebec.html')
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
        )->setRecipientId('1100178880089558');
    }
}
