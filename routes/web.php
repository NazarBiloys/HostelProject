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

Route::get('/services', 'ServiceController@index');
Route::get('/sauna','ServiceController@sauna');
Route::get('/restaurant','ServiceController@restaurant');
Route::get('/pool','ServiceController@swimingpool');
Route::get('/parking','ServiceController@parking');
Route::get('/comments','CommentController@index');
Route::post('/comment','CommentController@store');
Route::get('/info','ServiceController@contact');
Route::post('/send','ServiceController@send')->name('send');
Route::get('/bron','ServiceController@bron');
Route::get('/inform/room','ServiceController@sortroom');
Route::post('/inform','ServiceController@sort')->name('sort');
Route::get('/inform/price','ServiceController@price');
Route::get('/inform/available','ServiceController@available');

Auth::routes();

Route::group(['middleware' => 'admin'],function (){
    Route::resource('/admin','AdminController');
    Route::resource('/counts','CategorogyforcountsController');
    Route::resource('/state','CategorogyforstateController');
    Route::resource('/bed','BedController');
    Route::resource('/show/order','OrderController');
    Route::get('/room','AdminController@rooms')->name('admin.room');
    Route::get('/admins/comment','AdminCommentController@index');
    Route::get('/admins/comment/{id}','AdminCommentController@toogle')->name('admins.toogle');
    Route::delete('/admins/comment/destroy/{id}','AdminCommentController@destroy')->name('admins.destroy');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/brons', 'HomeController@bron')->name('brons');
    Route::post('/order', 'HomeController@order')->name('order');
    Route::get('/available','HomeController@available')->name('available');
    Route::get('/orders','HomeController@ownbrons')->name('orders');
    Route::get('/edit/order/{id}','HomeController@edit')->name('orders.edit');
    Route::post('/own/brons/update/{id}','HomeController@update')->name('orders.update');
    Route::delete('/delete/order/{id}','HomeController@destroy')->name('orders.destroy');
    Route::post('/order/go/{user_id}/{room_id}/{from}/{to}','HomeController@goorder')->name('goorder');
});

