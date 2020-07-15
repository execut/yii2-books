<?php


namespace execut\books\bootstrap\backend;


use execut\crud\navigation\Configurator;
use execut\books\models\AllFields;
use execut\navigation\Component;

class Bootstrapper implements \execut\crud\bootstrap\Bootstrapper
{
    public function bootstrapForAdmin(Component $navigation)
    {
        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'crudFieldsExample',
            'moduleName' => 'СRUD fields examples',
            'modelName' => AllFields::MODEL_NAME,
            'controller' => 'all-fields',
        ]);
    }
}