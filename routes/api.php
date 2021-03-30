<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['web','auth'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'as'         => 'auth',
    'prefix'     => 'auth',
    'middleware' => ['web']
], function () {
    Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest']);
});

Route::group([
    'as'         => 'auth',
    'prefix'     => 'auth',
    'middleware' => ['auth']
], function () {
    Route::apiresource('users', \App\Http\Controllers\Api\UserController::class)->only(['index','store','destroy','show','update']);
});


Route::group([
    'as'     => 'blog',
    'prefix' => 'blog',
], function () {
    Route::apiresource('categories', \App\Http\Controllers\Api\Blog\CategoryController::class)->only(['index','show']);
    Route::apiresource('posts', \App\Http\Controllers\Api\Blog\PostController::class)->only(['index','show']);

    Route::group(['middleware' => ['auth']], function () {

        Route::apiresource('categories', \App\Http\Controllers\Api\Blog\CategoryController::class)->only(['store','destroy','update']);
        Route::apiresource('posts', \App\Http\Controllers\Api\Blog\PostController::class)->only(['store','destroy','update']);
        Route::put('posts/publish/{post}', [\App\Http\Controllers\Api\Blog\PostController::class, 'publish'])->name('post.publish');
    });
    Route::apiresource('tags', \App\Http\Controllers\Api\Blog\TagController::class)->only(['index','store','destroy','show','update']);

});
