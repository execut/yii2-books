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
use execut\crudFields\fields\Boolean;
use execut\crudFields\fields\Date;
use execut\crudFields\fields\Group;
use execut\crudFields\fields\HasOneSelect2;
use execut\crudFields\fields\Id;
use execut\crudFields\fields\reloader\Reloader;
use execut\crudFields\fields\reloader\Target;
use execut\crudFields\fields\reloader\type\Dependent;
use execut\crudFields\fields\reloader\type\Periodically;
use execut\crudFields\fields\StringField;
use execut\crudFields\ModelsHelperTrait;
use yii\db\ActiveRecord;

/**
 * AllFields model
 * @package execut\books
 */
class AllFields extends ActiveRecord
{
    use BehaviorStub, ModelsHelperTrait;

    /**
     * Model name label for translations
     */
    const MODEL_NAME = '{n,plural,=0{All fields} =1{All field} other{All fields}}';

    /**
     * {@inheritDoc}
     */
    public function behaviors() {
        $hasOneField = new HasOneSelect2([
            'attribute' => 'has_one_id',
            'relation' => 'hasOne',
            'relationQuery' => $this->hasOne(self::class, [
                'id' => 'has_one_id',
            ]),
            'orderByAttribute' => false,
            'url' => [
                '/books/all-fields',
            ],
        ]);

        $type = new Dependent();

        $target = new Target($hasOneField);
        $target->setValues([function () {
            return $this->findRecordForUpdateWhenSpecificValueSelected();
        }]);
        $onChangeSpecificValueReloader = new Reloader($type, [
            $target,
        ]);

        $target = new Target($hasOneField);
        $onChangeReloader = new Reloader($type, [
            $target,
        ]);

        $target = new Target($hasOneField);
        $target->setWhenIsEmpty(true);
        $onChangeEmptyReloader = new Reloader($type, [
            $target,
        ]);

        $target = new Target($hasOneField);
        $target->setWhenIsEmpty(false);
        $onChangeNotEmptyReloader = new Reloader($type, [
            $target,
        ]);
        return [
            'fields' => [
                'class' => Behavior::class,
                'fields' => [
                    'id' => [
                        'class' => Id::class,
                    ],
                    'name' => [
                        'class' => StringField::class,
                        'required' => true,
                        'attribute' => 'name',
                    ],
                    'bool' => [
                        'class' => Boolean::class,
                        'attribute' => 'bool',
                    ],
                    'hasOne' => $hasOneField,
                    'periodically_updated' => [
                        'attribute' => 'periodically_updated',
                        'field' => [
                            'displayOnly' => true,
                            'attribute' => 'periodically_updated',
                            'value' => function () {
                                return date('Y-m-d H:i:s') . '. Flag ' . ($this->bool ? 'yes' : 'no');
                            },
                        ],
                        'reloaders' => [new Reloader(new Periodically())],
                    ],
                    'periodicallyUpdatedWidget' => [
                        'class' => HasOneSelect2::class,
                        'attribute' => 'periodically_updated_widget_id',
                        'relation' => 'periodicallyUpdatedWidget',
                        'relationQuery' => $this->hasOne(self::class, [
                            'id' => 'periodically_updated_widget_id',
                        ]),
                        'orderByAttribute' => false,
                        'reloaders' => [new Reloader(new Periodically())],
                    ],
                    'record_for_update_when_a_specific_value_selected' => [
                        'class' => Boolean::class,
                        'attribute' => 'record_for_update_when_a_specific_value_selected',
                    ],
                    'updated_fields' => [
                        'class' => Group::class,
                        'label' => \yii::t('execut/books', 'Updated Fields'),
                    ],
                    'change_updated' => [
                        'class' => Date::class,
                        'attribute' => 'change_updated',
                        'isTime' => true,
                        'defaultValue' => date('Y-m-d H:i:s'),
                        'reloaders' => [$onChangeReloader],
                    ],
                    'specific_value_selected_updated' => [
                        'class' => Date::class,
                        'attribute' => 'specific_value_selected_updated',
                        'isTime' => true,
                        'defaultValue' => date('Y-m-d H:i:s'),
                        'reloaders' => [$onChangeSpecificValueReloader],
                    ],
                    'empty_updated' => [
                        'class' => Date::class,
                        'attribute' => 'empty_updated',
                        'isTime' => true,
                        'defaultValue' => date('Y-m-d H:i:s'),
                        'reloaders' => [$onChangeEmptyReloader],
                    ],
                    'not_empty_updated' => [
                        'class' => Date::class,
                        'attribute' => 'not_empty_updated',
                        'isTime' => true,
                        'defaultValue' => date('Y-m-d H:i:s'),
                        'reloaders' => [$onChangeNotEmptyReloader],
                    ]
                ]
            ],
        ];
    }

    /**
     * Returns record for update when specific value selected
     */
    public function findRecordForUpdateWhenSpecificValueSelected()
    {
        return self::find()->andWhere('record_for_update_when_a_specific_value_selected')->select('id')->scalar();
    }

    /**
     * {@inheritDoc}
     */
    public static function tableName()
    {
        return 'example_all_fields';
    }
}
