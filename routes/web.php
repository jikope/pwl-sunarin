<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LatestController;
use App\Http\Controllers\ContributorController;
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
Route::post('/contributor/news/add', [ContributorController::class, 'store']);
Route::get('/contributor/news/{id}/edit', [ContributorController::class, 'edit']);
Route::put('/contributor/news/{id}/edit', [ArticleController::class, 'update']);
Route::get('/contributor/news/draft', [ContributorController::class, 'draft'])->name('draft.index');
Route::get('/contributor/news/published', [ContributorController::class, 'published'])->name('published.index');
Route::get('/contributor/news/complete', [ContributorController::class, 'complete'])->name('complete.index');
Route::get('/contributor/news/add', [ContributorController::class, 'create'])->name('draft.add');

Route::get('/contributor/news/{id}/complete', [ContributorController::class, 'setcomplete']);
Route::delete('/contributor/news/draft/{id}/delete', [ContributorController::class, 'destroy']);

//editor
Route::get('/editor/news/{id}/publish', [EditorController::class, 'setpublish']);
Route::get('/editor/news/{id}/publish', [ArticleController::class, 'setpublish']);
Route::get('/editor/news/{id}/draft', [ArticleController::class, 'setdraft']);
//if editor send decline message
Route::get('/article/{id}/delete', [ArticleController::class, 'delete']);
//Route::get('/add', [ArticleController::class, 'create']);


//user biasa
Route::get('/', [GuestController::class, 'index']);
Route::get('/latest/{id}', [LatestController::class, 'insert'])->name('add.latest');
Route::get('/{id}/show',[ArticleController::class, 'show'])->name('display.article');
//kapan leh update


//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/dashboard'], function() {
    Route::get('/', function() {
      return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
});

Auth::routes();
