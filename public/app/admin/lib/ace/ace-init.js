function aceInit() {
    function run() {
        var e = [];
        $('#form textarea[data-id]').each(function () {
            var el = $(this),
                data_id = el.data('id'),
                val = el.val(),
                editor = $('<div/>', {'id': data_id}).insertAfter(el);


            e[data_id] = ace.edit(data_id);
            e[data_id].session.setMode("ace/mode/" + data_id);

            e[data_id].getSession().setValue(val);
            e[data_id].getSession().on('change', function () {
                el.val(e[data_id].getSession().getValue());
            });
            editor.resizable({
                handles: 'n, s',
                resize: function () {
                    e[data_id].resize();
                }
            });
        });
    }

    let timerId = setInterval(() => run(), 10);
    setTimeout(() => {
        clearInterval(timerId);
    }, 10);
}