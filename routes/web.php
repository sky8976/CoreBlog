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

Route::get('/', 'PostsController@index')->name('index');
Route::get('sitemap.xml', 'PagesController@sitemap')->name('sitemap');
Route::get('rss.xml', 'PagesController@rss')->name('rss');


Route::get('upload', 'FilesController@index')->name('upload.index');
Route::post('upload', 'FilesController@store')->name('upload.store');
Route::delete('upload', 'FilesController@destroy')->name('upload.destroy');

Route::resource('post','PostsController');


Route::get('/at','UsersController@at')->name('users.at');

Route::get('/user/{user}', 'UsersController@show')->name('user.show');
Route::get('/user/{user}/edit', 'UsersController@edit')->name('user.edit');
Route::put('/user/{user}/edit', 'UsersController@update')->name('user.update');

Route::match(['get', 'put'], '/user/{user}/avatar', 'UsersController@avatar')->name('user.avatar');
Route::match(['get', 'put'], '/user/{user}/password', 'UsersController@password')->name('user.password');

Route::get('/tag/{tag}', 'TagsController@show')->name('tag.show'); //标签聚合
Route::get('/tags', 'TagsController@index')->name('tags'); //标签云

Route::get('/category/{category}', 'CategorysController@show')->name('category.show'); //分类目录


Route::get('/search/{keyword}', 'PagesController@search')->name('search'); //搜索页面

Auth::routes(['verify' => true]);


Route::resource('comment','CommentsController',['only'=>['store','destroy']])->middleware('auth');


