<?php


namespace execut\books\bootstrap;


use execut\books\Module;
use execut\yii\Bootstrap;
use yii\console\controllers\MigrateController;
use yii\i18n\PhpMessageSource;

class Common extends Bootstrap
{
    protected $isBootstrapI18n = true;
    protected $_defaultDepends = [
        'modules' => [
            'books' => [
                'class' => Module::class,
            ]
        ]
    ];
}