<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\controllers;

use execut\actions\Action;
use execut\actions\action\adapter\File;
use execut\books\models\Author;
use execut\crud\params\Crud;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * CRUD of Authors controller
 * @package execut\books
 */
class AuthorsController extends Controller
{
    /**
     * {@inheritDoc}
     */
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

    /**
     * {@inheritDoc}
     */
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
