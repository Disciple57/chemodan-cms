<script id="update" type="text/x-jsrender">
<div class="modal-header">
    <h5 class="modal-title">@{{:~data_json.headers}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form">
    <div class="modal-body">
        <div class="form-group">
            <input type="name" id="name" class="form-control" name="name"
                   placeholder="Название компонента" value="@{{>name}}" autocomplete="off">
            <span class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
            <input type="name" id="filename" class="form-control" name="filename"
                   placeholder="Имя файла" value="@{{>filename}}" autocomplete="off" @{{if ~data_json.action == 'update'}}disabled@{{/if}}>
            <span class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
            <label for="html">HTML</label>
            @{{if id}}<a class="material-icons no-decor ml-2" href="{{route('components.index')}}/builder/@{{>id}}">&#xe869;</a>@{{/if}}
            <textarea data-id="html" class="d-none" name="html">@{{>html}}</textarea>
            <span class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
            <label for="css">CSS</label>
            <textarea data-id="css" class="d-none" name="css">@{{>css}}</textarea>
            <span class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group">
            <label for="js">JavaScript</label>
            <textarea data-id="javascript" class="d-none" name="js">@{{>js}}</textarea>
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button data-json='{"@{{:~data_json.action}}": true, "id": "@{{>id}}"}' type="submit" class="btn btn-primary send-form">Сохранить</button>
    </div>
</form>
@{{* aceInit();}}
</script>

<script id="delete" type="text/x-jsrender">
<div class="modal-header">
    <h5 class="modal-title">@{{:~data_json.headers}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    <div class="modal-body">
            Вы действительно хотите удалить компонент <strong>"@{{:~data_json.name}}"</strong>?
            <p>Возможно он используется на страницах!</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
        <button data-json='{"delete": true, "id": "@{{>id}}"}' class="btn btn-primary">Да</button>
    </div>
</script>