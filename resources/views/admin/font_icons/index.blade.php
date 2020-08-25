@extends('admin.layout')

@push('extra_resource')
    <script src="/app/admin/js/common.js"></script>
    <script src="/app/admin/js/sortable.js"></script>
@endpush

@section('content')
    <script>
        const URL = '{{url()->current()}}';
    </script>
    <style>.f-ico-contain {width:4rem}</style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Мои страницы</a></li>
            <li class="breadcrumb-item"><a href="{{route('fonts.index')}}">Шрифты</a></li>
            <li class="breadcrumb-item active"><i class="material-icons">&#xe24e;</i> Иконочные шрифты</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn btn-sm btn-success mr-1" data-json='{
            "modal": "#store",
            "headers": "Добавить шрифт",
            "action": "store",
            "extra": "mimes"}'>
                <i class="material-icons">&#xe148;</i> Добавить иконочный шрифт
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

    @include('admin.font_icons.jsrender.modal')
    @include('admin.font_icons.jsrender.list')
@endsection