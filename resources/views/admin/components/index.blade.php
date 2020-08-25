@extends('admin.layout')

@push('extra_resource')
    <script src="/app/admin/lib/ace/ace.js"></script>
    <script src="/app/admin/lib/ace/ace-init.js"></script>
    <script src="/app/admin/js/sortable.js"></script>
    <script src="/app/admin/js/common.js"></script>
@endpush

@section('content')
    <script>
        const URL = '{{url()->current()}}';
    </script>
    <style>.ace_editor{min-height:100px;border:1px solid rgba(0, 0, 0, .1);}</style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Мои страницы</a></li>
            <li class="breadcrumb-item active">Компоненты</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn btn-sm btn-success mr-1" data-json='{
            "modal": "#update",
            "headers": "Новый компонент",
            "action": "store"}'>
                <i class="material-icons">&#xe148;</i> Новый компонент
            </button>
            <button id="sorter" class="btn btn-sm btn-info ml-1 wow bounceInDown" data-json='{"sorter": true}' style="display: none;">
                <i class="material-icons">&#xe161;</i> Сохранить порядок сортировки
            </button>
        </div>
        <div id="list-container" class="row mt-3 align-items-center"></div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            </div>
        </div>
    </div>

    @include('admin.components.jsrender.modal')
    @include('admin.components.jsrender.list')

@endsection