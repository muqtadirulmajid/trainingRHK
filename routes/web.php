<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'PageController@index')->name('landing');
    Route::get('/home', function() {
        return redirect()->route('dashboard');
    });
    Route::get('/pelatihan/{month}/{year}/{slug}', 'PageController@show')->name('landing.show');
    Route::post('send/telegram', 'PageController@telegram')->name('send.telegram');

    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        //Landing Page
        Route::group(['prefix' => 'landing'], function () {
            Route::get('/landing-page', 'DashboardController@landing_page')->name('dashboard.landing_page');
            Route::get('/landing-page/edit/{code}', 'DashboardController@edit_landing_page')->name('dashboard.landing.edit');
            Route::put('/landing-page/update/{code}', 'DashboardController@update_landing_page')->name('dashboard.landing.update');
            Route::get('/slider', 'DashboardController@slider')->name('dashboard.slider');
            Route::post('/slider', 'DashboardController@slider_store')->name('dashboard.slider.store');
            Route::get('/slider/set-status/{id?}/{status?}', 'DashboardController@set_status_slider')->name('dashboard.slider.status');
            Route::delete('/slider/{id}', 'DashboardController@slider_destroy')->name('dashboard.slider.destroy');
            Route::get('/slider/{id}', 'DashboardController@slider_edit')->name('dashboard.slider.edit');
            Route::put('/slider/{id}', 'DashboardController@slider_update')->name('dashboard.slider.update');
        });

        Route::resource('/materi', 'MateriController', [
            'names' => 'dashboard.materi'
        ])->except(['show']);

        Route::group(['prefix' => 'materi'], function () {
            Route::get('/{month?}/{year?}/{slug?}', 'DetailMateriController@show')->name('dashboard.detail_materi.show');
            Route::get('/{month?}/{year?}/{slug?}/{jenis}', 'DetailMateriController@create')->name('dashboard.detail_materi.create');
            Route::get('/{month?}/{year?}/{slug?}/gallery/create', 'DetailMateriController@create_gallery')->name('dashboard.detail_materi.create_gallery');
            Route::get('/{month?}/{year?}/{slug?}/partner/create', 'DetailMateriController@create_partner')->name('dashboard.detail_materi.create_partner');
        });

        Route::group(['prefix' => 'gallery'], function () {
            Route::post('/', 'DetailMateriController@store_gallery')->name('gallery.store');
            Route::delete('/{id}', 'DetailMateriController@destroy_gallery')->name('gallery.destroy');
            Route::get('/{id}', 'DetailMateriController@edit_gallery')->name('gallery.edit');
            Route::get('/status/{id?}/{status?}', 'DetailMateriController@status_gallery')->name('gallery.status');
            Route::put('/{id}', 'DetailMateriController@update_gallery')->name('gallery.update');
        });

        Route::group(['prefix' => 'partner'], function () {
            Route::post('/', 'DetailMateriController@store_partner')->name('partner.store');
            Route::delete('/{id}', 'DetailMateriController@destroy_partner')->name('partner.destroy');
            Route::get('/{id}', 'DetailMateriController@edit_partner')->name('partner.edit');
            Route::get('/status/{id?}/{status?}', 'DetailMateriController@status_partner')->name('partner.status');
            Route::put('/{id}', 'DetailMateriController@update_partner')->name('partner.update');
        });

        Route::group(['prefix' => 'faq'], function () {
            Route::get('/{id}', 'DetailMateriController@faq_show')->name('faq.show');
            Route::put('/{id}', 'DetailMateriController@faq_update')->name('faq.update');
        });

        Route::group(['prefix' => 'dokumen'], function () {
            Route::post('/', 'DocumentController@store')->name('document.store');
            Route::get('/detail/document/{id}', 'DocumentController@show')->name('document.show');
            Route::post('/detail/document/{id}', 'DocumentController@store_detail')->name('document.detail.store');
            Route::get('/detail/document/sub/{id}', 'DocumentController@show_subdetail')->name('document.subdetail.show');
            Route::get('/detail/document/sub/create/{id}', 'DocumentController@create_subdetail')->name('create.subdetail.document');
            Route::post('/detail/document/sub/create/{id}', 'DocumentController@store_subdetail')->name('store.subdetail.document');

            Route::delete('document/{id}', 'DocumentController@destroy_document')->name('destroy.document');
            Route::delete('document/detail/{id}', 'DocumentController@destroy_document_detail')->name('destroy.document.detail');
            Route::delete('document/detail/sub/{id}', 'DocumentController@destroy_document_detail_sub')->name('destroy.document.sub');

            Route::get('document/{id}/edit', 'DocumentController@edit_document')->name('edit.document');
            Route::get('document/detail/{id}/edit', 'DocumentController@edit_document_detail')->name('edit.document.detail');
            Route::get('document/detail/sub/{id}/edit', 'DocumentController@edit_document_detail_sub')->name('edit.document.sub');

            Route::put('document/{id}/update', 'DocumentController@update_document')->name('update.document');
            Route::put('document/detail/{id}/update', 'DocumentController@update_document_detail')->name('update.document.detail');
            Route::put('document/detail/sub/{id}/update', 'DocumentController@update_document_detail_sub')->name('update.document.sub');
        });
    });
});

