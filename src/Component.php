<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace execut\books;

use \execut\crudFields\Plugin;

/**
 * Component for books module extending via plugins
 * @package execut\books
 */
class Component extends \yii\base\Component
{
    /**
     * @var array List of books plugins
     */
    protected $booksPlugins = [];

    /**
     * Add new books crud fields plugin
     * @param Plugin $plugin
     */
    public function addBooksCrudFieldsPlugin(Plugin $plugin) {
        $this->booksPlugins[] = $plugin;
    }

    /**
     * Returns available plugins
     * @return array
     */
    public function getBooksCrudFieldsPlugins() {
        return $this->booksPlugins;
    }
}
