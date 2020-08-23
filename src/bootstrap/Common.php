<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\bootstrap;
use execut\books\Component;
use execut\books\Module;
use execut\yii\Bootstrap;

/**
 * Base bootstrap class
 * @package execut\books
 */
class Common extends Bootstrap
{
    /**
     * {@inheritDoc}
     */
    protected $isBootstrapI18n = true;
    /**
     * {@inheritDoc}
     */
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