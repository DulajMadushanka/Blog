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

Route::get('/','HomeController@index')->name('home');


Auth::routes();

Route::post('subscriber','SubscriberController@store')->name('subscriber.store');

Route::get('post/{slug}','SinglepageController@details')->name('post.details');

Route::group(['middleware'=>['auth']],function(){
    Route::post('favourite/{post}/add','FavouriteController@add')->name('post.favourite');
    Route::post('comment/{post}','CommentController@store')->name('comment.store');
});

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('settings','SettingsController@index')->name('settings');
    Route::post('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::post('password-update','SettingsController@updatePassword')->name('password.update');
    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');

    Route::get('/pending/post','PostController@pending')->name('post.pending');
    Route::get('/subscribers','SubscriberController@index')->name('subscriber.index');
    Route::get('/favourite','FavouriteController@index')->name('favourite.index');
   
   
 
   

});

Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('settings','SettingsController@index')->name('settings');
    Route::post('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::post('password-update','SettingsController@updatePassword')->name('password.update');
    Route::resource('post','PostController');
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

Route::get('/showpost/{id}','PostShowController@showPost');

Route::post('/approval/{id}','PostController@approval');

Route::post('/deleteSubscriber/{id}','Admin\SubscriberController@destroy')->name('subscriber.destroy');

//author  
Route::get('/a_editpost/{id}','A_postController@editPost');
Route::get('/a_deletepost/{id}','A_postController@deletePost');
Route::post('/a_updatepost/{id}','A_postController@updatePost');
Route::get('/a_showpost/{id}','A_showpostController@showPost');






