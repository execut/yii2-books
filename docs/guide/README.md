# execut/yii2-books
## Principle of work

The module consists of the following blocks.
The principle of operation of each block can be seen in the documentation of the packages associated with it:
1. bootstrap - preloaders
    * Here CRUD navigation is configured using the [execut/yii2-navigation](https://github.com/execut/yii2-navigation) component
    * Preloaders are automated by the [execut\yii\Bootstrap](https://github.com/execut/yii2-base/blob/master/Bootstrap.php) class
1. controllers - controllers, work with [execut/yii2-crud](https://github.com/execut/yii2-crud)
1. mails - translations - regular i18n translations for the module, automatically configured in the preloader using the functionality
[execut\yii\Bootstrap](https://github.com/execut/yii2-base/blob/master/Bootstrap.php)
1. migrations - migrations, work with [execut/yii2-migration](https://github.com/execut/yii2-migration)
1. models - models, simplified [execut/yii2-crud-fields](https://github.com/execut/yii2-crud-fields)