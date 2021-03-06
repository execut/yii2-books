<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\controllers;

use execut\books\models\BookPluggableViaComponent;
use execut\crud\params\Crud;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Class AuthorsController
 * @package execut\books
 */
class BooksController extends Controller
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
            'modelClass' => BookPluggableViaComponent::class,
            'modelName' => BookPluggableViaComponent::MODEL_NAME,
        ]);
        return $crud->actions();
    }
}
