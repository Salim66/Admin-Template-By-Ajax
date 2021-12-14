<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialLoginController;

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



/**
 * Backend Routes
 */

Auth::routes();


// Social Login Routes
Route::get('login/facebook', [SocialLoginController::class, 'facebookRedirect'])->name('facebook.redirect');
Route::get('login/facebook/callback', [SocialLoginController::class, 'loginWithFacebook'])->name('login.with.facebook');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    // users routes
    Route::prefix('users')->group(function () {
        Route::resource('/list', UserController::class);
        Route::get('/show-all-users', [UserController::class, 'showAllUsers']);
        Route::post('/admin-edit-store', [UserController::class, 'updateUser']);
        Route::get('/admin-status-update/{id}/{val}', [UserController::class, 'updateUserStatus']);
        Route::get('/trash-list', [UserController::class, 'listUserTrash'])->name('users.trash');
        Route::get('/admin-trash-update/{id}/{val}', [UserController::class, 'updateUserTrash']);
        Route::post('/delete', [UserController::class, 'deleteByAjax'])->name('users.delete.by-ajax');
    });

    // categories routes
    Route::prefix('categories')->group(function () {
        Route::resource('/list', CategoryController::class);
        Route::get('/show-all-categories', [CategoryController::class, 'showAllCategory']);
        Route::post('/category-edit-store', [CategoryController::class, 'updateCategory']);
        Route::get('/category-status-update/{id}/{val}', [CategoryController::class, 'updateCategoryStatus']);
        Route::get('/trash-list', [CategoryController::class, 'listCategoryTrash'])->name('categories.trash');
        Route::get('/category-trash-update/{id}/{val}', [CategoryController::class, 'updateCategoryTrash']);
        Route::post('/delete', [CategoryController::class, 'deleteByAjax'])->name('categories.delete.by-ajax');
    });

});

