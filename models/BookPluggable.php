<?php
namespace execut\books\models;
use execut\crudFields\Behavior;
use yii\helpers\ArrayHelper;

class BookPluggable extends Book
{
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            Behavior::KEY => [
                'plugins' => \yii::$app->getModule('booksNative')->booksPlugins,
            ]
        ]);
    }
}