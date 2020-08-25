@foreach ($bg_images as $bg_image)
.bg-img-{{$bg_image['id']}} {
    background-image: url(/app/{{$patch . DIRECTORY_SEPARATOR . $bg_image['file']}});
@if (!$bg_image['options']['repeat'])
    background-position: {{$bg_image['options']['position_x']}} {{$bg_image['options']['position_y']}};
@if ($bg_image['options']['background_size'] == 'external')
    background-size: {{$bg_image['options']['size'].$bg_image['options']['unit']}};
@else
    background-size: {{$bg_image['options']['background_size']}};
@endif
    background-repeat: no-repeat;
@endif
}
@endforeach