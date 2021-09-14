<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\StaticPageController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

//news
Route::get('/categories', [NewsController::class, 'showCategories'])
    ->name('categories');
Route::get('/categories/{category}', [NewsController::class, 'showCategoryNews'])
    ->name('news.showCategoryNews');
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

//static
Route::get('/about', [StaticPageController::class, 'about'])
    ->name('about');
Route::get('/feedback', [StaticPageController::class, 'feedback'])
    ->name('feedback');
Route::get('/dataRequestForm', [StaticPageController::class, 'dataRequestForm'])
    ->name('dataRequestForm');
