<?php
namespace execut\books\bootstrap;
use execut\crud\bootstrap\Bootstrapper;
use yii\helpers\ArrayHelper;

class Backend extends \execut\crud\bootstrap\Backend
{
    public $moduleId = 'books';
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