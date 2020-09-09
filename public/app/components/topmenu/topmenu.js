$(function () {
    $('body').append($('<div/>', {'class': 'mobile-menu', 'style': 'display:none'}).append($('<div/>', {'class': 'left-cell'}).append(
        $('<div/>', {'class': 'links'}).append($('.header').find('.link').clone())
        )));
    
    var $parent = $('.parent'),
        $modalmenu = $('.mobile-menu'),
        leftcell = '.left-cell',
        $links = $('.header').find('.link');

    $(document).on('click', '.menu-toggler-icon', function () {
        $modalmenu.fadeToggle();
        $(leftcell).animate({'margin-left': 0}, 500);
        $parent.css({'filter': 'blur(10px)'});
    }).on('click', '.mobile-menu', function () {
        $(leftcell).animate({'margin-left': '-50%'}, 500, function () {
            $parent.removeAttr('style');
            $modalmenu.fadeToggle();
        });
    });
});