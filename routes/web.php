<?php

use Illuminate\Support\Facades\Route;
// General
Route::get('/', 'LoginController@index')->name('login');
Route::get('/credit-check', 'KreditController@index')->name('credit-check');
Route::post('/login', 'LoginController@loggingin')->name('loggingin');
Route::get('/logout', 'LoginController@logout')->name('logout');

#region MARKETING
Route::group(['middleware' => 'auth:marketing'], function () {
    #region MARKETING-DASHBOAR
    Route::get('/marketing', 'MarketingController@dashboard')->name('dashboard');
    #endregion

    #region MARKETING-NASABAH
    Route::get('/marketing/nasabah', 'MarketingController@nasabah')->name('nasabah');
    Route::get('/marketing/nasabah/add', 'MarketingController@addnasabah')->name('addnasabah');
    Route::post('/marketing/nasabah/add', 'MarketingController@ceknasabah')->name('ceknasabah');
    Route::get('/marketing/nasabah/view/{id}', 'MarketingController@viewnasabah')->name('viewnasabah');
    Route::get('/marketing/nasabah/transaksi/{id}', 'MarketingController@transaksinasabah')->name('transaksinasabah');
    #endregion

    #region MARKETING-KREDIT
    Route::get('/marketing/kredit', 'MarketingController@kredit')->name('kredit');
    Route::get('/marketing/kredit/add', 'MarketingController@addkredit')->name('addkredit');
    Route::get('/marketing/kredit/view/{id}', 'MarketingController@viewkredit')->name('viewkredit');
    #endregion

    #region MARKETING-PAYMENT
    Route::get('/marketing/payment', 'MarketingController@payment')->name('payment');
    Route::get('/marketing/payment/add', 'MarketingController@addpayment')->name('addpayment');
    #endregion

    #region MARKETING-SETTING
    Route::get('/marketing/setting', 'MarketingController@setting')->name('setting');
    #endregion
});
#endregion

#region CS

Route::get('/cs', 'CSController@setting')->name('csdashboard');
Route::get('/cs/setting', 'MarketingController@setting')->name('cssetting');

#endregion
