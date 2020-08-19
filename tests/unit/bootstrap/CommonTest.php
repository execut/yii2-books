<?php


namespace execut\books\bootstrap;


use Codeception\Test\Unit;
use execut\books\Module;
use yii\helpers\UnsetArrayValue;
use yii\web\Application;
use yii\web\User;

class CommonTest extends Unit
{
    public function testBootstrap() {
        $bootstrap = new Common([
            'depends' => [
                'bootstrap' => new UnsetArrayValue(),
            ],
        ]);
        $bootstrap->bootstrap(\yii::$app);
        $this->assertInstanceOf(Module::class, \yii::$app->getModule('books'));
    }
}