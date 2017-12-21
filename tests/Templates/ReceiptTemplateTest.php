<?php

namespace Neox\Ramen\Messenger\Tests\Templates;

use Neox\Ramen\Messenger\Templates\Elements\ReceiptElement;
use Neox\Ramen\Messenger\Templates\Payload\Address;
use Neox\Ramen\Messenger\Templates\Payload\Adjustment;
use Neox\Ramen\Messenger\Templates\Payload\Summary;
use Neox\Ramen\Messenger\Templates\ReceiptTemplate;
use Neox\Ramen\Messenger\Tests\TestCase;

class ReceiptTemplateTest extends TestCase
{
    public function testToArray()
    {
        $receipt = (new ReceiptTemplate())
            ->setRecipientId('1100178880089558')
            ->setRecipientName('Stephane Crozatier')
            ->setOrderNumber('12345678902')
            ->setOrderUrl('http://petersapparel.parseapp.com/order?order_id=123456')
            ->setCurrency('USD')
            ->setPaymentMethod('Visa 123')
            ->setTimestamp('1428444852')
            ->setAddress(
                (new Address())
                    ->setStreet1('1 Hacker Way')
                    ->setCountry('US')
                    ->setCity('Menlo Park')
                    ->setState('CA')
                    ->setPostalCode('94025')
            )->setSummary(
                (new Summary())
                    ->setTotalCost(56.14)
                    ->setShippingCost(4.95)
                    ->setSubtotal(75.00)
                    ->setTotalTax(6.19)
            )->addAdjustment(
                (new Adjustment())
                    ->setName('New Customer Discount')
                    ->setAmount(20)
            )->addAdjustment(
                (new Adjustment())
                    ->setName('$10 Off Coupon')
                    ->setAmount(10)
            )->setElements([
                (new ReceiptElement())
                    ->setTitle('Classic White T-Shirt')
                    ->setCurrency('USD')
                    ->setQuantity(2)
                    ->setPrice(50)
                    ->setSubtitle('100% Soft and Luxurious Cotton')
                    ->setImageUrl('https://example.com/image1.jpg')
                ,
                (new ReceiptElement())
                    ->setTitle('Classic Gray T-Shirt')
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice(25)
                    ->setSubtitle('100% Soft and Luxurious Cotton')
                    ->setImageUrl('https://example.com/image2.jpg')
            ]);

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
                            "template_type"  => "receipt",
                            "recipient_name" => 'Stephane Crozatier',
                            "order_number"   => '12345678902',
                            "currency"       => 'USD',
                            "payment_method" => 'Visa 123',
                            "order_url"      => 'http://petersapparel.parseapp.com/order?order_id=123456',
                            "timestamp"      => '1428444852',
                            'address'        => [
                                "street_1"    => '1 Hacker Way',
                                "street_2"    => '',
                                "city"        => 'Menlo Park',
                                "postal_code" => '94025',
                                "state"       => 'CA',
                                "country"     => 'US'
                            ],
                            'summary'        => [
                                'subtotal'      => 75.00,
                                'shipping_cost' => 4.95,
                                'total_tax'     => 6.19,
                                'total_cost'    => 56.14
                            ],
                            "adjustments"    => [
                                [
                                    'name'   => 'New Customer Discount',
                                    'amount' => 20
                                ],
                                [
                                    'name'   => '$10 Off Coupon',
                                    'amount' => 10
                                ],
                            ],
                            "elements"       => [
                                [
                                    "title"     => 'Classic White T-Shirt',
                                    "subtitle"  => '100% Soft and Luxurious Cotton',
                                    "quantity"  => 2,
                                    "price"     => 50,
                                    "currency"  => 'USD',
                                    "image_url" => 'https://example.com/image1.jpg'
                                ],
                                [
                                    "title"     => 'Classic Gray T-Shirt',
                                    "subtitle"  => '100% Soft and Luxurious Cotton',
                                    "quantity"  => 1,
                                    "price"     => 25,
                                    "currency"  => 'USD',
                                    "image_url" => 'https://example.com/image2.jpg'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $receipt->toArray());
    }
}
