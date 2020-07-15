<?php
namespace execut\books\models;
use execut\booksNative\models\AuthorVsBook;
use execut\crudFields\Behavior;
use execut\crudFields\BehaviorStub;
use execut\crudFields\fields\Action;
use execut\crudFields\fields\Date;
use execut\crudFields\fields\DropDown;
use execut\crudFields\fields\Editor;
use execut\crudFields\fields\Email;
use execut\crudFields\fields\HasManySelect2;
use execut\crudFields\fields\HasOneSelect2;
use execut\crudFields\fields\Image;
use execut\crudFields\fields\reloader\Reloader;
use execut\crudFields\fields\reloader\Target;
use execut\crudFields\fields\reloader\type\Periodically;
use execut\crudFields\ModelsHelperTrait;
use Imagine\Image\ImageInterface;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use yii\db\ActiveRecord;
class Author extends ActiveRecord
{
    use BehaviorStub, ModelsHelperTrait;
    public $imageFile = null;
    public function behaviors() {
        return $this->getStandardBehaviors($this->getStandardFields(['visible'], [
            'name' => [
                'label' => \yii::t('execut/crudExample', 'First Name'),
            ],
            'surname' => [
                'class' => \execut\crudFields\fields\StringField::class,
                'attribute' => 'surname',
                'required' => true,
            ],
            'short_description' => [
                'class' => \execut\crudFields\fields\Textarea::class,
                'attribute' => 'short_description',
            ],
            'biography' => [
                'class' => Editor::class,
                'attribute' => 'biography',
            ],
            'birthday' => [
                'class' => Date::class,
                'attribute' => 'birthday',
            ],
            'popularity' => [
                'class' => DropDown::class,
                'attribute' => 'popularity',
                'data' => [
                    1 => 'Low',
                    2 => 'Middle',
                    3 => 'Hight',
                ]
            ],
            'email' => [
                'class' => Email::class,
                'attribute' => 'email',
                'reloaders' => [new Reloader(new Periodically())]
            ],
            'image' => [
                'class' => Image::class,
                'sizes' => [
                    'image_211' => [
                        'width' => 211,
                        'mode' => ImageInterface::THUMBNAIL_OUTBOUND,
                    ],
                ],
                'attribute' => 'imageFile',
                'dataAttribute' => 'image',
                'previewRoute' => '/crudExample/authors/image',
                'fileNameAttribute' => 'image_name',
                'previewDataAttribute' => 'image_211',
                'fileExtensionAttribute' => 'image_extension',
                'md5Attribute' => 'image_md5',
                'fileMimeTypeAttribute' => 'image_mime_type',
            ],
            'mainBook' => [
                'class' => HasOneSelect2::class,
                'attribute' => 'main_book_id',
                'relation' => 'mainBook',
                'relationQuery' => $this->hasOne(Book::class, ['id' => 'main_book_id']),
                'url' => [
                    '/crudExample/books'
                ],
            ],
            'books' => [
                'class' => HasManySelect2::class,
                'attribute' => 'books',
                'relation' => 'books',
                'relationQuery' => $this->hasMany(Book::class, ['id' => 'example_book_id'])->via('vsBooks'),
                'url' => [
                    '/crudExample/books'
                ],
            ],
            'action' => [
                'class' => Action::class,
            ],
        ]), [
            Behavior::KEY => [
                'module' => 'crudExample',
            ],
            Behavior::RELATIONS_SAVER_KEY => [
                'class' => SaveRelationsBehavior::class,
                'relations' => [
                    'vsBooks'
                ]
            ]
        ]);
    }

    public function getVsBooks() {
        return $this->hasMany(AuthorVsBook::class, ['example_author_id' => 'id']);
    }

    public static function tableName()
    {
        return 'example_authors';
    }
}