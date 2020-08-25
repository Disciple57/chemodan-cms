function colorPickerInit(id) {
    $(id).colorpicker({
        inline: true,
        container: true,
        customClass: 'colorpicker-2x',
        format: 'rgb',
        autoInputFallback: true,
        fallbackColor: '#000000',
        sliders: {
            saturation: {
                maxLeft: 200,
                maxTop: 200
            },
            hue: {
                maxTop: 200
            },
            alpha: {
                maxTop: 200
            }
        },
    });
}