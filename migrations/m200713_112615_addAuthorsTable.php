<?php
namespace execut\books\migrations;

use execut\yii\migration\Inverter;
use execut\yii\migration\Migration;

class m200713_112615_addAuthorsTable extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function initInverter(Inverter $i)
    {
        $i->table('example_authors')->create($this->defaultColumns([
            'surname' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'short_description' => $this->text(),
            'biography' => $this->text(),
            'birthday' => $this->date(),
            'popularity' => $this->integer()->unsigned(),
            'email' => $this->string(),
            'image' => $this->binary(),
            'image_211' => $this->binary(),
            'image_name' => $this->string(),
            'image_extension' => $this->string(),
            'image_md5' => $this->string(64),
            'image_mime_type' => $this->string(),
            'main_book_id' => $this->integer()->unsigned()
        ]));
        $i->table('example_authors_vs_books')->create([
                'id' => $this->primaryKey(),
            ])
            ->addForeignColumn('example_authors', true)
            ->addForeignColumn('example_books', true);
    }
}
