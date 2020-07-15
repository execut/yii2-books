<?php
namespace execut\books\bootstrap;
use execut\crud\bootstrap\Bootstrapper;
class Backend extends \execut\crud\bootstrap\Backend
{
    public $moduleId = 'books';
    protected $_defaultDepends = [
        'bootstrap' => [
            'booksCommon' => [
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