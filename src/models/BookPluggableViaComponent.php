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

/**
 * Pluggable model of book
 * @package execut\books\models
 */
class BookPluggableViaComponent extends Book
{
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        if (\yii::$app->has('books')) {
            $books = \yii::$app->get('books');
            $booksCrudFieldsPlugins = $books->getBooksCrudFieldsPlugins();
        } else {
            $booksCrudFieldsPlugins = [];
        }

        return ArrayHelper::merge(parent::behaviors(), [
            Behavior::KEY => [
                'plugins' => $booksCrudFieldsPlugins,
            ]
        ]);
    }
}
