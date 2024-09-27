<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ShortLinkController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//----Admin-----//
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group(['prefix' => 'shortener-link'], function () {
        Route::get('/', [ShortLinkController::class, 'index']);
        Route::post('store', [ShortLinkController::class, 'store']);
        Route::get('edit/{id}', [ShortLinkController::class, 'edit']);
        Route::post('update/{id}', [ShortLinkController::class, 'update']);
        Route::delete('delete/{id}', [ShortLinkController::class, 'destroy']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::get('get/{code}', [ShortLinkController::class ,'shortenLink']);
