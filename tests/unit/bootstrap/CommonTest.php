<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\bootstrap;


use Codeception\Test\Unit;
use execut\books\Component;
use execut\books\Module;
use yii\helpers\UnsetArrayValue;
use yii\web\Application;
use yii\web\User;

/**
 * CommonTest
 * @package execut\books
 */
class CommonTest extends Unit
{
    public function testBootstrap()
    {
        $bootstrap = new Common([
            'depends' => [
                'bootstrap' => new UnsetArrayValue(),
            ],
        ]);
        $bootstrap->bootstrap(\yii::$app);
        $this->assertInstanceOf(Module::class, \yii::$app->getModule('books'));
        $this->assertInstanceOf(Component::class, \yii::$app->get('books'));
    }
}