<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\PostController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\user\ReactionController;

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

Route::get('images/{filename?}',function($filename){
    return response()->file(public_path().'/image/'.$filename);
})->name('image_show');

Route::group(['middleware'=>'auth'],function () {
    Route::group(['middleware'=>'auth'],function () {
        Route::resource('posts',PostController::class);
        Route::resource('comments', App\http\Controllers\user\CommentController::class);
        Route::resource('reactions', App\http\Controllers\user\ReactionController::class);
       
        Route::get('my_posts',[PostController::class,'my_posts'])->name('posts.my_posts');
      
    });
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
