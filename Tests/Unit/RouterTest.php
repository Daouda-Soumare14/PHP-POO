<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Router\path\Router;

class RouterTest extends TestCase
{
    public function test_it_registers_get_routes(): void
    {
        $router = new Router();
        $router->get('/Prof_Jatsu_Youtube_Routeur/public/index.php', ['Controllers\controller\HomeController', 'index']);

        $this->assertEquals(
            ['GET' => ['/Prof_Jatsu_Youtube_Routeur/public/index.php' => ['Controllers\controller\HomeController', 'index']]],
            $router->getRoutes()
        );
    }

    public function test_it_registers_post_routes(): void
    {
        $router = new Router();
        $router->post('/Prof_Jatsu_Youtube_Routeur/public/index.php', ['Controllers\controller\HomeController', 'index']);

        $this->assertEquals(
            ['POST' => ['/Prof_Jatsu_Youtube_Routeur/public/index.php' => ['Controllers\controller\HomeController', 'index']]],
            $router->getRoutes()
        );
    }

    // public function test_there_is_no_routes_before_registering_routes(): void
    // {
    //     $router = new Router();

    //     $this->assertEmpty($router->getRoutes());
    // }
}

