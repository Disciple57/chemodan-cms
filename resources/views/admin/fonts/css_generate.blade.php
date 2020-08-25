/** {{$name}} **/
@font-face {
    font-family: '{{$name}}';
    src: local('{{$name}}'),
    @foreach($fonts as $font)
    url('{{$patch}}/{{$name}}.{{$font}}') format('{{$format[$font]}}')@if ($loop->last);@else,@endif

    @endforeach
font-weight: normal;
    font-style: normal;
}
.{{$name}} {
    font-family: '{{$name}}';
}
