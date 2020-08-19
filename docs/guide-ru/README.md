# execut/yii2-books
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