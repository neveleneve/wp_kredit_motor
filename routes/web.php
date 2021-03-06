<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@index')->name('login')->middleware('guest');
Route::get('/credit-check', 'KreditController@index')->name('credit-check');
Route::post('/login', 'LoginController@loggingin')->name('loggingin');
Route::get('/logout', 'LoginController@logout')->name('logout');

#region AJAX
Route::get('/kelurahan/{id}', 'DataController@kelurahan');
Route::get('/kelurahan/table/{id}', 'DataController@tablekelurahan');
Route::get('/tipekendaraan/{id}', 'DataController@tipekendaraan');
Route::get('/tipekendaraan/table/{id}', 'DataController@tabletipekendaraan');
Route::get('/tahunharga/{id}', 'DataController@tahunharga');
Route::get('/harga/{id}', 'DataController@harga');
Route::get('/tenor/{id}', 'DataController@tenor');
Route::get('/tenor/table/{id}', 'DataController@tabletenor');
Route::get('/angsuran/{id}', 'DataController@angsuran');
Route::get('/sidebar', 'DataController@sidebar');
Route::get('/pengajuan/{id}', 'DataController@pengajuan');
#endregion

#region MARKETING
Route::group(['middleware' => 'auth:marketing'], function () {
    #region MARKETING-DASHBOARD
    Route::get('/marketing', 'MarketingController@dashboard')->name('dashboard');
    #endregion

    #region MARKETING-NASABAH
    Route::get('/marketing/nasabah', 'MarketingController@nasabah')->name('nasabah');
    Route::get('/marketing/nasabah/add', 'MarketingController@addnasabah')->name('addnasabah');
    Route::post('/marketing/nasabah/add', 'MarketingController@ceknasabah')->name('ceknasabah');
    Route::get('/marketing/nasabah/view/{id}', 'MarketingController@viewnasabah')->name('viewnasabah');
    Route::get('/marketing/nasabah/pengajuan/{id}', 'MarketingController@transaksinasabah')->name('transaksinasabah');
    Route::get('/marketing/nasabah/pengajuan/add/{id}', 'MarketingController@pengajuannasabah')->name('pengajuannasabah');
    Route::get('/marketing/nasabah/pengajuan/delete/{id}', 'MarketingController@hapuspengajuan')->name('hapuspengajuan');
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
Route::group(['middleware' => 'auth:cs'], function () {
    #region CS-DASHBOARD 
    Route::get('/cs', 'CSController@dashboard')->name('csdashboard');
    #endregion

    #region CS-KECAMATAN
    Route::get('/cs/daerah', 'CSController@kecamatan')->name('cskecamatan');
    Route::get('/cs/daerah/kecamatan/hapus/{id}', 'CSController@hapuskecamatan')->name('cshapuskecamatan');
    Route::get('/cs/daerah/kelurahan/hapus/{id}', 'CSController@hapuskelurahan')->name('cshapuskelurahan');
    #endregion

    #region CS-NASABAH
    Route::get('/cs/nasabah', 'CSController@nasabah')->name('csnasabah');
    Route::get('/cs/nasabah/view/{id}', 'CSController@viewnasabah')->name('csviewnasabah');
    Route::get('/cs/nasabah/pengajuan/{id}', 'CSController@transaksinasabah')->name('cstransaksinasabah');
    #endregion

    #region CS-KREDIT
    Route::get('/cs/kredit', 'CSController@kredit')->name('cskredit');
    Route::get('/cs/kredit/tenor/{id}', 'CSController@hapustenor')->name('cshapustenor');
    #endregion

    #region CS-KENDARAAN
    Route::get('/cs/kendaraan', 'CSController@kendaraan')->name('cskendaraan');
    #endregion

    #region CS-TRANSAKSI
    Route::get('/cs/pengajuan', 'CSController@transaksi')->name('cstransaksi');
    Route::get('/cs/pengajuan/verifikasi/{id}', 'CSController@verifikasitransaksi')->name('csverifikasitransaksi');
    Route::post('/cs/pengajuan/verifikasi', 'CSController@verification')->name('csverification');
    #endregion

    #region CS-SETTING
    Route::get('/cs/setting', 'CSController@setting')->name('cssetting');
    #endregion
});

#endregion
