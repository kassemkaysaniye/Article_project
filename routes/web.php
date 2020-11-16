<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articles/add',
 [App\Http\Controllers\ArticleController::class, 'show'])->name('add.article');

 Route::post('/articles/store',
 [App\Http\Controllers\ArticleController::class, 'store'])->name('store.article');

 Route::post('/home/delete',
 [App\Http\Controllers\ArticleController::class, 'delete'])->name('delete.article');

 Route::post('/home/edit',
 [App\Http\Controllers\ArticleController::class, 'edit'])->name('edit.article');

  Route::put('/home/update',
  [App\Http\Controllers\ArticleController::class, 'update'])->name('update.article');

 Route::post('/home/comment',
 [App\Http\Controllers\CommentController::class, 'store'])->name('comment.home');


 Route::post('/home/like',
 [App\Http\Controllers\LikeController::class, 'like'])->name('like.article');

 Route::post('/home/dislike',
 [App\Http\Controllers\LikeController::class, 'dislike'])->name('dislike.article');


