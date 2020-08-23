<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\models;

use execut\crudFields\Behavior;
use execut\crudFields\BehaviorStub;
use execut\crudFields\fields\Action;
use yii\db\ActiveRecord;

/**
 * Book model
 * @package execut\books\models
 */
class Book extends ActiveRecord
{
    use BehaviorStub;
    /**
     * Model name label for translations
     */
    const MODEL_NAME = '{n,plural,=0{Books} =1{Book} other{Books}}';

    /**
     * {@inheritDoc}
     */
    public function behaviors() {
        return [
            Behavior::KEY => [
                'class' => Behavior::class,
                'fields' => [
                    'id' => [
                        'class' => \execut\crudFields\fields\Id::class,
                    ],
                    'name' => [
                        'class' => \execut\crudFields\fields\StringField::class,
                        'attribute' => 'name',
                        'required' => true,
                    ],
                    'action' => [
                        'class' => Action::class,
                    ]
                ],
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public static function tableName()
    {
        return 'example_books';
    }

    /**
     * Returns string of model name for CRUD
     */
    public function __toString()
    {
        return $this->name;
    }
}
