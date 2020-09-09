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
$ git clone https://github.com/Disciple57/chemodan-cms.git ./
```

Выполнить
```sh
$ cp .env.example .env
```

Изменить переменные в файле .env в соответствии с вашими настройками mySql
```sh
DB_DATABASE=имя базы данных
DB_USERNAME=пользователь
DB_PASSWORD=пароль
```

Выполнить

```sh
$ composer install
$ php artisan migrate --seed
$ php artisan key:generate
```

Доступ к панели - http://[сайт]/admin 

При желании можно изменить параметр ADMIN_PANEL_URI в файле .env

Логин/пароль: **superadmin**

[Laravel]: <https://laravel.com/>
[Twitter Bootstrap]: <https://getbootstrap.com/>
[jQuery]: <https://jquery.com/>
[JsRender]: <https://www.jsviews.com/>