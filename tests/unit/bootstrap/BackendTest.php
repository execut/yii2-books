<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\bootstrap;


use Codeception\Test\Unit;
use execut\books\bootstrap\backend\Bootstrapper;

/**
 * BackendTest
 * @package execut\books
 */
class BackendTest extends Unit
{
    public function testBootstrap()
    {
        $bootstrap = new Backend();
        $this->assertInstanceOf(Bootstrapper::class, $bootstrap->getBootstrapper());
    }
}
