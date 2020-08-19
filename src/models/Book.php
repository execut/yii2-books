<?php
namespace execut\books\models;

use execut\crudFields\Behavior;
use execut\crudFields\BehaviorStub;
use execut\crudFields\fields\Action;
use yii\db\ActiveRecord;
class Book extends ActiveRecord
{
    use BehaviorStub;
    const MODEL_NAME = '{n,plural,=0{Books} =1{Book} other{Books}}';
    public function behaviors() {
        if ($books = \yii::$app->get('books')) {
            $booksCrudFieldsPlugins = $books->getBooksCrudFieldsPlugins();
        }

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
                'plugins' => $booksCrudFieldsPlugins,
            ],
        ];
    }

    public static function tableName()
    {
        return 'example_books';
    }

    public function __toString()
    {
        return $this->name;
    }
}