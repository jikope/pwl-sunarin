<?php

use Illuminate\Support\Facades\Route;
use app\http\controllers\ArticleController;
use App\Http\Controllers\UserController;

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
})->name('contribut.article');

//contributor

Route::get('/article/add', [ArticleController::class, 'create']);
Route::post('/article/add', [ArticleController::class, 'store']);
Route::get('/article/{id}/edit', [ArticleController::class, 'edit']);
Route::put('/article/{id}/edit', [ArticleController::class, 'update']);

//change to put
Route::get('/article/{id}/publish', [ArticleController::class, 'publish']);
Route::get('/add', [ArticleController::class, 'create']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/dashboard'], function() {
    Route::get('/', function() {
      return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
});
