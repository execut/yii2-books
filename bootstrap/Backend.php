<?php


namespace execut\books\bootstrap;
use execut\crud\bootstrap\Bootstrapper;

class Backend extends \execut\crud\bootstrap\Backend
{
    public $moduleId = 'crudFieldsExample';
    protected $_defaultDepends = [
        'bootstrap' => [
            'crudFieldsExampleCommon' => [
                'class' => Common::class,
            ]
        ]
    ];

    /**
     * @return Bootstrapper
     */
    public function getBootstrapper(): Bootstrapper
    {
        if ($this->bootstrapper === null) {
            $this->bootstrapper = new \execut\books\bootstrap\backend\Bootstrapper;
        }

        return $this->bootstrapper;
    }
}