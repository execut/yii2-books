<?php
namespace execut\books\bootstrap;
use execut\books\Module;
use execut\yii\Bootstrap;
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