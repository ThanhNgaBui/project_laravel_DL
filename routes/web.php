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
		Route::resource('admin/departure_schedule','Admin\Departure_scheduleController');
		Route::resource('admin/attractions','Admin\AttractionsController');
		Route::resource('admin/food_information','Admin\Food_informationController');
		Route::resource('admin/travel_handbook','Admin\Travel_handbookController');
		Route::resource('admin/car_service','Admin\Car_serviceController');
		Route::resource('admin/hotel_service','Admin\Hotel_serviceController');
	});

});
