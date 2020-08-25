@extends('admin.layout')

@push('extra_resource')
    <script src="/app/admin/lib/ace/ace.js"></script>
    <script src="/app/admin/lib/ace/ace-init.js"></script>
    <script src="/app/admin/lib/bootstrap-select/bootstrap-select.js"></script>
    <script src="/app/admin/lib/bootstrap-select/bootstrap-select-init.js"></script>
    <link href="/app/admin/lib/bootstrap-select/bootstrap-select.css" rel="stylesheet">
    <script src="/app/admin/js/common.js"></script>
@endpush

@section('content')
    <script>
        const URL = '{{url()->current()}}';
    </script>
    <style>.ace_editor{min-height:100px;border:1px solid rgba(0,0,0,.1);}.fill{max-height:50px;max-width:100px}</style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/{{env('ADMIN_PANEL_URI')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Мои страницы</a></li>
            <li class="breadcrumb-item active">SEO</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="d-flex align-items-center"></div>
        <div id="list-container" class="row mt-3 align-items-center"></div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

    @include('admin.seo.jsrender.modal')
    @include('admin.seo.jsrender.list')

@endsection