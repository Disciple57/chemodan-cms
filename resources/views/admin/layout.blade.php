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
        <i class="material-icons fs-20 ml-auto">&#xe853;</i>
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
