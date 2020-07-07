<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Hab\MeModule;

/**
 * Test the LocationController.
 */
class LocationControllerTest extends TestCase
{
    
    // Create the di container.
    protected $di;
    protected $controller;



    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new \Hab\MeModule\LocationController();
        $this->controller->setDI($this->di);
        // $this->controller->initialize();
    }



    /**
     * Test if body loaded.
     */
    public function testIndexAction()
    {
        global $di;

        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        // $di = $this->di;

        // Setup the controller
        $controller = new \Hab\MeModule\LocationController();
        $controller->setDI($this->di);
        // $controller->initialize();

        // Get response
        $res = $controller->indexAction();
        // var_dump($res->getBody());
        $exp = "Location";
        $body = $res->getBody();

        $this->assertContains($exp, $body);
    }

    /**
     * Test happy IP location.
     */
    public function testCheckActionPostHappy()
    {
        global $di;

        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        // $di = $this->di;

        // Setup the controller
        $controller = new \Hab\MeModule\LocationController();
        $controller->setDI($this->di);
        // $controller->initialize();
        $session = $di->get("session");

        // Setup post request
        // Can't properly set POST variable for som reason. Is this intentional?
        // Also don't know why I have to reference $di with $this keyword.
        // $this->di->get("request")->setPost("ip", "1.2.3.4");
        $this->di->get("request")->setGlobals(["post" => ["location" => "1.2.3.4"]]);

        // Get response
        $controller->indexActionPost();
        $res = $session->get("coords");
        $res = $res[0][1][2];
        // var_dump($res[0][1][2]);
        $exp = "1.2.3.4";

        $this->assertContains($exp, $res);
    }
    /**
     * Test address location.
     */
    public function testCheckActionPostHappy2()
    {
        global $di;

        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        // $di = $this->di;

        // Setup the controller
        $controller = new \Hab\MeModule\LocationController();
        $controller->setDI($this->di);
        // $controller->initialize();
        $session = $di->get("session");

        // Setup post request
        // Can't properly set POST variable for som reason. Is this intentional?
        // Also don't know why I have to reference $di with $this keyword.
        // $this->di->get("request")->setPost("ip", "1.2.3.4");
        $this->di->get("request")->setGlobals(["post" => ["location" => "sundsvall"]]);

        // Get response
        $controller->indexActionPost();
        $res = $session->get("coords");
        $res = $res[0][1][0];

        $this->assertIsArray($res);
    }
    /**
     * Test invalid IP & address location.
     */
    public function testCheckActionPostSad()
    {
        global $di;

        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        // $di = $this->di;

        // Setup the controller
        $controller = new \Hab\MeModule\LocationController();
        $controller->setDI($this->di);
        // $controller->initialize();
        $session = $di->get("session");

        // Setup post request
        // Can't properly set POST variable for som reason. Is this intentional?
        // Also don't know why I have to reference $di with $this keyword.
        // $this->di->get("request")->setPost("ip", "1.2.3.4");
        
        // Get response
        $this->di->get("request")->setGlobals(["post" => ["location" => "TownThatDoesNotExist"]]);
        $controller->indexActionPost();
        $res = $session->get("coords");
        $res = $res[0][0];
        $exp = null;
        $this->assertEquals($exp, $res);
        
        // Get response
        $this->di->get("request")->setGlobals(["post" => ["location" => "192.168.2.1"]]);
        $controller->indexActionPost();
        $res = $session->get("coords");
        $res = $res[0][0];
        $exp = null;
        $this->assertEquals($exp, $res);
    }
}