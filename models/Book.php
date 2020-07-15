<?php
namespace execut\books\models;

use execut\crudFields\Behavior;
use execut\crudFields\BehaviorStub;
use execut\crudFields\fields\Action;
use yii\db\ActiveRecord;
class Book extends ActiveRecord
{
    use BehaviorStub;
    public function behaviors() {
        return [
            Behavior::KEY => [
                'class' => Behavior::class,
                'module' => 'crudExample',
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

    public static function tableName()
    {
        return 'example_books';
    }
}