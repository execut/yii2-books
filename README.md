# yii2-books
Модуль для управления книгами и их авторами. Является примером для демонстрации комплексной работы следующих инструментов
для упрощения разработки на фреймворке Yii2:
* [execut/yii2-crud](https://github.com/execut/yii2-crud)
* [execut/yii2-navigation](https://github.com/execut/yii2-navigation)
* [execut/yii2-migration](https://github.com/execut/yii2-migration)

Нативный вариант данного CRUD на чистом Yii2 для сравнения можно посмотреть здесь [execut/yii2-books-native](https://github.com/execut/yii2-books-native)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

### Install

Either run

```
$ php composer.phar require execut/yii2-books "dev-master"
```

or add

```
"execut/yii2-books": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Configuration

Add to your application configs:
```php
return [
    'bootstrap' => [
         'books' => [
            'class' => \execut\books\bootstrap\Common::class,//For common application
            'class' => \execut\books\bootstrap\Backend::class,//For backend application
            'class' => \execut\books\bootstrap\Console::class,//For console application
        ],
    ],
];
```

Apply module migrations:
```shell script
./yii migrate/up --interactive=0
-> ...migration was applied.
-> 
-> Migrated up successfully.
```

## Usage
Open books example url in your browser [/books/books/index](http://localhost/books/books/index).

Authors example here [/books/authors/index](http://localhost/books/authors/index).

## Принцип работы

Модуль состоит из следующих блоков. Принцип работы каждого блока можно увидеть в документации пакетов с ним связанным:
1. bootstrap - предзагрузчики
    * Тут настраивается навигация CRUD-ов с помощью компонента [execut/yii2-navigation](https://github.com/execut/yii2-navigation)
    * Предзагрузчики автоматизированы классом [execut\yii\Bootstrap](https://github.com/execut/yii2-base/blob/master/Bootstrap.php)
1. controllers - контроллеры, работают с помощью [execut/yii2-crud](https://github.com/execut/yii2-crud)
1. messages - Переводы - обычные переводы i18n для модуля, автоматически настроены в предзагрузчике с помощью функционала
[execut\yii\Bootstrap](https://github.com/execut/yii2-base/blob/master/Bootstrap.php)
1. migrations - миграции, работают с помощью [execut/yii2-migration](https://github.com/execut/yii2-migration)
1. models - модели, упрощены [execut/yii2-crud-fields](https://github.com/execut/yii2-crud-fields)
