<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace execut\books;


class Component extends \yii\base\Component
{
    protected $booksPlugins = [];
    public function addBooksCrudFieldsPlugin($plugin) {
        $this->booksPlugins[] = $plugin;
    }

    public function getBooksCrudFieldsPlugins() {
        return $this->booksPlugins;
    }
}