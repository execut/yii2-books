<?php


namespace execut\books\models;

use Codeception\Test\Unit;
use execut\crudFields\fields\Id;
use execut\crudFields\fields\StringField;

class BookTest extends Unit
{
    public function testIdField() {
        $model = new Book();
        $field = $model->getField('id');
        $this->assertInstanceOf(Id::class, $field);
    }

    public function testNameField() {
        $model = new Book();
        $field = $model->getField('name');
        $this->assertInstanceOf(StringField::class, $field);
        $this->assertTrue($field->required);
    }
}