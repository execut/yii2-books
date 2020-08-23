<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books;

/**
 * Module for demonstration yii2-crud-fields plugin system
 * @package execut\books
 */
class BooksModule extends \execut\booksNative\Module
{
    /**
     * @var string Controllers namespace
     */
    public $controllerNamespace = 'execut\booksNative\controllers';
    /**
     * @var array List of crud fields plugins for BookPluggable model
     */
    public $booksPlugins = [];
}
