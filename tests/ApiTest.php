<?php


namespace ZabbixApi\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ZabbixApi\ZabbixApi;

abstract class ApiTest extends TestCase
{
    /**
     * @var ZabbixApi
     */
    protected $api;

    /**
     * @var MockHandler
     */
    private $mock;

    protected function setUp()
    {
        parent::setUp();

        $this->mock = new MockHandler();
        $handler = HandlerStack::create($this->mock);
        $this->api = new ZabbixApi(null, false, ['handler' => $handler]);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|\Exception|\GuzzleHttp\Promise\PromiseInterface|callable $response
     */
    protected function response($response)
    {
        $this->mock->append($response);
    }

    /**
     * @param array $data
     * @param int $statusCode
     */
    protected function responseJson(array $data, $statusCode = 200)
    {
        $this->response(new Response($statusCode, [], json_encode($data)));
    }
}