var $_this_selected = null;
$(function () {
    var $panel_body = $('#parent-tools-panel').find('.panel-body');


    function array_intersect(array1, array2) {
        var result = array1.filter(function (n) {
            return array2.indexOf(n) !== -1;
        });

        return result;
    }

    // Наблюдение за изменением классов в выбранном элементе
    function observMutation() {

        if (typeof (observer) === 'object') {
            observer.disconnect();
        }

        target = $_this_selected[0];

        $bind = $('#bind');

        var observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class') {

                    if ($bind.length && !$bind.is(':focus') && !$_this_selected.hasClass('sortable-chosen')) {
                        // отображаем в инпуте
                        $bind.val($_this_selected.attr('class'));
                    }
                }
            })
        });

        observer.observe(target, {attributes: true, childList: false, characterData: false});
    }

//drag and drop

    function draggableInit(el) {
        Sortable.create(el, {
            group: {
                name: 'contain',
                pull: 'clone',
                put: false
            },
            animation: 150,
            emptyInsertThreshold: 16,
            sort: false,
            scroll: true,
            bubbleScroll: true,
            forceFallback: true,
            scrollSensitivity: 100,
            scrollSpeed: 30,
            onEnd: function (evt) {
                el = elementUnwrap();
                for (i = 0; i < el.length; i++) {
                    if (!$(el[i]).hasClass('content') && !$(el[i]).hasClass('icon')) {
                        sortableInit(el[i]);
                    }
                }
            },
        });
    }

    function sortableInit(el) {
        if (!Sortable.get(el)) {
            Sortable.create(el, {
                group: 'contain',
                animation: 150,
                emptyInsertThreshold: 16,
                scroll: true,
                bubbleScroll: true,
                forceFallback: true,
                scrollSensitivity: 100,
                scrollSpeed: 30,
            });
        }
    }

    function sortableInitAll() {
        el = $('#editor, #editor *');
        for (i = 0; i < el.length; i++) {
            if (!$(el[i]).hasClass('content') && !$(el[i]).hasClass('icon')) {
                sortableInit(el[i]);
            }
        }
    }

    function sortableDisableAll(bool) {
        el = $('#editor, #editor *');
        for (i = 0; i < el.length; i++) {
            sort = Sortable.get(el[i]);
            if (sort) {
                sort.option("disabled", !bool);
            }
        }
    }

    function sortableDestroy(el) {
        for (i = 0; i < el.length; i++) {
            sort = Sortable.get(el[i]);
            if (sort) {
                sort.destroy();
            }
        }
    }

    // Очистка после stop drag
    function elementUnwrap() {
        $('#editor .preview').remove();
        $('#editor .element-container .drag-element').children().unwrap();

        els = $('#editor .element-container *');

        $('#editor .element-container').children().unwrap();

        return els;
    }

    // Attributes
    function appendForm() {
        select_element_classes = $_this_selected.attr('class').split(/\s+/);
        $panel_body.empty();

        item_class = array_intersect(select_element_classes, Object.keys(class_conf))[0]; // Ищем соответствие класса выделенного элемента с конфигом

        if (typeof(item_class) !== 'undefined') {
            $('<div/>', {'class': 'bind-parent'}).append($('<small/>', {
                'text': 'Class'
            })).append(
                $('<input/>', {
                    'type': 'text',
                    'id': 'bind',
                    'class': 'form-control form-control-extra-sm',
                    'value': $_this_selected.attr('class')
                }).bind('input', function () {
                    // Бинд инпута с выбранным элементом (присвоение класса)
                    $_this_selected.prop('class', $(this).val());
                })).append($('<small/>', {
                    'text': 'ID'
            })).append(
                $('<input/>', {
                    'type': 'text',
                    'class': 'form-control form-control-extra-sm',
                    'value': $_this_selected.attr('id')
                }).bind('input', function () {
                    // Бинд инпута с выбранным элементом (присвоение id)
                    txt = $(this).val().replace(/\s/g, '');
                    if (txt) {
                        $(this).val(txt)
                        $_this_selected.prop('id', txt);
                    } else {
                        $_this_selected.removeAttr('id');
                    }

                })).appendTo($panel_body);

            observMutation();

            $panel_body.parent().removeClass('d-none').draggable({
                containment: 'body',
                snap: '#parent-tools-panel',
                snapTolerance: 12
            });

            $.each(class_conf[item_class], function (i, tool) { // Обходим тулсы и выводим на панель

                $tool_template = $('[data-tool="' + tool + '"]'); // Шаблон тулса
                if ($tool_template.length) {

                    $tool_template_childs = $tool_template.contents().clone();

                    $card = $('<div/>', {'class': 'card'}).append(
                        $('<div/>', {
                            'class': 'card-header dropdown-toggle',
                            'data-toggle': 'collapse',
                            'data-target': '#collapse-' + i,
                            'aria-expanded': 'true',
                            'aria-controls': 'collapse-' + i,
                            'text': $tool_template.data('header')
                        }),
                        $('<div/>', {
                            'id': 'collapse-' + i,
                            'data-parent': '#accordion',
                            'class': 'collapse card-body'
                        }).append($tool_template_childs)
                    );

                    $rels = $tool_template_childs.parent().find('[data-rels]');
                    $.each($rels, function () { // Обходим формы в тулсе
                        $parent_rel_elements = $(this);

                        $rel_elements = $parent_rel_elements.find('[data-rel]');

                        rel_elements_tag_name = $rel_elements.get(0).tagName.toLowerCase();

                        arr_data_rels = $rel_elements.map(function () {
                            return $(this).data('rel');
                        }).get().filter(function (e) {
                            return e
                        });

                        data_rels = arr_data_rels.join(' ');

                        $parent_rel_elements.attr('data-rels', data_rels);

                        active_rel = array_intersect(select_element_classes, arr_data_rels)[0];

                        $active = $parent_rel_elements.find('[data-rel="' + active_rel + '"]');

                        switch (rel_elements_tag_name) {
                            case 'option':
                                if ($active.length) {
                                    $rel_elements.removeAttr('selected');
                                    $active.prop({"selected": true});
                                }
                                $el = $rel_elements.parent();
                                _event = 'change';
                                break;
                            case 'input':
                                if ($active.length) {
                                    $active.prop({"checked": true});
                                }
                                $el = $rel_elements;
                                _event = 'change';
                                break;
                            default:
                                if ($active.length) {
                                    $rel_elements.removeClass('active');
                                    $active.addClass('active');
                                }
                                $el = $rel_elements;
                                _event = 'click';
                                break;
                        }

                        $el.on(_event, function () {

                            $_this = $(this);
                            class_name = '';
                            switch ($_this.get(0).tagName.toLowerCase()) {
                                case 'select':
                                    $_this_selected.removeClass($_this.data('rels'));
                                    class_name = $_this.find(':selected').data('rel');
                                    break;
                                case 'input':
                                    $_this_selected.removeClass($_this.parent().data('rels'));
                                    if ($_this.is(':checked')) {
                                        class_name = $_this.data('rel');
                                    }
                                    break;
                                default:
                                    $parent = $_this.parent('[data-rels]');
                                    if (!$parent.length) {
                                        $parent = $_this.parentsUntil('[data-rels]').parent();
                                    }
                                    $_this_selected.removeClass($parent.data('rels'));
                                    $parent.find('[data-rel]').removeClass('active');
                                    $_this.addClass('active');
                                    class_name = $_this.data('rel');
                                    break;
                            }
                            $_this_selected.addClass(class_name);
                        });

                    });

                    $panel_body.append($card);
                }
            });
            return false;
        }
    }

    $(document).on('click', '#editor.constructor *', function (e) {
        e.preventDefault();
        $(e.target).removeAttr('hovered')
        if (!$(e.target).attr('sel')) {
            $('#editor *').removeAttr('sel');
            $panel_body.parent().addClass('d-none');
            $_this_selected = $(e.target);
            $_this_selected.attr('sel', true);
            appendForm();
        }

    }).on('mouseover', '#editor.constructor *:not([sel=true])', function (e) {
        if (!$(e.target).attr('sel')) {$(e.target).attr('hovered', true);}

    }).on('mouseout', '#editor.constructor *', function (e) {
        if (!$(e.target).attr('sel')) {$(e.target).removeAttr('hovered');}

    }).on('click', '[data-panel=delete]', function () {
        $panel_body.empty();
        $panel_body.parent().addClass('d-none');
        $_this_selected.find('*').each(function () {
            sortableDestroy($(this));
        });
        sortableDestroy($_this_selected);
        $_this_selected.detach();

    }).on('click', '[data-panel=clone]', function () {
        $clone = $_this_selected.clone().removeAttr('sel');
        $_this_selected.after($clone);
        sortableInitAll();

    }).on('click', '[data-panel=close]', function () {
        $('#editor *').removeAttr('sel');
        $panel_body.parent().addClass('d-none');

    }).on('click', '#constructor', function () {
        $('#editor').removeClass('content-edit').addClass('constructor');
        $('[data-group=constructor]').removeClass('d-none');
        sortableDisableAll(true);

    }).on('click', '#content-edit', function () {
        $('#editor').removeClass('constructor').addClass('content-edit');
        $('#editor *').removeAttr('sel');
        $panel_body.parent().addClass('d-none');
        $('[data-group=constructor]').addClass('d-none');
        sortableDisableAll(false);

    }).on('click', '[data-show]', function () {// Tabs
        $this = $(this),
            data_show = $this.data('show');

        $('[data-show].active').removeClass('active');
        $('[data-tab].d-block').removeClass('d-block');

        $this.addClass('active');
        $('[data-tab="' + data_show + '"]').addClass('d-block');

    }).on('click', '#editor.content-edit a', function (e) {
        e.preventDefault();
        if (!$(this).attr('contenteditable')) {
            $(this).html($.trim($(this).html()));
            $(this).prop('contenteditable', 'true').focus().one('blur', function () {
                $(this).removeAttr('contenteditable');
            });
        }

    }).on('click', '#editor.content-edit .content', function () {
        if (!$(this).attr('contenteditable')) {
            $(this).html($.trim($(this).html()));
            $(this).prop('contenteditable', 'plaintext-only').focus().one('blur', function () {
                $(this).removeAttr('contenteditable');
            });
        }

    }).on('click', '#clear', function () {
        sortableDestroy($('#editor *'));
        $('#editor').empty();

    }).one('click', '#save', function () {
        $content_els = $('#editor *')
        sortableDestroy($content_els);
        html_clean = $.htmlClean($('#editor').html(), {
            format: true,
            allowedAttributes: [["id"], ["class"]]
        });
        $('#send-content').val(html_clean);
        $('#send-form').trigger('click');
    });

    // Инициализация d&g
    var el = $('.drag-elements-container .drag');
    for (var i = 0; i < el.length; i++) {
        draggableInit(el[i]);
    }

    sortableInitAll();
});