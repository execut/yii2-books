<?php


namespace execut\books\models;


use Codeception\PHPUnit\TestCase;
use execut\crudFields\fields\Id;
use execut\crudFields\fields\StringField;

class BookTest extends TestCase
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