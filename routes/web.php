<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
    function() {
        Route::get('dashboard', 'DashboardController@index');
        Route::resource('categories', 'CategoryController');
        Route::resource('tickets', 'TicketController');

        Route::resource('buses', 'BusController');
        Route::get('buses/{busID}/images', 'BusController@images');
        Route::get('buses/{busID}/add-image', 'BusController@add_image');
        Route::post('buses/images/{busID}', 'BusController@upload_image');
        Route::delete('buses/images/{busID}', 'BusController@remove_image');

        Route::resource('drivers', 'DriverController');
        Route::get('drivers/{driverID}/images', 'DriverController@images');
        Route::get('drivers/{driverID}/add-image', 'DriverController@add_image');
        Route::post('drivers/images/{driverID}', 'DriverController@upload_image');
        Route::delete('drivers/images/{driverID}', 'DriverController@remove_image');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
