<?php

namespace ZabbixApi\Tests;

class ApiInfoApiTest extends ApiTest
{

    /** @test */
    public function it_fetches_the_zabbix_api_version()
    {
        $this->responseJson([
            "jsonrpc" => "2.0",
            "result" => "4.0.0",
            "id" => 1
        ]);

        $this->assertTrue(version_compare($this->api->api_version(), "4.0.0", "="));
    }
}