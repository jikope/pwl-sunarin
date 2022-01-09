<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LatestController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContributorController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EmailController;

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
//super user
Route::get('/admin/users', [SuperController::class, 'users'])->name('super.users');
Route::get('/admin/contributors', [SuperController::class, 'contributors'])->name('super.contributors');
Route::get('/admin/editors', [SuperController::class, 'editors'])->name('super.editors');
Route::get('/admin/editor/add', [SuperController::class, 'addeditors'])->name('super.contributors');
Route::post('/admin/editor/add', [SuperController::class, 'storeeditors']);

//contributor
Route::post('/contributor/news/add', [ContributorController::class, 'store'])->name('contributor.add');
Route::get('/contributor/news/{id}/edit', [ContributorController::class, 'edit'])->name('contributor.draft.edit');
Route::put('/contributor/news/{id}/edit', [ArticleController::class, 'update']);
Route::get('/contributor/news/draft', [ContributorController::class, 'draft'])->name('contributor.draft.index');
Route::get('/contributor/news/published', [ContributorController::class, 'published'])->name('contributor.published.index');
Route::get('/contributor/news/complete', [ContributorController::class, 'complete'])->name('contributor.complete.index');
Route::get('/contributor/news/add', [ContributorController::class, 'create'])->name('draft.add');

Route::get('/contributor/news/{id}/complete', [ContributorController::class, 'setcomplete']);
Route::delete('/contributor/news/draft/{id}/delete', [ContributorController::class, 'destroy']);

//editor
Route::get('/editor/proposals', [EditorController::class, 'proposals'])->name('proposal.index');
Route::get('/editor/proposals/{id}', [EditorController::class, 'show'])->name('proposal.show');
Route::post('/editor/proposals/action', [EditorController::class, 'action'])->name('proposal.action');
Route::get('/editor/published', [EditorController::class, 'getPublished'])->name('editor.published');

Route::get('/editor/news/{id}/publish', [EditorController::class, 'setpublish']);
Route::get('/editor/news/{id}/publish', [ArticleController::class, 'setpublish']);
Route::get('/editor/news/{id}/draft', [ArticleController::class, 'setdraft']);
Route::get('/editor/contributor-request', [EditorController::class, 'contributorrequest'])->name('editor.contributor-request');
Route::get('/editor/contributor-request/{id}/view', [EditorController::class, 'contributorrequest'])->name('contributor-request.show');
Route::post('/editor/contributor-upgrade', [EditorController::class, 'contributorupgrade']);

//if editor send decline message
Route::get('/article/{id}/delete', [ArticleController::class, 'delete']);
//Route::get('/add', [ArticleController::class, 'create']);

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');


//user biasa
Route::get('/', [GuestController::class, 'index']);
Route::get('/berita', [GuestController::class, 'berita']);
Route::get('/suggest', [GuestController::class, 'getSugesstion']);
Route::get('/latest/{id}', [LatestController::class, 'insert'])->name('add.latest');
Route::get('/{id}/show',[GuestController::class, 'show'])->name('display.article');
Route::get('/category/{category}', [GuestController::class, 'getbyCategory']);
Route::get('/search', [GuestController::class, 'search']);
Route::get('/kategori', [GuestController::class, 'kategori']);


Route::group(['prefix' => '/dashboard'], function() {
    Route::get('/', function() {
      return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
});

Auth::routes(['verify'=>true]);

//register contributor

//
Route::get('/notif', [NotificationController::class, 'index']);
Route::get('/notification', [NotificationController::class, 'fetch']);
Route::get('/notification/count', [NotificationController::class, 'counter']);
Route::get('/notification/{id}/read', [NotificationController::class, 'setRead']);


//email send
Route::get('/send/mail', [EmailController::class, 'index']);
//vue helper
Route::get('/categories', [GuestController::class, 'fetchCategory']);
Route::get('/news', [GuestController::class, 'fetchNews']);