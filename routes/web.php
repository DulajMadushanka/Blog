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
})->name('home');

Auth::routes();

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');
   

});

Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
});

Route::post('/editTag/{id}','TagController@update');

Route::get('/edit/{id}','TagController@edit');

Route::get('/deleteTag/{id}','TagController@delete');

Route::post('/editCategory/{id}','CategoryController@update');

Route::get('/editcate/{id}','CategoryController@edit');

Route::get('/deleteCategory/{id}','CategoryController@delete');

Route::post('/image','ImageController@image');


Route::get('/images','ImageController@images');

Route::post('/editCategory/{id}','CategoryController@update');

Route::get('/editpost/{id}','PostController@editPost');

Route::get('/deleteCategory/{id}','CategoryController@delete');

Route::post('/updatepost/{id}','PostController@updatePost');

Route::get('/deletepost/{id}','PostController@deletePost');






