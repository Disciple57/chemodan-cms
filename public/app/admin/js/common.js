$(function () {
    // Базовый URL экшенов всегда должен быть задан
    if (typeof URL === 'undefined') {
        toastShow('Ошибка данных');
        return false;
    }

    window.DATA = window.DATA_SORT = {};
    const DS = '/',
        TOKEN = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        RENDER = {
            list_container: $('#render_list_container'),
            form: $('#modal_form'),
        },
        CONTAINERS = {
            list_container: $('#list-container'),
        };

    var _modal = $('#modal'),
        _form = '#form',
        _ajax_indicator = $('.ajax-indicator');

    $.views.settings.allowCode(true);


    function urlSanitize(url) {
        return url.replace(/(^|[^:])[/]{2,}/, '$1/', url)
    }

    // Вывести текст ошибки в зависимости от статуса
    function showError(error) {
        switch (error.status) {
            case 500:
                toastShow('Внутренняя ошибка сервера', error.status);
                break;
            case 400:
                toastShow(error.responseText, error.status);
                break;
            case 402:
                toastShow(error.responseJSON.error, error.status);
                if(typeof error.responseJSON.hidemodal !== 'undefined') {
                    _modal.modal('hide');
                }
                break;
            default:
                toastShow('Ошибка', error.status);
        }
    }

    // Вешаем обработчик по клику
    function bindsClick() {
        $(document).on('click', '[data-json]', function (e) {
            e.preventDefault();
            var data_json = $(this).data('json');
            actionSwitch(data_json);
        });
    }

    // Снимаем обработчик по клику
    function unbindsClick() {
        $(document).off('click', '[data-json]');
    }

    // Получить данные из формы
    function getFormData() {
        form = $(_form);
        form.find('.is-invalid').removeClass('is-invalid');
        return form.serializeJSON();
    }

    // Получить данные из multipart-формы
    function getFormMultipartData() {
        form = $(_form);
        form.find('.is-invalid').removeClass('is-invalid');
        return form.serializeInput();
    }

    // Добавить данные в форму
    function appendData(formData, data) {
        $.each(data,function(index, value) {
            formData.append(index, value);
        });
    }

    // Подсветить инпуты и показать сообщения валидатора
    function appendMessageErrorToForm(errors) {
        form = $(_form);
        $.each(errors.responseJSON.errors, function (index, error) {

            var $_input = form.find('[name=' + index + ']'),
                $_err_container = $_input.parent().find('.invalid-feedback');

            if (!$_err_container.length) {
                $_err_container = form.find('[data-error=' + index + ']');
                $_err_container.css('display', 'block');
            }
            $_err_container.text(error);

            $_input.addClass('is-invalid');
        });
    }

    // Всплывающие сообщения
    function toastShow(msg, status) {
        var $_toast = $('.toast'),
            $_toast_body = $_toast.find('.toast-body');

        $_toast.removeClass('bg-danger bg-success');

        switch (status) {
            case 200:
                $_toast.addClass('bg-success');
                break;
            default:
                $_toast.addClass('bg-danger');
                break;
        }
        $_toast_body.html(msg + '<br>');
        $_toast.toast('show');
    }

    // Триггер экшенов
    function actionSwitch(data_json) {
        data_json._extra = [];
        if (data_json.extra) {// дополнительные данные
            if (data_json.extra === '--all') {
                data_json._extra = DATA;
            } else {
                data_json._extra = DATA[data_json.extra];
            }
        }

        if (data_json.modal) {// модалка
            _modal.modal();
            if (data_json.index) {
                _modal.find('.modal-content').html(
                    $(data_json.modal).render(DATA.data[data_json.index], {data_json:data_json})
                );
            } else {
                _modal.find('.modal-content').html(
                    $(data_json.modal).render({},{data_json:data_json})
                );
            }
        }

        if (data_json.func) {// запустить функцию
            window[data_json.func](data_json.args);
        }

        switch (true) {
            case data_json.edit:
                _modal.modal();
                editAction(data_json);
                break;
            case data_json.store:
                formData = getFormMultipartData();
                formData.append('_method', 'POST');
                if (data_json.post) {
                    appendData(formData, data_json.post)
                }
                storeAction(formData);
                break;
            case data_json.update:
                formData = getFormMultipartData();
                formData.append('_method', 'PUT');
                if (data_json.post) {
                    appendData(formData, data_json.post)
                }
                updateAction(formData, data_json.id);
                break;
            case data_json.delete:
                deleteAction(data_json.id);
                break;
            case data_json.sorter:
                updateAction(DATA_SORT, 'sortable');
                break;
            case data_json.request:
                requestAction(data_json);
                break;
        }

    }


    /** AJAX */

    $.ajaxSetup({
        processData: false,
        contentType: false,
        cache:false,
        dataType: 'json',
        headers: TOKEN,
    });

    // Снимаем обработчик по клику, перед выполнением Ajax запроса
    $(document).ajaxStart(
        function () {
            unbindsClick();
            _ajax_indicator.show();
        });
    // Вешаем обработчик по клику, после выполнения Ajax запроса
    $(document).ajaxStop(
        function () {
            bindsClick();
            _ajax_indicator.hide();
        });

    function success(data) {
        _modal.modal('hide');
        if(typeof data.logout !== 'undefined') {
            window.location.href = URL;
            return;
        }
        if(typeof data.redirect !== 'undefined') {
            window.location.href = data.redirect;
            return;
        }
        toastShow(data.notification, 200);
        showAction('all');
    }

    // Показать
    function showAction(id) {
        $.ajax({
            url: urlSanitize(URL + DS + id),
            type: 'GET',
            error: function (errors) {
                showError(errors)
            },
            success: function (data) {
                window.DATA = data;
                CONTAINERS.list_container.html(
                    RENDER.list_container.render(data)
                );
            }
        });
    }

    // Редактировать
    function editAction(data_json) {
        $.ajax({
            url: urlSanitize(URL + DS + data_json.id + DS + 'edit'),
            type: 'GET',
            error: function (errors) {
                showError(errors)
            },
            success: function (data) {
                _modal.find('.modal-content').html(
                    $('#update').render(data, {data_json:data_json})
                );
            }
        });
    }

    // Создать
    function storeAction(formData) {
        $.ajax({
            url: urlSanitize(URL),
            type: 'POST',
            data: formData,
            error: function (errors) {
                showError(errors);
                if (errors.status === 422) {
                    appendMessageErrorToForm(errors);
                }
            },
            success: function (data) {
                success(data);
            }
        })
    }

    // Обновить
    function updateAction(formData, id) {
        $.ajax({
            url: urlSanitize(URL + DS + id),
            type: 'POST',
            data: formData,
            error: function (errors) {
                showError(errors);
                if (errors.status === 422) {
                    appendMessageErrorToForm(errors);
                }
            },
            success: function (data) {
                success(data);
            }
        })
    }

    // Удалить
    function deleteAction(id) {
        $.ajax({
            url: urlSanitize(URL + DS + id),
            type: 'DELETE',
            error: function (errors) {
                showError(errors);
            },
            success: function (data) {
                success(data);
            }
        })
    }

    //
    function requestAction(data_json) {
        $.ajax({
            url: urlSanitize(data_json.url),
            type: data_json.type,
            error: function (errors) {
                showError(errors)
            },
            success: function (data) {
                toastShow(data.notification, 200);
            }
        });
    }

    if (typeof VIEW_ONLY === 'undefined') {
        showAction('all');
    } else {
        bindsClick();
    }

});