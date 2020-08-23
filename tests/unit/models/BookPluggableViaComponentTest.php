<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\models;


use Codeception\Test\Unit;
use execut\books\Component;
use execut\crudFields\Plugin;

/**
 * BookPluggableViaComponentTest
 * @package execut\books
 */
class BookPluggableViaComponentTest extends Unit
{
    protected function _tearDown()
    {
        \yii::$app->setComponents([
            'books' => null,
        ]);
    }

    public function testPlugin()
    {
        $books = new Component();
        $plugin = $this->getMockBuilder(Plugin::class)->getMock();
        $plugin->expects($this->once())
            ->method('attach');
        $books->addBooksCrudFieldsPlugin($plugin);
        \yii::$app->setComponents([
            'books' => $books,
        ]);
        $model = new BookPluggableViaComponent();
    }
}
