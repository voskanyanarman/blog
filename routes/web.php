<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    // returns a page that shows a full post
    Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
    // returns a homepage with all posts
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', CommentController::class .'@destroy')->name('comment.destroy');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        
        // returns the form for adding a post
        Route::get('/posts/create', PostController::class . '@create')->name('posts.create');
        // adds a post to the database
        Route::post('/posts', PostController::class .'@store')->name('posts.store');
        
        // returns the form for editing a post
        Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
        // updates a post
        Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
        // deletes a post
        Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');

        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

