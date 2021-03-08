<?php

use Illuminate\Support\Facades\Route;
// General
Route::get('/', 'LoginController@index');
Route::get('/credit-check', 'KreditController@index');

// Admin
Route::get('/administrator', 'AdminController@dashboard')->name('dashboard');

Route::get('/administrator/nasabah', 'AdminController@nasabah')->name('nasabah');
Route::get('/administrator/nasabah/add', 'AdminController@addnasabah')->name('addnasabah');
Route::post('/administrator/nasabah/add', 'AdminController@ceknasabah')->name('ceknasabah');
Route::get('/administrator/nasabah/view/{id}', 'AdminController@viewnasabah')->name('viewnasabah');

Route::get('/administrator/kredit', 'AdminController@kredit')->name('kredit');
Route::get('/administrator/kredit/add', 'AdminController@addkredit')->name('addkredit');
Route::get('/administrator/kredit/view/{id}', 'AdminController@viewkredit')->name('viewkredit');

Route::get('/administrator/payment', 'AdminController@payment')->name('payment');
Route::get('/administrator/payment/add', 'AdminController@addpayment')->name('addpayment');

Route::get('/administrator/setting', 'AdminController@setting')->name('setting');

Route::get('/administrator/logout', 'AdminController@logout')->name('logout');
