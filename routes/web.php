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
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
