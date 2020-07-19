<?php
namespace execut\books\migrations;

use execut\yii\migration\Inverter;
use execut\yii\migration\Migration;

class m200708_105338_addBooksTable extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function initInverter(Inverter $i)
    {
        $i->table('example_books')->create([
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string()->notNull(),
        ]);
    }
}

