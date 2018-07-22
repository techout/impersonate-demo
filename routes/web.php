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
Route::get('/blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');

Route::get('/about', 'PagesController@getAbout');
// Route::get('/blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('/blog', 'BlogController@getIndex')->name('blog.index');

Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

Route::get('/', 'PagesController@getIndex');

Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Route::resource('comments', 'CommentController');
Route::post('comments/{post_id}', 'CommentController@store')->name('comments.store');
Route::get('comments/{id}/edit', 'CommentController@edit')->name('comments.edit');
Route::put('comments/{id}', 'CommentController@update')->name('comments.update');
Route::delete('comments/{id}', 'CommentController@destroy')->name('comments.destroy');
Route::get('comments/{id}/delete', 'CommentController@delete')->name('comments.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'impersonate'], function(){
    Route::impersonate();
});

Route::resource('cards', 'CardController', ['except' => ['show']]);
Route::resource('users', 'UserController');


Route::get('/api/users', function(){
    return App\User::allImpersonatable();
});

Route::get('/api/getRecentImpersonates', function(){
    return App\Impersonate::recentImpersonates();
});
