<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\SocialController as SocialController;
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
    return view('home');
});

//Auth
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::get('logout', function () {
       \Auth::logout();
       return redirect()->route('login');
    })->name('logout');
    Route::resource('updatePassword', \App\Http\Controllers\Auth\UpdatePasswordController::class);

    //Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUserController::class);
        Route::get('/parser', ParserController::class)->name('parser');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
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

Route::group(['middleware' => 'guest'], function () {
   Route::get('/vk/start', [SocialController::class, 'start'])->name('vk.start');
   Route::get('/vk/callback', [SocialController::class, 'callback'])->name('vk.callback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
