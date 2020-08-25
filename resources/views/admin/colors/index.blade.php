@extends('admin.layout')

@push('extra_resource')
    <link href="/app/admin/lib/colorpicker/bootstrap-colorpicker.css" rel="stylesheet">
    <link href="/app/admin/css/color.css" rel="stylesheet">
    <script src="/app/admin/lib/colorpicker/colorpicker.js"></script>
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
            <li class="breadcrumb-item active"><i class="material-icons">&#xe40a;</i> Цветовой набор</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn btn-sm btn-success mr-1" data-json='{
            "modal": "#update",
            "headers": "Добавить цвет",
            "action": "store",
            "func": "colorPickerInit","args": "#color-picker"}'>
                <i class="material-icons">&#xe148;</i> Добавить цвет в набор
            </button>
            <button id="sorter" class="btn btn-sm btn-info ml-1 wow bounceInDown" data-json='{"sorter": true}' style="display: none;">
                <i class="material-icons">&#xe161;</i> Сохранить порядок сортировки
            </button>
        </div>
        <div id="list-container" class="row mt-3 align-items-center"></div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            </div>
        </div>
    </div>

    @include('admin.colors.jsrender.modal')
    @include('admin.colors.jsrender.list')

@endsection