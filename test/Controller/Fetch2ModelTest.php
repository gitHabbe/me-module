<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Hab\MeModule;

/**
 * Test the SampleJsonController.
 */
class Fetch2ModelTest extends TestCase
{
    public function testFetchMethod()
    {
        $fetch = new \Hab\MeModule\Fetch2("GET", "1.2.3.4");
        $fetch->setMethod("POST");
        $res = $fetch->getMethod();
        $exp = "POST";
        $this->assertEquals($res, $exp);
    }
    public function testFetchURL()
    {
        $fetch = new \Hab\MeModule\Fetch2("GET", "1.2.3.4");
        $fetch->setURL("4.3.2.1");
        $res = $fetch->getMethod();
        $exp = "GET";
        $this->assertEquals($res, $exp);
    }
    public function testFetchPOST()
    {
        $fetch = new \Hab\MeModule\Fetch2();
        $data = [
            "title" => "foo",
            "body" => "bar",
            "userId" => "1"
        ];
        $res = $fetch->fetch("POST", "https://jsonplaceholder.typicode.com/posts", $data);
        $res = json_decode($res, true);
        $this->assertIsArray($res);
    }
    public function testFetchPUT()
    {
        $fetch = new \Hab\MeModule\Fetch2();
        $data = [
            "title" => "test",
            "body" => "test",
            "userId" => "1"
        ];
        $res = $fetch->fetch("PUT", "https://jsonplaceholder.typicode.com/posts/1", $data);
        $res = json_decode($res, true);
        $this->assertIsArray($res);
    }
    public function testFetchDELETE()
    {
        $fetch = new \Hab\MeModule\Fetch2();
        $res = $fetch->fetch("DELETE", "https://jsonplaceholder.typicode.com/posts/3");
        $this->assertIsNotArray($res);
    }
    public function testFetchBadMethod()
    {
        $fetch = new \Hab\MeModule\Fetch2();
        $res = $fetch->fetch("ERROR", "https://jsonplaceholder.typicode.com/posts/3");
        $exp = false;
        $this->assertEquals($res, $exp);
    }
}
