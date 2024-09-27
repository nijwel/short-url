<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ShortLinkController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'App\Http\Controllers\Admin', 'middleware' =>'auth'], function(){

    Route::get('/home', 'AdminController@index')->name('home');

    /*---Admin profile route---*/
    Route::group(['prefix' => 'profile'], function() {
        Route::get('/',[AdminController::class, 'profile'])->name('profile');
        Route::post('/update',[AdminController::class, 'updateProfile'])->name('profile.update');
    });

    /*---Admin password route---*/
    Route::group(['prefix' => 'password'], function() {
        Route::get('/',[AdminController::class, 'password'])->name('password');
        Route::post('/update',[AdminController::class, 'updatePassword'])->name('update.password');
    });


    Route::group(['prefix' => 'shortener-link'], function() {
        Route::get('generate', [ShortLinkController::class ,'index'])->name('generate.shorten.link');
        Route::post('generate', [ShortLinkController::class ,'store'])->name('generate.shorten.link.post');
        Route::get('edit/{id}', [ShortLinkController::class ,'edit'])->name('edit.shorten.link');
        Route::post('update', [ShortLinkController::class ,'update'])->name('generate.shorten.link.update');
        Route::get('delete/{id}', [ShortLinkController::class ,'destroy'])->name('delete.shorten.link');
        Route::get('copy/{id}', [ShortLinkController::class ,'copyCount'])->name('copy.shorten.link');
    });

});

    Route::get('{code}', [ShortLinkController::class ,'shortenLink'])->name('shorten.link');
