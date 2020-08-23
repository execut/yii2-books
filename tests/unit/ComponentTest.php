<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books;


use Codeception\Test\Unit;
use execut\crudFields\Plugin;

/**
 * ComponentTest
 * @package execut\books
 */
class ComponentTest extends Unit
{
    public function testAddPlugin() {
        $component = new Component();
        $plugin = $this->getMockForAbstractClass(Plugin::class);
        $component->addBooksCrudFieldsPlugin($plugin);
        $this->assertEquals([$plugin], $component->getBooksCrudFieldsPlugins());
    }
}
