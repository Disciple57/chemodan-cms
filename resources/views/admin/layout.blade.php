<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Управление сайтом</title>
    <script src="{{ asset('/app/admin/app.js') }}"></script>
    <link href="{{ asset('/app/admin/app.css') }}" rel="stylesheet">
    @stack('extra_resource')
</head>
<body class="fs-8">
@auth
    <div class="d-flex align-items-center bg-dark text-light">
        <img src="/app/admin/img/logo.svg">
        <div class="dropdown ml-auto">
            <button class="btn btn-link no-focus no-decor btn-sm mr-1 dropdown-toggle" data-toggle="dropdown">Базовый набор компонентов</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('fonts.index')}}"><i class="material-icons">&#xe165;</i> Шрифты</a>
                <a class="dropdown-item" href="{{route('colors.index')}}"><i class="material-icons">&#xe40a;</i> Цвет</a>
                <a class="dropdown-item" href="{{route('images.index')}}"><i class="material-icons">&#xe3f4;</i> Изображения</a>
                <a class="dropdown-item" href="{{route('components.index')}}"><i class="material-icons">&#xe86f;</i> Компоненты</a>
                <a class="dropdown-item" href="{{route('seo.index',[\App\Constants\ResourceTypes::PAGES])}}"><i class="material-icons">&#xe8a0;</i> СЕО</a>
            </div>
        </div>
        <div class="dropdown ml-2">
            <button class="btn btn-link no-focus no-decor btn-sm mr-1 dropdown-toggle" data-toggle="dropdown"><i class="material-icons">&#xe63c;</i> Дополнительные модули</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('sliders.index')}}"><i class="material-icons">&#xe41b;</i> Слайдер</a>
            </div>
        </div>
        <button class="btn btn-sm btn-outline-light ml-5" data-json='{
            "request": true,
            "url": "{{route('pages.generate_all')}}",
            "type": "POST"}'>
            <i class="material-icons">&#xe627;</i> Компиляция страниц
        </button>
        <i class="material-icons fs-20 ml-5">&#xe853;</i>
        <span class="ml-2 text-capitalize">
    {{ Auth::user()->name }}
    </span>
        <a class="material-icons fs-20 ml-2 nav-link" href="{{route('logout')}}">&#xe879;</a>
    </div>
@endauth
<div class="toast-container">
    <div class="spinner-border ajax-indicator" style="display: none;">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div class="toast-header">
            <i class="material-icons">&#xe88e;</i>
            <i aria-hidden="true" class="material-icons fs-9 ml-auto close action-btn" data-dismiss="toast"
               aria-label="Close">&#xe5cd;</i>
        </div>
        <div class="toast-body"></div>
    </div>
</div>
@yield('content')
</body>
</html>
