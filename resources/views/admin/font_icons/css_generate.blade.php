/** {{$attributes['font-family']}} **/
@font-face {
    font-family: '{{$attributes['font-family']}}';
    src: local('{{$attributes['font-family']}}'),
    @foreach($fonts as $font)
    url('{{$patch}}/{{$font_family_slug}}.{{$font}}') format('{{$format[$font]}}')@if ($loop->last);@else,@endif

    @endforeach
font-weight: {{$attributes['font-weight']}};
    font-style: normal;
}
[class^="{{$icons['prefix']}}"]:before, [class*=" {{$icons['prefix']}}"]:before {
    font-family: '{{$attributes['font-family']}}';
    font-style: normal;
    font-weight: {{$attributes['font-weight']}};
    display: inline-block;
    text-decoration: inherit;
    width: 1em;
    margin-right: .2em;
    text-align: center;
    font-variant: normal;
    text-transform: none;
    line-height: 1em;
    margin-left: .2em;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

@foreach($icons['icons'] as $glyph)
.{{$icons['prefix']}}{{$glyph['name']}}:before { content: '\{{$glyph['unicode']}}'; }
@endforeach