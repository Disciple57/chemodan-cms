# Чемодан CMS

Простая система управление сайтом, ориентированная в первую очередь на разработчиков.

[MIT license](https://opensource.org/licenses/MIT).

### Технология

CMS включает в себя ряд проектов с открытым исходным кодом:

* [Laravel] - v 6.14.0
* [Twitter Bootstrap]
* [jQuery]
* [JsRender]

## Установка

Распаковать содержание папки **chemodan-cms** в корневую директорию проекта

```sh
$ git clone https://github.com/Disciple57/shop-msk.git ./
```

Выполнить
```sh
$ composer install
```

Изменить значения атрибутов в файле .env в соответствии со своими настройками mySql

- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

Выполнить

```sh
$ php artisan migrate
```

Доступ к панели - http://[адрес]/admin 

При желании можно изменить параметр ADMIN_PANEL_URI в файле .env

[Laravel]: <https://laravel.com/>
[Twitter Bootstrap]: <https://getbootstrap.com/>
[jQuery]: <https://jquery.com/>
[JsRender]: <https://www.jsviews.com/>