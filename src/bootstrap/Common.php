<?php
namespace execut\books\bootstrap;
use execut\books\Component;
use execut\books\Module;
use execut\yii\Bootstrap;
class Common extends Bootstrap
{
    protected $isBootstrapI18n = true;
    protected $_defaultDepends = [
        'bootstrap' => [
            'yii2-crud' => [
                'class' => \execut\crud\Bootstrap::class,
            ]
        ],
        'components' => [
            'books' => [
                'class' => Component::class,
            ],
        ],
        'modules' => [
            'books' => [
                'class' => Module::class,
            ]
        ]
    ];
}