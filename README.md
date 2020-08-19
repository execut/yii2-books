# yii2-books
Module for managing books and their authors.
It is an example to demonstrate the integration of the following tools to simplify development on the Yii2 framework:
* [execut/yii2-crud](https://github.com/execut/yii2-crud)
* [execut/yii2-navigation](https://github.com/execut/yii2-navigation)
* [execut/yii2-migration](https://github.com/execut/yii2-migration)

The native version of this CRUD in pure Yii2 for comparison can be viewed here [execut/yii2-books-native](https://github.com/execut/yii2-books-native)

For license information check the [LICENSE](LICENSE.md)-file.

English documentation is at [docs/guide/README.md](https://github.com/execut/yii2-books/blob/master/docs/guide/README.md).

Русская документация здесь [docs/guide-ru/README.md](https://github.com/execut/yii2-books/blob/master/docs/guide-ru/README.md).

[![Latest Stable Version](https://poser.pugx.org/execut/yii2-books/v/stable.png)](https://packagist.org/packages/execut/yii2-books)
[![Total Downloads](https://poser.pugx.org/execut/yii2-books/downloads.png)](https://packagist.org/packages/execut/yii2-books)
[![Build Status](https://travis-ci.com/execut/yii2-books.svg?branch=master)](https://travis-ci.com/execut/yii2-books) 

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

Add to your common application configs:
```php
return [
    'bootstrap' => [
         'books' => [
            'class' => \execut\books\bootstrap\Auto::class,
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

![Books menu](https://raw.githubusercontent.com/execut/yii2-books/master/docs/guide/i/books-menu.jpg)
![Books CRUD list](https://raw.githubusercontent.com/execut/yii2-books/master/docs/guide/i/books-list.jpg)
![Books CRUD form](https://raw.githubusercontent.com/execut/yii2-books/master/docs/guide/i/books-form.jpg)

Authors example here [/books/authors/index](http://localhost/books/authors/index).

![Authors CRUD list](https://raw.githubusercontent.com/execut/yii2-books/master/docs/guide/i/authors-list.jpg)
![Authors CRUD form](https://raw.githubusercontent.com/execut/yii2-books/master/docs/guide/i/authors-form.jpg)

For more details please refer to the documentation [docs/guide/README.md](https://github.com/execut/yii2-books/blob/master/docs/guide/README.md).

Для более подробной информации обращайтесь к документации [docs/guide-ru/README.md](https://github.com/execut/yii2-books/blob/master/docs/guide-ru/README.md).