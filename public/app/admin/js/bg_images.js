$(function () {
    $(document).on('click', '#repeat', function () {
        repeatChecked();
    }).on('click', '[name=background_size]', function () {
        externalInputChecked();
    });
});

function repeatChecked() {
    if ($('#repeat').is(':checked')) {
        $('.opts input, .opts select').attr('disabled', true);
        $('.opts').slideUp();
    } else {
        $('.opts input, .opts select').removeAttr('disabled');
        $('.opts').slideDown();
    }
    externalInputChecked();
}

function externalInputChecked() {
    if ($('#external').is(':checked')) {
        $('#external_size, [name=unit]').removeAttr('disabled');
    } else {
        $('#external_size, [name=unit]').attr('disabled', true);
    }
}