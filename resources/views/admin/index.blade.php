@extends('admin.layout')
@push('extra_resource')
    <script src="/app/admin/js/common.js"></script>
    <script>const VIEW_ONLY = true;</script>
@endpush
@section('content')
    <div class="container-fluid text-dark my-4">
        <div class="row justify-content-center text-center">

            <div class="col-12 col-md-3 col-xl-2 mb-3">
                <div class="list-group h-100">
                    <div class="list-group-item">
                        <i class="material-icons display-3">&#xe7fc;</i>
                    </div>
                    <a href="{{route('users.index')}}" class="list-group-item list-group-item-action h-100">
                        Управление пользователями
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-3 col-xl-2 mb-3">
                <div class="list-group h-100">
                    <div class="list-group-item">
                        <i class="material-icons display-3">&#xe88a;</i>
                    </div>
                    <a href="{{route('pages.index')}}" class="list-group-item list-group-item-action h-100">
                        Мои страницы
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection