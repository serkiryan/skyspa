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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index')->name('user');
    Route::get('/contacts', 'ContactsController@index')->name('contacts');
    Route::get('/contacts/all', 'ContactsController@all')->name('all');
    Route::get('/contacts/add', 'ContactsController@add')->name('add');
    Route::post('/contacts/store', 'ContactsController@store')->name('store');
    Route::get('/contacts/edit/{contact_id}', 'ContactsController@edit')->name('edit');
    Route::post('/contacts/save', 'ContactsController@save')->name('save');
    Route::get('/contacts/delete/{contact_id}', 'ContactsController@delete')->name('delete');
    Route::get('/contacts/remove/{contact_id}', 'ContactsController@remove')->name('remove');
    Route::get('/history', 'HistoryController@index')->name('history');
    Route::get('/history/export', 'HistoryController@export')->name('export');
});

Auth::routes();