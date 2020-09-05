@php $breakpoints = ['sm', 'md', 'lg', 'xl']; @endphp

<template data-tool="container{breakpoint}" data-header="Брекпоинт контейнера">
    <select data-rels class="form-control form-control-extra-sm">
        <option data-rel="container">container</option>
        @foreach ($breakpoints as $breakpoint)
            <option data-rel="container-{{$breakpoint}}">container-{{$breakpoint}}</option>
        @endforeach
        <option data-rel="container-fluid">container-fluid</option>
    </select>
</template>

<template data-tool="col{breakpoint}" data-header="Опции колонок">
    <div class="row no-gutters">
        <div class="col-5">
            <small>Статическая ширина</small>
        </div>
        <div class="col-2 text-center">
            <small>Скрыть</small>
        </div>
        <div class="col-5 text-center">
            <small>Показать</small>
        </div>
        <div class="col-5">
            <select data-rels class="form-control form-control-extra-sm">
                @for ($i = 1; $i <= 12; $i++)
                    <option data-rel="col-{{$i}}">col-{{$i}}</option>
                @endfor
                <option data-rel="col-auto">col-auto</option>
            </select>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-end">
            <div data-rels>
                <input type="checkbox" data-rel="d-none">
            </div>
        </div>
        <div class="col-5">
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="">---</option>
                <option data-rel="d-block">d-block</option>
                <option data-rel="d-inline-block">d-inline-block</option>
                <option data-rel="d-inline">d-inline</option>
                <option data-rel="d-flex">d-flex</option>
                <option data-rel="d-inline-flex">d-inline-flex</option>
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-12 mt-1">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
            </div>
            <div class="col-5">
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>По умолчанию</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option data-rel="col-{{$breakpoint}}-{{$i}}">col-{{$breakpoint}}-{{$i}}</option>
                    @endfor
                    <option data-rel="col-{{$breakpoint}}-auto">col-{{$breakpoint}}-auto</option>
                </select>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-end">
                <div data-rels>
                    <input type="checkbox" data-rel="d-{{$breakpoint}}-none">
                </div>
            </div>
            <div class="col-5">
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="">---</option>
                    <option data-rel="d-{{$breakpoint}}-block">d-block</option>
                    <option data-rel="d-{{$breakpoint}}-inline-block">d-inline-block</option>
                    <option data-rel="d-{{$breakpoint}}-inline">d-inline</option>
                    <option data-rel="d-{{$breakpoint}}-flex">d-flex</option>
                    <option data-rel="d-{{$breakpoint}}-inline-flex">d-inline-flex</option>
                </select>
            </div>
        @endforeach
    </div>
</template>

<template data-tool="align" data-header="Выравнивание">
    <div class="row">
        <div class="col-12">
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>По умолчанию</option>
                <option data-rel="text-left">По левому краю</option>
                <option data-rel="text-center">По центру</option>
                <option data-rel="text-right">По правому краю</option>
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-6 mt-1">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>По умолчанию</option>
                    <option data-rel="text-{{$breakpoint}}-left">По левому краю</option>
                    <option data-rel="text-{{$breakpoint}}-center">По центру</option>
                    <option data-rel="text-{{$breakpoint}}-right">По правому краю</option>
                </select>
            </div>
        @endforeach
    </div>
</template>

<template data-tool="flex-align" data-header="Флекс выравнивание">
    <div class="row">
        <div class="col-12">
            <small>Флекс выравнивание ось X</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>По умолчанию</option>
                <option data-rel="justify-content-start">start</option>
                <option data-rel="justify-content-end">end</option>
                <option data-rel="justify-content-center">center</option>
                <option data-rel="justify-content-between">between</option>
                <option data-rel="justify-content-around">around</option>
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-6 mt-1">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>По умолчанию</option>
                    <option data-rel="justify-content-{{$breakpoint}}-start">start</option>
                    <option data-rel="justify-content-{{$breakpoint}}-end">end</option>
                    <option data-rel="justify-content-{{$breakpoint}}-center">center</option>
                    <option data-rel="justify-content-{{$breakpoint}}-between">between</option>
                    <option data-rel="justify-content-{{$breakpoint}}-around">around</option>
                </select>
            </div>
        @endforeach
        <div class="col-12 mt-2 border-top">
            <small>Флекс выравнивание ось Y</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>По умолчанию</option>
                <option data-rel="align-items-start">start</option>
                <option data-rel="align-items-end">end</option>
                <option data-rel="align-items-center">center</option>
                <option data-rel="align-items-baseline">baseline</option>
                <option data-rel="align-items-stretch">stretch</option>
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-6 mt-1">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>По умолчанию</option>
                    <option data-rel="align-items-{{$breakpoint}}-start">start</option>
                    <option data-rel="align-items-{{$breakpoint}}-end">end</option>
                    <option data-rel="align-items-{{$breakpoint}}-center">center</option>
                    <option data-rel="align-items-{{$breakpoint}}-baseline">baseline</option>
                    <option data-rel="align-items-{{$breakpoint}}-stretch">stretch</option>
                </select>
            </div>
        @endforeach
    </div>
</template>

<template data-tool="gutters" data-header="Горизонтальные отступы">
    <div data-rels class="d-flex align-items-center">
        <input type="checkbox" data-rel="no-gutters">
        <span class="ml-1">No gutters</span>
    </div>
</template>

<template data-tool="font" data-header="Шрифт">
    <div class="row">
        @if (!empty($fonts))
            <div class="col-12">
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>По умолчанию</option>
                    @foreach ($fonts as $font)
                        <option data-rel="{{$font['name']}}">{{$font['name']}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if (!empty($colors))
            <div class="col-6 font-color-select">
                <small>Цвет</small>
                <select data-rels class="form-control form-control-extra-sm color-select">
                    <option data-rel="" selected>По умолчанию</option>
                    @foreach ($colors as $color)
                        <option class="background-color{{$color['id']}} color{{$color['id']}}"
                                data-rel="color{{$color['id']}}">{{$color['color']}}</option>
                    @endforeach
                </select>
                <script>
                    $select = $('.font-color-select').find('.color-select');
                    $select_class = $select.attr('class');
                    $option_selected_class = $select.find(':selected').attr('class');
                    $select.addClass($option_selected_class);
                    $select.change(function () {
                        $new_class = $(this).find(':selected').attr('class');
                        $select.attr('class', $select_class).addClass($new_class).blur();
                    });
                </script>
            </div>
        @endif
        <div class="col-6 d-flex align-items-end">
            <div data-rels>
                <input type="checkbox" data-rel="font-italic">
                <span class="ml-1">Наклон</span>
            </div>
        </div>
        <div class="col-6">
            <small>Толщина</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>По умолчанию</option>
                <option data-rel="font-weight-light">Легкий</option>
                <option data-rel="font-weight-normal">Нормальный</option>
                <option data-rel="font-weight-bold">Жирный</option>
            </select>
        </div>
        <div class="col-6">
            <small>Регистр</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>По умолчанию</option>
                <option data-rel="text-uppercase">Верхний</option>
                <option data-rel="text-lowercase">Нижний</option>
            </select>
        </div>
        <div class="col-12 mt-3 pt-1 border-top">
            <small>Размер</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>По умолчанию</option>
                @for ($i = 1; $i <= 50; $i++)
                    <option data-rel="fs-{{$i}}">{{$i/10}}rem</option>
                @endfor
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-6">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>---</option>
                    @for ($i = 1; $i <= 50; $i++)
                        <option data-rel="fs-{{$breakpoint}}-{{$i}}">{{$i/10}}rem</option>
                    @endfor
                </select>
            </div>
        @endforeach
    </div>
</template>

<template data-tool="padding" data-header="Внутренние отступы">
    <div id="padding" class="accordion">
        <div class="card">
            <div class="card-header dropdown-toggle" data-toggle="collapse" data-target="#p-collapse-st"
                 aria-expanded="true"
                 aria-controls="p-collapse-st">
                <small>Отступы</small>
            </div>
            <div id="p-collapse-st" data-parent="#padding" class="collapse card-body">
                <div class="row">
                    <div class="col-6">
                        <small>Лево</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="pl-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Право</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="pr-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Верх</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="pt-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Низ</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="pb-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Верх и низ</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="py-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Лево и право</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="px-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($breakpoints as $breakpoint)
            <div class="card">
                <div class="card-header dropdown-toggle" data-toggle="collapse"
                     data-target="#p-collapse-{{$breakpoint}}"
                     aria-expanded="true"
                     aria-controls="p-collapse-{{$breakpoint}}">
                    <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                </div>
                <div id="p-collapse-{{$breakpoint}}" data-parent="#padding" class="collapse card-body">
                    <div class="row">
                        <div class="col-6">
                            <small>Лево</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="pl-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Право</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="pr-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Верх</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="pt-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Низ</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="pb-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Верх и низ</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="py-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Лево и право</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="px-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</template>

<template data-tool="margin" data-header="Внешнние отступы">
    <div id="margin" class="accordion">
        <div class="card">
            <div class="card-header dropdown-toggle" data-toggle="collapse" data-target="#m-collapse-st"
                 aria-expanded="true"
                 aria-controls="m-collapse-st">
                <small>Отступы</small>
            </div>
            <div id="m-collapse-st" data-parent="#margin" class="collapse card-body">
                <div class="row">
                    <div class="col-6">
                        <small>Лево</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            <option data-rel="ml-auto">auto</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="ml-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Право</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            <option data-rel="mr-auto">auto</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="mr-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Верх</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            <option data-rel="mt-auto">auto</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="mt-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Низ</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            <option data-rel="mb-auto">auto</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="mb-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Верх и низ</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            <option data-rel="my-auto">auto</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="my-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Лево и право</small>
                        <select data-rels class="form-control form-control-extra-sm">
                            <option data-rel="">По умолчанию</option>
                            <option data-rel="mx-auto">auto</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option data-rel="mx-{{$i}}">{{$i}}rem</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($breakpoints as $breakpoint)
            <div class="card">
                <div class="card-header dropdown-toggle" data-toggle="collapse"
                     data-target="#m-collapse-{{$breakpoint}}"
                     aria-expanded="true"
                     aria-controls="m-collapse-{{$breakpoint}}">
                    <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                </div>
                <div id="m-collapse-{{$breakpoint}}" data-parent="#margin" class="collapse card-body">
                    <div class="row">
                        <div class="col-6">
                            <small>Лево</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                <option data-rel="ml-{{$breakpoint}}-auto">auto</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="ml-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Право</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                <option data-rel="mr-{{$breakpoint}}-auto">auto</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="mr-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Верх</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                <option data-rel="mt-{{$breakpoint}}-auto">auto</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="mt-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Низ</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                <option data-rel="mb-{{$breakpoint}}-auto">auto</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="mb-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Верх и низ</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                <option data-rel="my-{{$breakpoint}}-auto">auto</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="my-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6">
                            <small>Лево и право</small>
                            <select data-rels class="form-control form-control-extra-sm">
                                <option data-rel="">По умолчанию</option>
                                <option data-rel="mx-{{$breakpoint}}-auto">auto</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option data-rel="mx-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</template>

@if (!empty($colors) || !empty($bg_images))
    <template data-tool="background" data-header="Заливка">
        <div class="row">
            @if (!empty($colors))
                <div class="col-6 bg-color-select">
                    <small>Цвет</small>
                    <select data-rels class="form-control form-control-extra-sm color-select">
                        <option data-rel="" selected>По умолчанию</option>
                        @foreach ($colors as $color)
                            <option class="background-color{{$color['id']}} color{{$color['id']}}"
                                    data-rel="background-color{{$color['id']}}">{{$color['color']}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if (!empty($bg_images))
                <div class="col-12 mt-3 pt-1 border-top">
                    <small>Фоновое изображение</small>
                    <div class="border p-1 img_parent image-select" data-toggle="modal"
                         data-target="#background-images-modal">
                        <div class="img_container">
                            <img class="fill" src="/app/admin/img/no-image-available.svg">
                        </div>
                    </div>

                    <div class="modal fade" id="background-images-modal">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Изображения</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div data-rels="" id="images_list"
                                     class="row modal-body justify-content-center text-center">
                                    <div class="col-6 col-sm-4 col-xl-2 mb-1">
                                        <div class="list-group h-100 text-center">
                                            <div class="list-group-item active" data-rel="">
                                                <div class="img_container">
                                                    <img class="fill" src="/app/admin/img/no-image-available.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($bg_images as $bg_image)
                                        <div class="col-6 col-sm-4 col-xl-2 mb-1">
                                            <div class="list-group h-100 text-center">
                                                <div class="list-group-item img_parent"
                                                     data-rel="bg-img-{{$bg_image['id']}}">
                                                    <div class="img_container">
                                                        <img class="fill" src="/app/img/{{$bg_image['file']}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <script>
            $select = $('.bg-color-select').find('.color-select');
            $select_class = $select.attr('class');
            $option_selected_class = $select.find(':selected').attr('class');
            $select.addClass($option_selected_class);
            $select.change(function () {
                $new_class = $(this).find(':selected').attr('class');
                $select.attr('class', $select_class).addClass($new_class).blur();
            });

            $img_select = $('.image-select');
            $img = $img_select.find('img');
            active = $img_select.parent().find('[data-rel].active').find('img').attr('src');
            $img.prop('src', active);
            $img_select.parent().find('[data-rel]').click(function () {
                src = $(this).find('img').attr('src');
                $img.prop('src', src);
            });
        </script>
    </template>
@endif
<template data-tool="display" data-header="Тип элемента">
    <div class="row">
        <div class="col-12 mb-2">
            <small>Display</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="">---</option>
                <option data-rel="d-none">none</option>
                <option data-rel="d-block">block</option>
                <option data-rel="d-inline-block">inline-block</option>
                <option data-rel="d-inline">inline</option>
                <option data-rel="d-flex">flex</option>
                <option data-rel="d-inline-flex">inline-flex</option>
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-6">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="">---</option>
                    <option data-rel="d-{{$breakpoint}}-none">none</option>
                    <option data-rel="d-{{$breakpoint}}-block">block</option>
                    <option data-rel="d-{{$breakpoint}}-inline-block">inline-block</option>
                    <option data-rel="d-{{$breakpoint}}-inline">inline</option>
                    <option data-rel="d-{{$breakpoint}}-flex">flex</option>
                    <option data-rel="d-{{$breakpoint}}-inline-flex">inline-flex</option>
                </select>
            </div>
        @endforeach
        <div class="col-12 my-3 pt-2 border-top">
            <small>Направление осей <strong>[flex-direction]</strong></small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="">---</option>
                <option data-rel="flex-row">flex-row</option>
                <option data-rel="flex-row-reverse">flex-row-reverse</option>
                <option data-rel="flex-column">flex-column</option>
                <option data-rel="flex-column-reverse">flex-column-reverse</option>
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-6">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="">---</option>
                    <option data-rel="flex-{{$breakpoint}}-row">flex-row</option>
                    <option data-rel="flex-{{$breakpoint}}-row-reverse">flex-row-reverse</option>
                    <option data-rel="flex-{{$breakpoint}}-column">flex-column</option>
                    <option data-rel="flex-{{$breakpoint}}-column-reverse">flex-column-reverse</option>
                </select>
            </div>
        @endforeach
    </div>
</template>

<template data-tool="height" data-header="Высота элемента">
    <div class="row">
        <div class="col-12 mb-3">
            <small>min-height:</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>---</option>
                @for ($i = 1; $i <= 50; $i++)
                    <option data-rel="min-ht-{{$i}}">{{$i}}rem</option>
                @endfor
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-6">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>---</option>
                    @for ($i = 1; $i <= 50; $i++)
                        <option data-rel="min-ht-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                    @endfor
                </select>
            </div>
        @endforeach
        <div class="col-12 my-3">
            <small>max-height:</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>---</option>
                @for ($i = 1; $i <= 50; $i++)
                    <option data-rel="max-ht-{{$i}}">{{$i}}rem</option>
                @endfor
            </select>
        </div>
        @foreach ($breakpoints as $breakpoint)
            <div class="col-6">
                <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>---</option>
                    @for ($i = 1; $i <= 50; $i++)
                        <option data-rel="max-ht-{{$breakpoint}}-{{$i}}">{{$i}}rem</option>
                    @endfor
                </select>
            </div>
        @endforeach
    </div>
</template>

<template data-tool="border" data-header="Границы элемента">
    <div class="row">
        @if (!empty($colors))
            <div class="col-6 border-color-select">
                <small>Цвет</small>
                <select data-rels class="form-control form-control-extra-sm color-select">
                    <option data-rel="" selected>По умолчанию</option>
                    @foreach ($colors as $color)
                        <option class="background-color{{$color['id']}} color{{$color['id']}}"
                                data-rel="border-color{{$color['id']}}">{{$color['color']}}</option>
                    @endforeach
                </select>
                <script>
                    $select = $('.border-color-select').find('.color-select');
                    $select_class = $select.attr('class');
                    $option_selected_class = $select.find(':selected').attr('class');
                    $select.addClass($option_selected_class);
                    $select.change(function () {
                        $new_class = $(this).find(':selected').attr('class');
                        $select.attr('class', $select_class).addClass($new_class).blur();
                    });
                </script>
            </div>
        @endif
        <div class="col-12">
            <small>Все стороны</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>---</option>
                @for ($i = 1; $i <= 24; $i++)
                    <option data-rel="border-{{$i}}">{{$i}}px</option>
                @endfor
            </select>
        </div>
        <div class="col-6">
            <small>Лево</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>---</option>
                @for ($i = 1; $i <= 24; $i++)
                    <option data-rel="border-left-{{$i}}">{{$i}}px</option>
                @endfor
            </select>
        </div>
        <div class="col-6">
            <small>Право</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>---</option>
                @for ($i = 1; $i <= 24; $i++)
                    <option data-rel="border-right-{{$i}}">{{$i}}px</option>
                @endfor
            </select>
        </div>
        <div class="col-6">
            <small>Верх</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>---</option>
                @for ($i = 1; $i <= 24; $i++)
                    <option data-rel="border-top-{{$i}}">{{$i}}px</option>
                @endfor
            </select>
        </div>
        <div class="col-6">
            <small>Низ</small>
            <select data-rels class="form-control form-control-extra-sm">
                <option data-rel="" selected>---</option>
                @for ($i = 1; $i <= 24; $i++)
                    <option data-rel="border-bottom-{{$i}}">{{$i}}px</option>
                @endfor
            </select>
        </div>
    </div>
</template>

@if (!empty($font_icons))
    <template data-tool="icon" data-header="Иконка">
        <div class="row">
            <div class="col-12">
                <small>Иконка</small>
                <div class="border p-1 text-center fs-40 icon-select" data-toggle="modal"
                     data-target="#icons-select-modal">
                    <i class="{{$font_icons[0]['data']['prefix']}}{{$font_icons[0]['data']['icons'][0]['name']}}"></i>
                </div>
                <div class="modal fade" id="icons-select-modal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Иконки</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div data-rels id="icons_list" class="row modal-body justify-content-center text-center">
                                @foreach ($font_icons as $font_icon)
                                    <div class="col-12 mt-1">
                                        <strong>{{$font_icon['name']}}</strong>
                                    </div>
                                    <div class="col-12 border d-flex flex-wrap flex-row justify-content-center">
                                        @foreach ($font_icon['data']['icons'] as $icon)
                                            <div class="icon-contain"
                                                 data-rel="{{$font_icon['data']['prefix']}}{{$icon['name']}}">
                                                <div class="{{$font_icon['data']['prefix']}}{{$icon['name']}} icon"></div>
                                                <small>{{$icon['name']}}</small>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (!empty($colors))
                <div class="col-6 icon-color-select">
                    <small>Цвет</small>
                    <select data-rels class="form-control form-control-extra-sm color-select">
                        <option data-rel="" selected>По умолчанию</option>
                        @foreach ($colors as $color)
                            <option class="background-color{{$color['id']}} color{{$color['id']}}"
                                    data-rel="color{{$color['id']}}">{{$color['color']}}</option>
                        @endforeach
                    </select>
                    <script>
                        $select = $('.icon-color-select').find('.color-select');
                        $select_class = $select.attr('class');
                        $option_selected_class = $select.find(':selected').attr('class');
                        $select.addClass($option_selected_class);
                        $select.change(function () {
                            $new_class = $(this).find(':selected').attr('class');
                            $select.attr('class', $select_class).addClass($new_class).blur();
                        });
                    </script>
                </div>
            @endif
            <div class="col-12 mt-1 pt-1 border-top">
                <small>Размер</small>
                <select data-rels class="form-control form-control-extra-sm">
                    <option data-rel="" selected>По умолчанию</option>
                    @for ($i = 1; $i <= 50; $i++)
                        <option data-rel="fs-{{$i}}">{{$i/10}}rem</option>
                    @endfor
                </select>
            </div>
            @foreach ($breakpoints as $breakpoint)
                <div class="col-6">
                    <small>Брекпоинт <strong>{{$breakpoint}}</strong></small>
                    <select data-rels class="form-control form-control-extra-sm">
                        <option data-rel="" selected>---</option>
                        @for ($i = 1; $i <= 50; $i++)
                            <option data-rel="fs-{{$breakpoint}}-{{$i}}">{{$i/10}}rem</option>
                        @endfor
                    </select>
                </div>
            @endforeach
        </div>
        <script>
            $icon_select = $('.icon-select');
            $icon = $icon_select.find('i');
            active = $icon_select.parent().find('[data-rel].active').data('rel');
            $icon.prop('class', active);
            $icon_select.parent().find('[data-rel]').click(function () {
                _class = $(this).data('rel');
                $icon.prop('class', _class);
            });
        </script>
    </template>
@endif

@if (!empty($images))
    <template data-tool="image" data-header="Изображение">
        <div class="row">
            <div class="col-12 mb-2 d-flex align-items-center">
                <div data-rels>
                    <input type="checkbox" data-rel="img-fluid">
                    <span class="ml-1">Адаптивное</span>
                </div>
            </div>
            <div class="col-12">
                <div class="border p-1 text-center fs-40 img_parent image-select" data-toggle="modal"
                     data-target="#image-select-modal">
                    <img class="img-fluid" src="/app/admin/img/builder/image.png">
                </div>
                <div class="modal fade" id="image-select-modal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Изображения</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="icons_list" class="row modal-body justify-content-center text-center">
                                @foreach ($images as $image)
                                    <div class="col-6 col-sm-4 col-xl-2 mb-1">
                                        <div class="list-group h-100 text-center">
                                            <div class="list-group-item img_parent">
                                                <div class="img_container">
                                                    <img class="fill" src="/app/img/{{$image['file']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $img_select = $('.image-select');
            $img_list = $('#image-select-modal');
            active = $_this_selected.attr('src');
            $img = $img_select.find('img');
            $img_list.find('.active').removeClass('active');
            $img_list.find('[src="' + active + '"]').parentsUntil('.img_parent').parent().addClass('active');

            $img.prop('src', active);
            $img_list.find('[src]').click(function () {
                $this = $(this);
                src = $this.attr('src');
                $img_list.find('.active').removeClass('active');
                $this.parentsUntil('.img_parent').parent().addClass('active');
                $img.prop('src', src);
                $_this_selected.prop('src', src);
            });
        </script>
    </template>
@endif

<template data-tool="href" data-header="Ссылка">
    <div class="row">
        <div class="col-12 mt-2 d-flex align-items-center">
            <input id="blank" type="checkbox" value="_blank">
            <span class="ml-1">Открывать в новом окне</span>
        </div>
        <div class="col-12">
            <small>URL</small>
            <select id="href" class="form-control form-control-extra-sm">
                <option data-href="#" selected>---</option>
                @foreach ($pages as $page)
                    <option data-href="/{{$page['url']}}">{{$page['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 mt-2">
            <input id="outside-href" type="text" class="form-control form-control-extra-sm">
        </div>
        <div class="col-12 mt-2">
            <small>Title</small>
            <input id="title" type="text" class="form-control form-control-extra-sm">
        </div>
    </div>
    <script>
        $('[data-href="/index"]').attr('data-href', '/');
        $href = $('#href');
        $outside_href = $('#outside-href');
        $title = $('#title');
        $blank = $('#blank');

        $href_elements = $href.find('[data-href]');
        $href_elements.removeAttr('selected');
        active_href = $_this_selected.attr('href');
        $outside_href.val(active_href);
        $active = $href.find('[data-href="' + active_href + '"]');
        $active.prop({"selected": true});

        $title.val($_this_selected.attr('title'));

        if ($_this_selected.is('[target]')) {
            $blank.prop({"checked": true});
        }

        $href.on('change', function () {
            $this = $(this);
            href = $this.find(':selected').data('href');
            $_this_selected.prop('href', href);
            $outside_href.val(href);
        });

        $outside_href.bind('input', function () {
            $_this_selected.prop('href', $(this).val());
        });

        $title.bind('input', function () {
            $_this_selected.prop('title', $(this).val());
        });

        $blank.on('change', function () {
            $this = $(this);
            if ($this.is(':checked')) {
                $_this_selected.prop('target', $this.val());
            } else {
                $_this_selected.removeAttr('target');
            }
        });
    </script>
</template>

<template data-tool="animate" data-header="Анимация">
    <div class="row">
        <div class="col-12">
            <div data-rels class="d-flex align-items-center">
                <input type="checkbox" data-rel="wow">
                <span class="ml-1">Анимация при прокрутке</span>
            </div>
        </div>
        <div class="col-6 animate-select">
            <small>Сценарий</small>
            <select data-rels class="form-control form-control-extra-sm recipe">
                <option data-rel="" selected>---</option>
                <optgroup label="Attention Seekers">
                    <option data-rel="bounce">bounce</option>
                    <option data-rel="flash">flash</option>
                    <option data-rel="pulse">pulse</option>
                    <option data-rel="rubberBand">rubberBand</option>
                    <option data-rel="shake">shake</option>
                    <option data-rel="swing">swing</option>
                    <option data-rel="tada">tada</option>
                    <option data-rel="wobble">wobble</option>
                    <option data-rel="jello">jello</option>
                    <option data-rel="heartBeat">heartBeat</option>
                </optgroup>

                <optgroup label="Bouncing Entrances">
                    <option data-rel="bounceIn">bounceIn</option>
                    <option data-rel="bounceInDown">bounceInDown</option>
                    <option data-rel="bounceInLeft">bounceInLeft</option>
                    <option data-rel="bounceInRight">bounceInRight</option>
                    <option data-rel="bounceInUp">bounceInUp</option>
                </optgroup>

                <optgroup label="Bouncing Exits">
                    <option data-rel="bounceOut">bounceOut</option>
                    <option data-rel="bounceOutDown">bounceOutDown</option>
                    <option data-rel="bounceOutLeft">bounceOutLeft</option>
                    <option data-rel="bounceOutRight">bounceOutRight</option>
                    <option data-rel="bounceOutUp">bounceOutUp</option>
                </optgroup>

                <optgroup label="Fading Entrances">
                    <option data-rel="fadeIn">fadeIn</option>
                    <option data-rel="fadeInDown">fadeInDown</option>
                    <option data-rel="fadeInDownBig">fadeInDownBig</option>
                    <option data-rel="fadeInLeft">fadeInLeft</option>
                    <option data-rel="fadeInLeftBig">fadeInLeftBig</option>
                    <option data-rel="fadeInRight">fadeInRight</option>
                    <option data-rel="fadeInRightBig">fadeInRightBig</option>
                    <option data-rel="fadeInUp">fadeInUp</option>
                    <option data-rel="fadeInUpBig">fadeInUpBig</option>
                </optgroup>

                <optgroup label="Fading Exits">
                    <option data-rel="fadeOut">fadeOut</option>
                    <option data-rel="fadeOutDown">fadeOutDown</option>
                    <option data-rel="fadeOutDownBig">fadeOutDownBig</option>
                    <option data-rel="fadeOutLeft">fadeOutLeft</option>
                    <option data-rel="fadeOutLeftBig">fadeOutLeftBig</option>
                    <option data-rel="fadeOutRight">fadeOutRight</option>
                    <option data-rel="fadeOutRightBig">fadeOutRightBig</option>
                    <option data-rel="fadeOutUp">fadeOutUp</option>
                    <option data-rel="fadeOutUpBig">fadeOutUpBig</option>
                </optgroup>

                <optgroup label="Flippers">
                    <option data-rel="flip">flip</option>
                    <option data-rel="flipInX">flipInX</option>
                    <option data-rel="flipInY">flipInY</option>
                    <option data-rel="flipOutX">flipOutX</option>
                    <option data-rel="flipOutY">flipOutY</option>
                </optgroup>

                <optgroup label="Lightspeed">
                    <option data-rel="lightSpeedIn">lightSpeedIn</option>
                    <option data-rel="lightSpeedOut">lightSpeedOut</option>
                </optgroup>

                <optgroup label="Rotating Entrances">
                    <option data-rel="rotateIn">rotateIn</option>
                    <option data-rel="rotateInDownLeft">rotateInDownLeft</option>
                    <option data-rel="rotateInDownRight">rotateInDownRight</option>
                    <option data-rel="rotateInUpLeft">rotateInUpLeft</option>
                    <option data-rel="rotateInUpRight">rotateInUpRight</option>
                </optgroup>

                <optgroup label="Rotating Exits">
                    <option data-rel="rotateOut">rotateOut</option>
                    <option data-rel="rotateOutDownLeft">rotateOutDownLeft</option>
                    <option data-rel="rotateOutDownRight">rotateOutDownRight</option>
                    <option data-rel="rotateOutUpLeft">rotateOutUpLeft</option>
                    <option data-rel="rotateOutUpRight">rotateOutUpRight</option>
                </optgroup>

                <optgroup label="Sliding Entrances">
                    <option data-rel="slideInUp">slideInUp</option>
                    <option data-rel="slideInDown">slideInDown</option>
                    <option data-rel="slideInLeft">slideInLeft</option>
                    <option data-rel="slideInRight">slideInRight</option>

                </optgroup>
                <optgroup label="Sliding Exits">
                    <option data-rel="slideOutUp">slideOutUp</option>
                    <option data-rel="slideOutDown">slideOutDown</option>
                    <option data-rel="slideOutLeft">slideOutLeft</option>
                    <option data-rel="slideOutRight">slideOutRight</option>

                </optgroup>

                <optgroup label="Zoom Entrances">
                    <option data-rel="zoomIn">zoomIn</option>
                    <option data-rel="zoomInDown">zoomInDown</option>
                    <option data-rel="zoomInLeft">zoomInLeft</option>
                    <option data-rel="zoomInRight">zoomInRight</option>
                    <option data-rel="zoomInUp">zoomInUp</option>
                </optgroup>

                <optgroup label="Zoom Exits">
                    <option data-rel="zoomOut">zoomOut</option>
                    <option data-rel="zoomOutDown">zoomOutDown</option>
                    <option data-rel="zoomOutLeft">zoomOutLeft</option>
                    <option data-rel="zoomOutRight">zoomOutRight</option>
                    <option data-rel="zoomOutUp">zoomOutUp</option>
                </optgroup>

                <optgroup label="Specials">
                    <option data-rel="hinge">hinge</option>
                    <option data-rel="jackInTheBox">jackInTheBox</option>
                    <option data-rel="rollIn">rollIn</option>
                    <option data-rel="rollOut">rollOut</option>
                </optgroup>
            </select>
            <script>
                $select = $('.animate-select').find('.recipe');
                $select.change(function () {
                    if ($(this).find(':selected').data('rel') !== '') {
                        $_this_selected.addClass('animated');
                    }
                });
            </script>
        </div>
    </div>
</template>