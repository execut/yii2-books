<?php


namespace execut\books\bootstrap;


use Codeception\Test\Unit;
use execut\books\Module;

class CommonTest extends Unit
{
    public function testBootstrap() {
        $bootstrap = new Common;
        $bootstrap->bootstrap(\yii::$app);
        $this->assertInstanceOf(Module::class, \yii::$app->getModule('books'));
    }
}