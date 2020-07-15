<?php
namespace execut\books\migrations;

use execut\seo\migrations\AddFieldsHelper;
use execut\yii\migration\Migration;
use execut\yii\migration\Inverter;

class m200714_140947_addSeoExampleFields extends Migration
{
    public function initInverter(Inverter $i)
    {
        $helper = new AddFieldsHelper([
            'table' => $i->table('example_books'),
        ]);
        $helper->attach();
    }
}
