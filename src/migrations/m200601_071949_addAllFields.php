<?php
/**
 * @author Mamaev Yuriy (eXeCUT)
 * @link https://github.com/execut
 * @copyright Copyright (c) 2020 Mamaev Yuriy (eXeCUT)
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */
namespace execut\books\migrations;
use execut\yii\migration\Migration;
use execut\yii\migration\Inverter;

/**
 * Class m200601_071949_addAllFields
 * @package execut\books
 */
class m200601_071949_addAllFields extends Migration
{
    /**
     * {@inheritDoc}
     */
    public function initInverter(Inverter $i)
    {
        $i->table('example_all_fields')
            ->create($this->defaultColumns([
                'bool' => $this->boolean(),
            ]))
            ->addForeignColumn('example_all_fields', false, null, 'has_one_id');
    }
}

