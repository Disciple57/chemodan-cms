<script id="render_list_container" type="text/x-jsrender">
@{{for data}}
    <div class="col-md-4 col-xl-2 mb-1 no-decor">
        <div class="list-group h-100 text-center">
            <div class="list-group-item text">
                <strong>@{{>name}}</strong>
            </div>
            <div class="list-group-item">
            <a class="material-icons display-3" href="{{route('sections.index')}}/{{App\Constants\ResourceTypes::PAGES}}/@{{>id}}">&#xe8e9;</a>
            </div>
            <a href="@{{*:document.location.origin}}/@{{>url}}" target="_blank" class="list-group-item list-group-item-action h-100">/@{{>url}}</a>
            <div class="list-group-item">
                <span class="material-icons fs-14 action-btn"
               data-json='{
               "index": "@{{:#getIndex()}}",
               "modal": "#update",
               "headers": "Изменить страницу",
               "action": "update",
               "id": "@{{>id}}",
               "name": "@{{>name}}",
               "url": "@{{>url}}"
               }'>&#xe3c9;</span>

               <span class="material-icons fs-14 action-btn"
               data-json='{
               "index": "@{{:#getIndex()}}",
               "modal": "#delete",
               "headers": "Удаление",
               "action": "delete",
               "id": "@{{>id}}",
               "name": "@{{>name}}"
               }'>&#xe92b;</span>
            </div>
        </div>
    </div>
@{{/for}}
</script>