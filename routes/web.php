<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){

	Route::group(['middleware' =>['ckAdmin']], function (){

		Route::get('admin','Admin\DashboardController@index');
		Route::resource('admin/category','Admin\CategoryController');
		Route::resource('admin/details','Admin\DetailsController');
	});

});
