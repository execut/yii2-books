<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
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