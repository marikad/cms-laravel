<?php

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

// use \App\Http\Middleware\Admin;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('post/{id}', 'AdminPostsController@post')->name('home.post');

Route::get('admin', function(){

	return view('admin.index');
})->name('admin.home'); 

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {

	Route::resource('users', 'AdminUsersController');
	Route::resource('posts', 'AdminPostsController');
	Route::resource('categories', 'AdminCategoriesController');
	Route::resource('media', 'AdminMediasController');
	Route::resource('comments', 'PostCommentsController');
	Route::resource('comment/replies', 'CommentRepliesController');
		Route::post('comemnt/reply', 'CommentRepliesController@createReply');
});




