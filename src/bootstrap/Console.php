<?php
namespace execut\books\bootstrap;
use execut\yii\Bootstrap;
class Console extends Bootstrap
{
    protected $_defaultDepends = [
        'bootstrap' => [
            'yii2-crud' => [
                'class' => \execut\crud\bootstrap\Console::class,
            ]
        ],
    ];
}