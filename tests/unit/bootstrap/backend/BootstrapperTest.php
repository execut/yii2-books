<?php


namespace execut\books\bootstrap\backend;


use Codeception\Test\Unit;
use execut\crud\navigation\Configurator;
use execut\books\models\AllFields;
use execut\navigation\Component;

class BootstrapperTest extends Unit
{
    public function testBootstrapForAdmin() {
        $navigation = $this->getMockBuilder(Component::class)->getMock();
        $navigation->expects($this->once())
            ->method('addConfigurator')
            ->with([
                'class' => Configurator::class,
                'module' => 'crudFieldsExample',
                'moduleName' => 'СRUD fields examples',
                'modelName' => AllFields::MODEL_NAME,
                'controller' => 'all-fields',
            ]);

        $bootstrapper = new Bootstrapper();

        $bootstrapper->bootstrapForAdmin($navigation);
    }
}