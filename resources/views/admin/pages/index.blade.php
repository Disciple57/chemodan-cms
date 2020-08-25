@extends('admin.layout')

@push('extra_resource')
    <script src="/app/admin/js/common.js"></script>
@endpush

@section('content')
    <script>
        const URL = '{{url()->current()}}';
    </script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item active"><i class="material-icons">&#xe88a;</i> Мои страницы</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm mr-1 dropdown-toggle" data-toggle="dropdown">Базовый набор компонентов</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('fonts.index')}}"><i class="material-icons">&#xe165;</i> Шрифты</a>
                    <a class="dropdown-item" href="{{route('colors.index')}}"><i class="material-icons">&#xe40a;</i> Цвет</a>
                    <a class="dropdown-item" href="{{route('images.index')}}"><i class="material-icons">&#xe3f4;</i> Изображения</a>
                    <a class="dropdown-item" href="{{route('components.index')}}"><i class="material-icons">&#xe86f;</i> Компоненты</a>
                    <a class="dropdown-item" href="{{route('seo.index',[\App\Constants\ResourceTypes::PAGES])}}"><i class="material-icons">&#xe8a0;</i> СЕО</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm mr-1 dropdown-toggle" data-toggle="dropdown"><i class="material-icons">&#xe63c;</i> Дополнительные модули</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('sliders.index')}}"><i class="material-icons">&#xe41b;</i> Слайдер</a>
                </div>
            </div>
            <button class="btn btn-sm btn-success mr-1" data-json='{
            "modal": "#update",
            "headers": "Новая страница",
            "action": "store"}'>
                <i class="material-icons">&#xe148;</i> Новая страница
            </button>
            <button class="btn btn-sm btn-primary ml-auto" data-json='{
            "request": true,
            "url": "{{route('pages.generate_all')}}",
            "type": "POST"}'>
                <i class="material-icons">&#xe627;</i> Запустить пересборку страниц
            </button>
        </div>
        <div id="list-container" class="row mt-3 align-items-center"></div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    @include('admin.pages.jsrender.modal')
    @include('admin.pages.jsrender.list')

@endsection