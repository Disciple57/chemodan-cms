function initSortable() {
    var btn = $('#sorter');
    btn.hide();
    $('#list-container').sortable({
        opacity: 0.5,
        tolerance: 'pointer',
        items: '[data-id]',
        handle: '.drag',
        update: function () {
            var id = [];
            $('#list-container').find('[data-id]').each(function () {
                id.push($(this).data('id'));
            });
            window.DATA_SORT = new FormData()
            DATA_SORT.append('sortable', JSON.stringify(id));
            btn.show();
            btn.click(function () {
                $(this).hide();
            })
        },
    });
}