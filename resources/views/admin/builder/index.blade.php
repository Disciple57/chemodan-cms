@extends('admin.layout')

@push('extra_resource')
    <link href="/app/admin/css/builder.css" rel="stylesheet">
    <link href="/app/colors/colors.css?{{microtime(true).rand()}}" rel="stylesheet">
    <link href="/app/fonts/fonts.css?{{microtime(true).rand()}}" rel="stylesheet">
    <link href="/app/img/bg_images.css?{{microtime(true).rand()}}" rel="stylesheet">
    <script src="/app/admin/lib/sortable-js/sortable.min.js"></script>
    <script src="/app/admin/js/builder.class.conf.js"></script>
    <script src="/app/admin/js/builder.js"></script>
    <script src="/app/admin/js/common.js"></script>
@endpush
@inject('ResourceTypes', 'App\Constants\ResourceTypes')

@section('content')
    <script>
        const VIEW_ONLY = true;
        const FONT_ICONS = @json($font_icons);
    </script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Мои страницы</a></li>
            @switch ($resource)
                @case ($ResourceTypes::SLIDERS)
                <li class="breadcrumb-item">
                    <a href="{{route('sliders.index')}}">Слайдер</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('sliders.index')}}/{{$resource}}/{{$id_resource}}">{{$name}}</a>
                </li>
                <script>
                    const URL = '{{route('sections.index')}}/{{$resource}}/{{$id_resource}}';
                </script>
                @break
                @case ($ResourceTypes::PAGES)
                <li class="breadcrumb-item">
                    <a href="{{route('sections.index')}}/{{$resource}}/{{$id_resource}}">{{$name}}</a>
                </li>
                <script>
                    const URL = '{{route('sections.index')}}/{{$resource}}/{{$id_resource}}';
                </script>
                @break
                @case ($ResourceTypes::COMPONENTS)
                <li class="breadcrumb-item mr-2">
                    <a href="{{route('components.index')}}">Компоненты</a> -> {{$name}}
                </li>
                <script>
                    const URL = '{{route('components.index')}}/builder';
                </script>
                @break
            @endswitch
            <li class="breadcrumb-item active"><i class="material-icons">&#xe869;</i> Билдер</li>
        </ol>
    </nav>

    <ul class="nav nav-tabs">
        <li class="nav-item" data-group="constructor">
            <button class="nav-link active" data-show="grid">Разметка</button>
        </li>
        <li class="nav-item" data-group="constructor">
            <button class="nav-link" data-show="content">Контент</button>
        </li>
        <li class="ml-auto d-none d-md-block">
            <div class="btn-group btn-group-sm">
                <button class="btn btn-secondary navbar-btn active" id="constructor"><i class="material-icons">&#xe869;</i>
                    Режим конструктора
                </button>
                <button class="btn btn-secondary navbar-btn" id="content-edit"><i class="material-icons">&#xe3c9;</i>
                    Режим редактирования контента
                </button>
            </div>
        </li>
        <li class="ml-auto d-none d-md-block">
            <div class="btn-group btn-group-sm action">
                <button class="btn btn-secondary navbar-btn" id="clear">Очистить</button>
                <button class="btn btn-primary navbar-btn" id="save">Сохранить
                </button>
            </div>
        </li>
    </ul>
    @include('admin.builder.templates.draggable.all')
    <div id="parent-tools-panel">
        <div class="panel d-none">
            <div class="panel-header">
                <span class="material-icons fs-12" data-panel="clone" title="Клонировать">&#xe146;</span>
                <span class="material-icons fs-12 ml-2" data-panel="delete" title="Удалить">&#xe92b;</span>
                <span class="material-icons fs-12 ml-auto" data-panel="close">&#xe5ce;</span>
            </div>
            <div id="accordion" class="panel-body accordion"></div>
        </div>
    </div>
    <section id="editor" class="constructor">{!!$html!!}</section>
    <form id="form" style="display: none">
        <textarea id="send-content" class="form-control" name="html"></textarea>
        <a data-json='{"update": true, "id": "{{$id}}"}' type="submit" id="send-form"></a>
    </form>

    @include('admin.builder.templates.tools.all')

@endsection