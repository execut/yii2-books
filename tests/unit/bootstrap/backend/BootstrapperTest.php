<?php


namespace execut\books\bootstrap\backend;


use Codeception\Test\Unit;
use execut\books\models\Author;
use execut\books\models\Book;
use execut\crud\navigation\Configurator;
use execut\books\models\AllFields;
use execut\navigation\Component;

class BootstrapperTest extends Unit
{
    public function testBootstrapForAdmin() {
        $navigation = $this->getMockBuilder(Component::class)->getMock();
        $navigation->expects($this->at(0))
            ->method('addConfigurator')
            ->with([
                'class' => Configurator::class,
                'module' => 'books',
                'moduleName' => 'Books',
                'modelName' => AllFields::MODEL_NAME,
                'controller' => 'all-fields',
            ]);
        $navigation->expects($this->at(1))
            ->method('addConfigurator')
            ->with([
                'class' => Configurator::class,
                'module' => 'books',
                'moduleName' => 'Books',
                'modelName' => Book::MODEL_NAME,
                'controller' => 'books',
            ]);
        $navigation->expects($this->at(2))
            ->method('addConfigurator')
            ->with([
                'class' => Configurator::class,
                'module' => 'books',
                'moduleName' => 'Books',
                'modelName' => Author::MODEL_NAME,
                'controller' => 'authors',
            ]);

        $bootstrapper = new Bootstrapper();

        $bootstrapper->bootstrapForAdmin($navigation);
    }
}