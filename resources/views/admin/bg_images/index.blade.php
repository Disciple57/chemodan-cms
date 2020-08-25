@extends('admin.layout')

@push('extra_resource')
    <link href="/app/admin/css/images.css" rel="stylesheet">
    <script src="/app/admin/js/bg_images.js"></script>
    <script src="/app/admin/js/common.js"></script>
    <script src="/app/admin/js/sortable.js"></script>
@endpush

@section('content')
    <script>
        const URL = '{{url()->current()}}';
    </script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Мои страницы</a></li>
            <li class="breadcrumb-item"><a href="{{route('images.index')}}">Изображения</a></li>
            <li class="breadcrumb-item active"><i class="material-icons mr-1">&#xe1bc;</i>Фоновые</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn btn-sm btn-success mr-1" data-json='{
            "modal": "#update",
            "headers": "Новое фоновое изображение",
            "action": "store",
            "extra": "images"}'>
                <i class="material-icons">&#xe148;</i> Создать фоновое изображение
            </button>
            <button id="sorter" class="btn btn-sm btn-info ml-1 wow bounceInDown" data-json='{"sorter": true}' style="display: none;">
                <i class="material-icons">&#xe161;</i> Сохранить порядок сортировки
            </button>
        </div>
        <div id="list-container" class="row mt-3 align-items-center"></div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    @include('admin.bg_images.jsrender.modal')
    @include('admin.bg_images.jsrender.list')

@endsection