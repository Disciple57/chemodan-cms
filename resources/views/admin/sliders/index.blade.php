@extends('admin.layout')

@push('extra_resource')
    <script src="/app/admin/js/common.js"></script>
@endpush
@inject('ResourceTypes', 'App\Constants\ResourceTypes')
@section('content')
    <script>
        URL = '{{url()->current()}}';
    </script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Мои страницы</a></li>
            <li class="breadcrumb-item active"><i class="material-icons">&#xe41b;</i> Слайдер</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="d-flex align-items-center">

            <button class="btn btn-sm btn-success mr-1" data-json='{
            "modal": "#update",
            "headers": "Новый слайдер",
            "action": "store"}'>
                <i class="material-icons">&#xe148;</i> Создать слайдер
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

    @include('admin.sliders.jsrender.modal')
    @include('admin.sliders.jsrender.list')

@endsection