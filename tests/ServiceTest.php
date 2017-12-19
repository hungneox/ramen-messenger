<?php

namespace Neox\Lumen\Messenger\Tests;

use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Neox\Lumen\Messenger\Endpoints\MessagesEndpoint;
use Neox\Lumen\Messenger\MessengerSdkService;
use Neox\Lumen\Messenger\Templates\TextTemplate;

class ServiceTest extends TestCase
{
    /**
     * @var MessengerSdkService
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

        $this->service = new MessengerSdkService($this->client, $this->request);
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


        $this->service->hears('hello world', function (MessengerSdkService $service) {
            $service->replies('bonjour');
        });
    }
}
