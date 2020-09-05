@extends('admin.layout')

@push('extra_resource')
    <link href="/app/admin/css/sections.css" rel="stylesheet">
    <link href="/app/colors/colors.css?{{microtime(true).rand()}}" rel="stylesheet">
    <link href="/app/fonts/fonts.css?{{microtime(true).rand()}}" rel="stylesheet">
    <link href="/app/img/bg_images.css?{{microtime(true).rand()}}" rel="stylesheet">
    <script src="/app/admin/js/common.js"></script>
    <script src="/app/admin/js/sortable.js"></script>
@endpush
@inject('ResourceTypes', 'App\Constants\ResourceTypes')
@inject('Status', 'App\Constants\Status')
@section('content')
    <script>
        URL = '{{url()->current()}}';
    </script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Мои страницы</a></li>
            @if ($resource == $ResourceTypes::SLIDERS)
                <li class="breadcrumb-item"><a href="{{route('sliders.index')}}">Слайдер</a></li>
            @endif
            <li class="breadcrumb-item active"><i class="material-icons">&#xe8e9;</i> {{$name}}</li>
        </ol>
    </nav>
    <div class="container-fluid mb-3">
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-sm btn-success mr-1 dropdown-toggle" data-toggle="dropdown">Добавить
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item action-btn"
                       data-json='{"store": true, "post": {"extra_resource": "{{$ResourceTypes::BUILDER}}"}}'>Блок-контент</a>
                </div>
            </div>
            @if ($resource == $ResourceTypes::PAGES)
                @if (!empty($components))
                    <div class="dropdown">
                        <button class="btn btn-sm btn-success mr-1 dropdown-toggle" data-toggle="dropdown">Подключить
                            компонент
                        </button>
                        <div class="dropdown-menu">
                            @foreach($components as $component)
                                <a class="dropdown-item action-btn" data-json=
                                '{"store": true, "post": {"extra_resource": "{{$ResourceTypes::COMPONENTS}}", "id_extra_resource": "{{$component['id']}}", "status": "{{$Status::PUBLISHED}}"}}'
                                >{{$component['name']}}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (!empty($sliders))
                    <div class="dropdown">
                        <button class="btn btn-sm btn-success mr-1 dropdown-toggle" data-toggle="dropdown">Подключить
                            слайдер
                        </button>
                        <div class="dropdown-menu">
                            @foreach($sliders as $slider)
                            <a class="dropdown-item action-btn" data-json=
                            '{"store": true, "post": {"extra_resource": "{{$ResourceTypes::SLIDERS}}", "id_extra_resource": "{{$slider['id']}}", "status": "{{$Status::PUBLISHED}}"}}'
                            >{{$slider['name']}}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
            <button id="sorter" class="btn btn-sm btn-info ml-1 wow bounceInDown" data-json='{"sorter": true}'
                    style="display: none;">
                <i class="material-icons">&#xe161;</i> Сохранить порядок сортировки
            </button>
        </div>
    </div>

    <div id="list-container"></div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    @include('admin.sections.jsrender.modal')
    @include('admin.sections.jsrender.list')

@endsection