$(function () {
if ($('#slider{{$id}}').length) {
@isset($settings['height'])
    $('#slider{{$id}} > *').css('min-height', '{{$settings['height']}}');
@endisset
$('#slider{{$id}}').bxSlider(@json($settings));
}
});