<?php


namespace execut\books\controllers;

use execut\actions\Action;
use execut\actions\action\adapter\File;
use execut\books\models\Author;
use execut\books\models\Book;
use execut\crud\params\Crud;
use execut\books\models\AllFields;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class AuthorsController extends Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [$this->module->getAdminRole()],
                    ],
                ],
            ],
        ]);
    }

    public function actions()
    {
        $crud = new Crud([
            'modelClass' => Author::class,
            'modelName' => Author::MODEL_NAME,
        ]);
        return $crud->actions([
            'image' => [
                'class' => Action::class,
                'adapter' => [
                    'class' => File::class,
                    'modelClass' => Author::class,
                    'dataAttribute' => 'image_211',
                    'nameAttribute' => 'image_name',
                    'mimeTypeAttribute' => 'image_mime_type',
                    'extensionAttribute' => 'image_extension',
                ],
            ]
        ]);
    }
}