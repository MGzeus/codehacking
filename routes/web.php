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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// USERS ROUTE
// Route::group(['middleware' => 'admin'], function () {
Route::resource('/admin/users', 'AdminUsersController');
Route::get('/admin/users', 'AdminUsersController@index')->name('admin.users.index');
Route::get('/admin/users/create', 'AdminUsersController@create')->name('admin.users.create');
Route::get('/admin/users/{user}/edit', 'AdminUsersController@edit')->name('admin.users.edit');


// });
// POSTS ROUTE
Route::resource('/admin/posts', 'AdminPostsController');
Route::get('/admin/posts', 'AdminPostsController@index')->name('admin.posts.index');
Route::get('/admin/posts/create', 'AdminPostsController@create')->name('admin.posts.create');
Route::get('/admin/posts/{posts}/edit', 'AdminPostsController@edit')->name('admin.posts.edit');


// CATEGORIES ROUTE
Route::resource('/admin/categories', 'AdminCategoriesController');
Route::get('/admin/categories', 'AdminCategoriesController@index')->name('admin.categories.index');
Route::get('/admin/categories/{categories}/edit', 'AdminCategoriesController@edit')->name('admin.categories.edit');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
