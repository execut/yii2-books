<?php
namespace execut\books\models;


use Codeception\PHPUnit\TestCase;
use execut\crudFields\fields\Action;
use execut\crudFields\fields\Date;
use execut\crudFields\fields\DropDown;
use execut\crudFields\fields\Editor;
use execut\crudFields\fields\Email;
use execut\crudFields\fields\HasManySelect2;
use execut\crudFields\fields\HasOneSelect2;
use execut\crudFields\fields\Id;
use execut\crudFields\fields\Image;
use execut\crudFields\fields\StringField;
use execut\crudFields\fields\Textarea;
use yii\db\ActiveQuery;

class AuthorTest extends TestCase
{
    public function testIdField() {
        $model = new Author();
        $field = $model->getField('id');
        $this->assertInstanceOf(Id::class, $field);
    }

    public function testNameField() {
        $model = new Author();
        $field = $model->getField('name');
        $this->assertInstanceOf(StringField::class, $field);
        $this->assertTrue($field->required);
    }

    public function testAction() {
        $model = new Author();
        $field = $model->getField('action');
        $this->assertInstanceOf(Action::class, $field);
    }

    public function testCreatedField() {
        $model = new Author();
        $field = $model->getField('created');
        $this->assertInstanceOf(Date::class, $field);
    }

    public function testUpdatedField() {
        $model = new Author();
        $field = $model->getField('updated');
        $this->assertInstanceOf(Date::class, $field);
    }

    public function testSurnameField() {
        $model = new Author();
        $field = $model->getField('name');
        $this->assertInstanceOf(StringField::class, $field);
        $this->assertTrue($field->required);
    }

    public function testShortdescriptionField() {
        $model = new Author();
        $field = $model->getField('short_description');
        $this->assertInstanceOf(Textarea::class, $field);
    }

    public function testBiographyField() {
        $model = new Author();
        $field = $model->getField('biography');
        $this->assertInstanceOf(Editor::class, $field);
    }

    public function testBirthdate() {
        $model = new Author();
        $field = $model->getField('birthday');
        $this->assertInstanceOf(Date::class, $field);
    }
    
    public function testPopularity() {
        $model = new Author();
        $field = $model->getField('popularity');
        $this->assertInstanceOf(DropDown::class, $field);
        $this->assertEquals(Author::POPULARITY_LIST, $field->data);
    }

    public function testEmail() {
        $model = new Author();
        $field = $model->getField('email');
        $this->assertInstanceOf(Email::class, $field);
    }

    public function testImage() {
        $model = new Author();
        $field = $model->getField('image');
        $this->assertInstanceOf(Image::class, $field);
    }

    public function testMainBook() {
        $model = new Author();
        $field = $model->getField('mainBook');
        $this->assertInstanceOf(HasOneSelect2::class, $field);
        $this->assertEquals([
            '/booksNative/books'
        ], $field->url);
        $relationQuery = $field->getRelationQuery();
        $this->assertInstanceOf(ActiveQuery::class, $relationQuery);
        $this->assertEquals(['id' => 'main_book_id'], $relationQuery->link);
    }

    public function testBooks() {
        $model = new Author();
        $field = $model->getField('books');
        $this->assertInstanceOf(HasManySelect2::class, $field);
        $this->assertEquals([
            '/booksNative/books'
        ], $field->url);
        $this->assertEquals('books', $field->getRelationName());
        $relationQuery = $field->getRelationQuery();
        $this->assertInstanceOf(ActiveQuery::class, $relationQuery);
        $this->assertEquals(['id' => 'example_book_id'], $relationQuery->link);
        $via = $relationQuery->via;
        $this->assertCount(3, $via);
        $this->assertEquals('vsBooks', $via[0]);
    }
}