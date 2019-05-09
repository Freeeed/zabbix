<?php

namespace ZabbixApi\Tests;

class UserApiTest extends ApiTest
{
    /** @test */
    public function it_can_login_a_user()
    {
        $this->responseJson([
            "jsonrpc" => "2.0",
            "result" => "0424bd59b807674191e7d77572075f33",
            "id" => 1
        ]);

        $auth = $this->api->user->login(['user' => 'User', 'password' => 'Password']);

        $this->assertEquals("0424bd59b807674191e7d77572075f33", $auth);
    }

    /** @test */
    public function it_can_logout_a_user()
    {
        $this->responseJson([
            "jsonrpc" => "2.0",
            "result" => true,
            "id" => 1
        ]);

        $response = $this->api->user->logout();

        $this->assertTrue($response);
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $this->responseJson([
            "jsonrpc" => "2.0",
            "result" => [
                "userids" => [
                    "12"
                ]
            ],
            "id" => 1
        ]);

        $response = $this->api->user->create([
            "alias" => "John",
            "passwd" => "Doe123",
            "usrgrps" => [
                [
                    "usrgrpid" => "7"
                ]
            ],
            "user_medias" => [
                [
                    "mediatypeid" => "1",
                    "sendto" => [
                        "support@company.com"
                    ],
                    "active" => 0,
                    "severity" => 63,
                    "period" => "1-7,00:00-24:00"
                ]
            ]
        ]);

        $this->assertEquals([
            "userids" => [
                "12"
            ]
        ], $response);
    }
}