<?php
namespace execut\books;
class Module extends \yii\base\Module implements \execut\crud\bootstrap\Module
{
    public function getAdminRole() {
        return 'books_admin';
    }
}