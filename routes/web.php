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
Auth::routes();

//Main Page Routes
Route::get('/', function () {
    return view('welcome');
});

//Routes To Register
Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('register', 'UsersController@signup_store')->name('signup.store');

//Routes To Login & Logout
Route::get('login', 'SessionsController@login')->name('login');
Route::get('logout', 'SessionsController@logout')->name('logout');
Route::post('login', 'SessionsController@loginStore')->name('login.store');

//Dummy
Route::get('/home', 'HomeController@index');
Route::get('/test', function(){ return view('new');});

//Routes To Articles
Route::resource('/articles', 'ArticlesController');
Route::resource('/comments', 'CommentsController');

//Routes To Manage Image
Route::post('/add-images/{id}', 'ImagesController@addImage')->name('add');
Route::put('/change-images/{id}', 'ImagesController@changeImage')->name('change');
Route::delete('/delete-images/{id}', 'ImagesController@deleteImage')->name('delete');