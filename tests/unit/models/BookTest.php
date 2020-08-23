<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\models;

use Codeception\Test\Unit;
use execut\crudFields\fields\Id;
use execut\crudFields\fields\StringField;

/**
 * BookTest
 * @package execut\books
 */
class BookTest extends Unit
{
    public function testIdField()
    {
        $model = new Book();
        $field = $model->getField('id');
        $this->assertInstanceOf(Id::class, $field);
    }

    public function testNameField()
    {
        $model = new Book();
        $field = $model->getField('name');
        $this->assertInstanceOf(StringField::class, $field);
        $this->assertTrue($field->required);
    }
}
