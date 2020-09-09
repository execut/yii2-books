<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\bootstrap\backend;

use execut\books\models\Author;
use execut\books\models\Book;
use execut\crud\navigation\Configurator;
use execut\books\models\AllFields;
use execut\navigation\Component;

/**
 * Class Bootstrapper
 * @package execut\books\bootstrap\backend
 */
class Bootstrapper implements \execut\crud\bootstrap\Bootstrapper
{
    /**
     * {@inheritDoc}
     */
    public function bootstrapForAdmin(Component $navigation)
    {
        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'books',
            'moduleName' => 'Books',
            'modelName' => Book::MODEL_NAME,
            'controller' => 'books',
        ]);

        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'books',
            'moduleName' => 'Books',
            'modelName' => Author::MODEL_NAME,
            'controller' => 'authors',
        ]);
    }
}