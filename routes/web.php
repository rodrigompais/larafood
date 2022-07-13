<?php

Route:: get('admin/plans/{url}','Admin\PlanController@show')->name('plans.show');
Route:: post('admin/plans','Admin\PlanController@store')->name('plans.store');
Route:: get('admin/plans/create','Admin\PlanController@create')->name('plans.create');
Route:: get('admin/plans','Admin\PlanController@index')->name('plans.index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
