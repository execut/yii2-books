<?php
namespace execut\books;
class Module extends \yii\base\Module implements \execut\crud\bootstrap\Module
{
    public $adminRole = '@';
    public function getAdminRole() {
        return $this->adminRole;
    }
}