<script id="render_list_container" type="text/x-jsrender">
@{{for data}}
    <div class="col-md-4 col-xl-2 mb-1 no-decor">
        <div class="list-group h-100 text-center">
            <div class="list-group-item text">
                <strong>@{{>name}}</strong>
            </div>
            <div class="list-group-item">
                <a class="material-icons display-3" href="{{route('sections.index')}}/{{$ResourceTypes::SLIDERS}}/@{{>id}}">&#xe41b;</a>
            </div>
            <div class="list-group-item fa-lg">
                <span class="material-icons fs-14 action-btn"
               data-json='{
               "index": "@{{:#getIndex()}}",
               "modal": "#update",
               "headers": "Изменить слайдер",
               "action": "update"
               }'>&#xe3c9;</span>

               <span class="material-icons fs-14 action-btn"
               data-json='{
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