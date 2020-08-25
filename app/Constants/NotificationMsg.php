<?php

namespace App\Constants;

use App\Constants\NotificationCode as Code;


class NotificationMsg
{
    const USERS = [
        Code::STORE => 'Пользователь создан',
        Code::UPDATE => 'Данные пользователя изменены',
        Code::DELETE => 'Пользователь удалён',
    ];
    const PAGES = [
        Code::STORE => 'Страница создана',
        Code::UPDATE => 'Страница изменена',
        Code::DELETE => 'Страница удалена',
        Code::GENERATE => 'Страницы сгенерированы'
    ];
    const FONTS = [
        Code::STORE => 'Шрифт добавлен',
        Code::DELETE => 'Шрифт удалён',
    ];
    const COLORS = [
        Code::STORE => 'Цвет добавлен в набор',
        Code::UPDATE => 'Цвет изменён',
        Code::DELETE => 'Цвет удален из набора',
        Code::SORTING => 'Порядок сортировки сохранен',
    ];
    const IMAGES = [
        Code::STORE => 'Изображение добавлено',
        Code::UPDATE => 'Изображение заменено',
        Code::DELETE => 'Изображение удалено',
        Code::SORTING => 'Порядок сортировки сохранен',
    ];
    const BG_IMAGES = [
        Code::STORE => 'Фоновое изображение создано',
        Code::UPDATE => 'Фоновое изображение изменено',
        Code::DELETE => 'Фоновое изображение удалено',
        Code::SORTING => 'Порядок сортировки сохранен',
    ];
    const COMPONENTS = [
        Code::STORE => 'Компонент добавлен',
        Code::UPDATE => 'Компонент изменен',
        Code::DELETE => 'Компонент удалён',
        Code::SORTING => 'Порядок сортировки сохранен',
    ];
    const SECTIONS = [
        Code::STORE => 'Элемент добавлен',
        Code::UPDATE => 'Элемент изменен',
        Code::DELETE => 'Элемент удалён',
        Code::SORTING => 'Порядок сортировки сохранен',
    ];
    const SLIDERS = [
        Code::STORE => 'Слайдер добавлен',
        Code::UPDATE => 'Слайдер изменен',
        Code::DELETE => 'Слайдер удалён',
    ];
    const SEO = [
        Code::UPDATE => 'Мета-теги изменены',
    ];
}