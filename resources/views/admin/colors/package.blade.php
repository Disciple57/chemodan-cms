@foreach($colors as $color)
.color{{$color['id']}} {
    color: {{$color['color']}};
}
.background-color{{$color['id']}} {
    background: {{$color['color']}};
}
.border-color{{$color['id']}} {
    border-color: {{$color['color']}} !important;
}
.hover-color{{$color['id']}}:hover {
    color: {{$color['color']}};
}
@endforeach