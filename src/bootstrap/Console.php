<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\bootstrap;
use execut\yii\Bootstrap;

/**
 * Bootstrap for console application
 * @package execut\books
 */
class Console extends Bootstrap
{
    /**
     * {@inheritdoc}
     */
    protected $_defaultDepends = [
        'bootstrap' => [
            'yii2-crud' => [
                'class' => \execut\crud\bootstrap\Console::class,
            ]
        ],
    ];
}
