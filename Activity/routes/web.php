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
    return view('index');
});

/*Route::post('/whoami', 'WhatsMyNameController@index');

Route::get('/askme', function(){
    return view('whoami');
});
Route::get('/login', function () {
    return view('login');
});*/
Route::post('/dologin2', 'LoginController@index');
Route::get('/login2', function(){
   return view('login2');
});

//Route to add customer
Route::get('/customer', function(){
    return view('customer');
});
//Route to add order
Route::get('/order', function(){
    return view('order');
})->name('order');
Route::post('/addcustomer', 'CustomerController@index')->name('addcustomer');
Route::post('/addorder', 'OrderController@index')->name('addorder');
Route::get('/logout', 'LoginController@logout');

Route::get('/loggingservice', 'TestLoggingController@index');

Route::resource('usersrest', 'UsersRestController');
Route::resource('usersrestguzzle', 'RestClientController');
