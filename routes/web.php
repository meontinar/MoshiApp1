<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
Route::get('/', function (){
   return redirect() ->route('posts.index');
});
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);

Route::get('posts/category/{category}', [PostController::class, 'postsByCategory'])->name('posts.category');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
