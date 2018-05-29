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

/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
<<<<<<< HEAD
Route::get('/create', 'postsController@create');
Route::get('/show', 'PostsController@show');
Route::get('/profile', 'PostsController@suprimer');
=======
Route::get('/show', 'PostsController@show'); 
Route::get('/posts/delete/{id}', 'PostsController@destroy');
>>>>>>> 89fd093ab9ca0914962a66af26a3d783a6195326
Route::get('/profile', 'usersController@index');

Route::resource('pages','pagesController');
Route::resource('posts','postsController');
Route::resource('users','usersController');
Route::resource('comments','commentsController');
Route::resource('likes','likesController');



Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
