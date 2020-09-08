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
            <button class="btn btn-sm btn-success mr-1" data-json='{
            "modal": "#update",
            "headers": "Новая страница",
            "action": "store"}'>
                <i class="material-icons">&#xe148;</i> Новая страница
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