# execut/yii2-books
Модуль для управления книгами и их авторами.
Является примером для демонстрации комплексной работы следующих инструментов упрощения разработки на фреймворке Yii2:
* [execut/yii2-crud](https://github.com/execut/yii2-crud)
* [execut/yii2-navigation](https://github.com/execut/yii2-navigation)
* [execut/yii2-migration](https://github.com/execut/yii2-migration)

Нативный вариант данного CRUD на чистом Yii2 для сравнения можно посмотреть здесь [execut/yii2-books-native](https://github.com/execut/yii2-books-native)
## Принцип работы

Модуль состоит из нескольких блоков:
1. bootstrap - предзагрузчики
    * Тут настраивается навигация CRUD-ов с помощью компонента [execut/yii2-navigation](https://github.com/execut/yii2-navigation)
    * Предзагрузчики автоматизированы классом [execut\yii\Bootstrap](https://github.com/execut/yii2-base/blob/master/Bootstrap.php)
1. controllers - контроллеры, работают с помощью [execut/yii2-crud](https://github.com/execut/yii2-crud)
1. messages - Переводы - обычные переводы i18n для модуля, автоматически настроены в предзагрузчике с помощью функционала
[execut\yii\Bootstrap](https://github.com/execut/yii2-base/blob/master/Bootstrap.php)
1. migrations - миграции, работают с помощью [execut/yii2-migration](https://github.com/execut/yii2-migration)
1. models - модели, упрощены [execut/yii2-crud-fields](https://github.com/execut/yii2-crud-fields)


### Предзагрузка
Как только была запущена установка пакета через composer require, composer подключил предзагрузчик execut\books\bootstrap\Auto к приложению в файл extensions.php.
Подробности о расширениях и их предзагрузке читайте в [официальной документации yii](https://www.yiiframework.com/doc/guide/2.0/ru/structure-extensions#bootstrapping-classes).
При запуске приложения происходит запуск этого прездагрузчика, который подключает другие предзагрузчики в зависимости от того, какое приложение было запущено.
execut\books\bootstrap\Console, если консольное.
Консольный предзагрузчик автоматически подключает папку миграций модуля к команде migratе.

execut\books\bootstrap\Backend, если backend.
Этот предзагрузчик настраивает навигацию разделов админки через execut\books\bootstrap\backend\Bootstrapper

execut\books\bootstrap\Common, если frontend.
Подключает все основные компоненты необходимые для работы модуля

### Вывод CRUD
Если приложение является бэкендом и запрос идёт к модулю книг, то происходит поиск контроллера в папке controllers.
Если он был найден, то с его помощью производится вывод раздела.
В методе контроллера actions() происходит конфигурация действий с помощью [execut/yii2-crud](https://github.com/execut/yii2-crud), необходимых для вывода CRUD.
Обращайтесь к [его документации](https://github.com/execut/yii2-crud) за подробностями.

## Расширение функционала модуля
Модуль позволяет расширять себя через систему плагинов yii2-crud-fields.
Читайте про неё [здесь](https://github.com/execut/yii2-crud-fields/blob/master/docs/guide-ru/plugin-system.md).

Допустим, нам необходимо в раздел книг добавить поля для SEO-тегов.
Для данных целей уже был написан плагин [yii2-crud-fields](https://github.com/execut/yii2-seo/blob/master/crudFields/Fields.php) в модуле yii2-seo.
Нам лишь нужно:
1. Подключить этот плагин к модели книг на стадии предзагрузки приложения с помощью вызова метода компонента execut\books\Component::addBooksCrudFieldsPlugin
1. Применить миграции для добавления новых полей в БД с помощью помощника execut\seo\FieldsAttacher.

Лучшим подходом это делать будет в рамках отдельного интеграционного приложения [execut/yii2-books-seo](https://github.com/execut/yii2-books-seo).
Тогда весь функционал по связи модулей yii2-books и yii2-seo будет инкапсулироваться в отдельном пакете.

Чтобы не вдаваться в подробности создания расширения yii2 и его подключения к проекту, давайте возьмём готовый пакет [execut/yii2-books-seo](https://github.com/execut/yii2-books-seo) и лишь подсмотрим в нём те два шага, которые нужны для расширения модуля:
1. Первый шаг производится в предзагрузчике интеграционного модуля [execut\booksSeo\bootstrap\Auto](https://github.com/execut/yii2-books-seo/blob/master/bootstrap/Auto.php).
Он подключается к приложению автоматически с помощью composer при установке пакета execut/yii2-books-seo.
2. Второй шаг - в миграции [execut\booksSeo\migrations\m200823_161757_addSeoFields](https://github.com/execut/yii2-books-seo/blob/master/migrations/m200823_161757_addSeoFields.php).

В результате установки расширения у нас появляются новая группа полей SEO:
![Расширенная форма](https://raw.githubusercontent.com/execut/yii2-books/master/docs/guide-ru/i/books-form-pluggable.jpg)

## Подключение модуля к Yii2 CMS
Чтобы подключить модуль к [execut/yii2-cms](https://github.com/execut/yii2-cms), ничего не нужно делать, он автоматически это произведёт на стадии предзагрузки.