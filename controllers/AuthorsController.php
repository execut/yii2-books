<?php


namespace execut\books\controllers;

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
            'modelName' => 'Authors',
        ]);
        return $crud->actions();
    }
}