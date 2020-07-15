<?php


namespace execut\books\bootstrap;


use Codeception\Test\Unit;
use execut\books\bootstrap\backend\Bootstrapper;

class BackendTest extends Unit
{
    public function testBootstrap() {
        $bootstrap = new Backend();

        $this->assertInstanceOf(Bootstrapper::class, $bootstrap->getBootstrapper());
    }
}