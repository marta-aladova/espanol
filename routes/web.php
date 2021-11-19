<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
Route::get('/vocabulary', [\App\Http\Controllers\VocabularyController::class, 'show'])->name('vocabulary.show');
Route::post('/ajax/showEdit/', [\App\Http\Controllers\AjaxController::class, 'showEditWord']);
Route::post('/vocabulary/create', [\App\Http\Controllers\VocabularyController::class, 'create'])->name('vocabulary.create');
Route::post('/vocabulary/search', [\App\Http\Controllers\VocabularyController::class, 'search'])->name('vocabulary.search');
Route::post('/vocabulary/delete/', [\App\Http\Controllers\VocabularyController::class, 'delete'])->name('vocabulary.delete');
Route::post('/vocabulary/edit/', [\App\Http\Controllers\VocabularyController::class, 'edit'])->name('vocabulary.edit');