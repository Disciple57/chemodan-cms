@extends('admin.layout')

@push('extra_resource')
    <script src="/app/admin/js/common.js"></script>
@endpush

@inject('role', 'App\Constants\Role')

@section('content')
    <script>
        const URL = '{{url()->current()}}';
    </script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item active"><i class="material-icons">&#xe7fc;</i> Управление пользователями</li>
        </ol>
    </nav>
    <div class="container-fluid">
        @if (Auth::user()->role != $role::USER)
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-success mr-1" data-json='{
            "modal": "#update",
            "headers": "Новый пользователь",
            "action": "store",
            "extra": "--all"}'>
                    <i class="material-icons fs-14">&#xe7fe;</i> Новый пользователь
                </button>
            </div>
        @endif
        <div id="list-container" class="row mt-3 align-items-center"></div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    @include('admin.users.jsrender.modal')
    @include('admin.users.jsrender.list')

@endsection