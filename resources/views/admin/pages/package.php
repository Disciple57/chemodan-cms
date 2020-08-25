@extends('layout')
@push('meta')
<?= $meta ?>
@endpush
@push('modify')
<?=$modify ?>

@endpush
@section('content')
<?= $content ?>
@endsection