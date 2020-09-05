<?php

// Authentication Routes...
Route::namespace('Auth')->group(function () {
    Route::middleware(['web'])->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('logout');
    });
});

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('users', 'UsersController');
    Route::resource('pages', 'PagesController');
    Route::post('generate_all', 'PagesController@generateAllPages')->name('pages.generate_all');

    Route::resource('fonts', 'FontsController');
    Route::post('fonts/sortable', 'FontsController@sortable')->name('fonts.sortable');

    Route::resource('font_icons', 'FontIconsController');

    Route::resource('colors', 'ColorsController');
    Route::post('colors/sortable', 'ColorsController@sortable')->name('colors.sortable');

    Route::resource('images', 'ImagesController');
    Route::post('images/sortable', 'ImagesController@sortable')->name('images.sortable');

    Route::resource('bg_images', 'BgImagesController');
    Route::post('bg_images/sortable', 'BgImagesController@sortable')->name('bg_images.sortable');

    Route::get('sections', 'SectionsController@all')->name('sections.index');
    Route::get('sections/{resource}/{id_resource}', 'SectionsController@index')->where(['resource' => '[A-Za-z]+', 'id_resource' => '[0-9]+']);
    Route::get('sections/{resource}/{id_resource}/all', 'SectionsController@show')->where(['resource' => '[A-Za-z]+', 'id_resource' => '[0-9]+']);
    Route::post('sections/{resource}/{id_resource}', 'SectionsController@store')->where(['resource' => '[A-Za-z]+', 'id_resource' => '[0-9]+']);
    Route::get('sections/{resource}/{id_resource}/{id_section}/edit', 'SectionsController@edit')->where(['resource' => '[A-Za-z]+', 'id_resource' => '[0-9]+', 'id_section' => '[0-9]+']);
    Route::put('sections/{resource}/{id_resource}/{id_section}', 'SectionsController@update')->where(['resource' => '[A-Za-z]+', 'id_resource' => '[0-9]+', 'id_section' => '[0-9]+']);
    Route::post('sections/{resource}/{id_resource}/sortable', 'SectionsController@sortable')->name('sections.sortable');
    Route::delete('sections/{resource}/{id_resource}/{id_section}', 'SectionsController@destroy')->where(['resource' => '[A-Za-z]+', 'id_resource' => '[0-9]+', 'id_section' => '[0-9]+']);

    Route::get('seo/{resource}', 'SeoController@index')->where(['resource' => '[A-Za-z]+'])->name('seo.index');
    Route::get('seo/{resource}/all', 'SeoController@show')->where(['resource' => '[A-Za-z]+'])->name('seo.show');
    Route::post('seo/{resource}', 'SeoController@store')->where(['resource' => '[A-Za-z]+'])->name('seo.store');
    Route::put('seo/{resource}/{id}', 'SeoController@update')->where(['resource' => '[A-Za-z]+', 'id' => '[0-9]+'])->name('seo.update');

    Route::resource('components', 'ComponentsController');
    Route::post('components/sortable', 'ComponentsController@sortable')->name('components.sortable');
    Route::get('components/builder/{id}', 'ComponentsController@builder')->where(['id' => '[0-9]+']);
    Route::put('components/builder/{id}', 'ComponentsController@htmlUpdate')->where(['id' => '[0-9]+']);

    Route::resource('sliders', 'SlidersController');
});