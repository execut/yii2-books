<?php


namespace execut\books;


class Module extends \yii\base\Module implements \execut\crud\bootstrap\Module
{
    public function getAdminRole() {
        return 'crud_fields_example_admin';
    }
}