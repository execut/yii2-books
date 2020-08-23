# execut/yii2-books
Module for managing books and their authors.
It is an example to demonstrate the complex work of the following tools to simplify development on the Yii2 framework:
* [execut/yii2-crud](https://github.com/execut/yii2-crud)
* [execut/yii2-navigation](https://github.com/execut/yii2-navigation)
* [execut/yii2-migration](https://github.com/execut/yii2-migration)

The native version of this CRUD in native Yii2 for comparison can be viewed here [execut/yii2-books-native](https://github.com/execut/yii2-books-native)
## Working principe

The module consists of several blocks:
1. bootstrap - preloaders
    * Here CRUD navigation is configured using the component [execut/yii2-navigation](https://github.com/execut/yii2-navigation)
    * Preloaders are automated by the class [execut\yii\Bootstrap](https://github.com/execut/yii2-base/blob/master/Bootstrap.php)
1. controllers - controllers working with [execut/yii2-crud](https://github.com/execut/yii2-crud)
1. messages - Translations - regular i18n translations for the module, automatically configured in the preloader using the functionality
[execut\yii\Bootstrap](https://github.com/execut/yii2-base/blob/master/Bootstrap.php)
1. migrations - migrations work with [execut/yii2-migration](https://github.com/execut/yii2-migration)
1. models - models, simplified [execut/yii2-crud-fields](https://github.com/execut/yii2-crud-fields)


### Preload
As soon as the package installation was started via composer require, composer connected the execut\books\bootstrap\Auto preloader to the application in the extensions.php file.
Read more about extensions and their preloading in the [official yii documentation](https://www.yiiframework.com/doc/guide/2.0/en/structure-extensions#bootstrapping-classes).
When the application is launched, this preloader is launched, which connects other preloaders depending on which application was launched.
execut\books\bootstrap\Console, if console.
The console preloader automatically connects the module migrations folder to the migrate command.

execut\books\bootstrap\Backend if backend.
This preloader configures the navigation of admin sections via execut\books\bootstrap\backend\Bootstrapper.

execut\books\bootstrap\Common, если frontend.
Connects all the main components necessary for the module to work.

### CRUD output
If the application is a backend and the request goes to the books module, then the controller is searched in the controllers folder.
If it was found, then it is used to display the section.
In the controller's actions() method, the actions are configured using [execut/yii2-crud](https://github.com/execut/yii2-crud) required for CRUD output.
See its [documentation](https://github.com/execut/yii2-crud) for details.

## Extending the module functionality
The module allows you to expand itself through the plugin system yii2-crud-fields.
Read about her [here](https://github.com/execut/yii2-crud-fields/blob/master/docs/guide/plugin-system.md).

Let's say we need to add fields for SEO tags to the books section.
For these purposes, a plugin [yii2-crud-fields](https://github.com/execut/yii2-seo/blob/master/crudFields/Fields.php) has already been written in the yii2-seo module
We just need:
1. Connect this plugin to the book model at the preloading stage of the application by calling the component method execut\books\Component::addBooksCrudFieldsPlugin
1. Apply migrations to add new fields to the database using the assistant execut\seo\FieldsAttacher.

The best approach to do this would be within a separate integration application [execut/yii2-books-seo](https://github.com/execut/yii2-books-seo).
Then all the functionality for linking the yii2-books and yii2-seo modules will be encapsulated in a separate package.

In order not to go into the details of creating the yii2 extension and connecting it to the project, let's take a ready-made package [execut/yii2-books-seo](https://github.com/execut/yii2-books-seo) and just look in it for the two steps that are needed to extend the module
1. The first step is done in the preloader of the integration module [execut\booksSeo\bootstrap\Auto](https://github.com/execut/yii2-books-seo/blob/master/bootstrap/Auto.php).
It connects to the app automatically using composer when installing the package execut/yii2-books-seo.
2. The second step is in migration [execut\booksSeo\migrations\m200823_161757_addSeoFields](https://github.com/execut/yii2-books-seo/blob/master/migrations/m200823_161757_addSeoFields.php).

As a result of installing the extension, we have a new group of SEO fields:
![Extended form](https://raw.githubusercontent.com/execut/yii2-books/master/docs/guide/i/books-form-pluggable.jpg)

## Connecting the module to Yii2 CMS
To connect the module to [execut/yii2-cms](https://github.com/execut/yii2-cms), you do not need to do anything, it will automatically do this at the preload stage.