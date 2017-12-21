<?php

namespace Neox\Ramen\Messenger\Tests;

use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Neox\Ramen\Messenger\Endpoints\MessagesEndpoint;
use Neox\Ramen\Messenger\MessengerService;
use Neox\Ramen\Messenger\Templates\TextTemplate;

class ServiceTest extends TestCase
{
    /**
     * @var MessengerService
     */
    protected $service;

    /**
     * @var ClientInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $client;

    /**
     * @var Request|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $request;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->client = $this->getMockBuilder(ClientInterface::class)
                             ->setMethods(['post'])
                             ->getMock();

        $this->request = $this->getMockBuilder(Request::class)
                              ->disableOriginalConstructor()
                              ->getMock();

        $this->service = new MessengerService($this->client, $this->request);
    }


    public function testHears()
    {
        $this->request->expects($this->once())
                      ->method('get')
                      ->with('entry')
                      ->willReturn([
                          [
                              'messaging' => [
                                  [
                                      'sender'  => [
                                          'id' => '1234567'
                                      ],
                                      'message' => [
                                          'text' => 'hello world'
                                      ]
                                  ]
                              ]
                          ]
                      ]);

        $this->client->expects($this->once())
                      ->method('post')
                      ->with(
                          (new MessagesEndpoint())->__toString(),
                          (new TextTemplate())
                              ->setRecipientId('1234567')
                              ->setText('bonjour')->toArray()
                      );


        $this->service->hears('hello world', function (MessengerService $service) {
            $service->replies('bonjour');
        });
    }
}
