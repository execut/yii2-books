<?php
namespace execut\books\controllers;

use execut\books\models\Book;
use execut\crud\params\Crud;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
class BooksController extends Controller
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
            'modelClass' => Book::class,
            'modelName' => Book::MODEL_NAME,
        ]);
        return $crud->actions();
    }
}