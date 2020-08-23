<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\bootstrap;
use execut\crud\bootstrap\Bootstrapper;
use yii\helpers\ArrayHelper;

/**
 * Bootstrap for backend application
 * @package execut\books
 */
class Backend extends \execut\crud\bootstrap\Backend
{
    /**
     * {@inheritDoc}
     */
    public $moduleId = 'books';

    /**
     * {@inheritDoc}
     */
    public function getDefaultDepends()
    {
        return ArrayHelper::merge(parent::getDefaultDepends(), [
            'bootstrap' => [
                'booksCommon' => [
                    'class' => Common::class,
                ]
            ]
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getBootstrapper(): Bootstrapper
    {
        if ($this->bootstrapper === null) {
            $this->bootstrapper = new \execut\books\bootstrap\backend\Bootstrapper;
        }

        return $this->bootstrapper;
    }
}
