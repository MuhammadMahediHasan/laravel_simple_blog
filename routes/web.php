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

Route::resource('/','FrontentController');

Route::group(['middleware'=>'auth'],function(){

		Route::resource('/backend','BackendController')->middleware('auth');
		Route::resource('/category','CategoryController');
		Route::resource('/sub_category','SubCategoryController');
		Route::resource('/post','PostController');
		Route::resource('/setup','SetupController');

});


Route::resource('/comment','CommentsController');

//Route::resource('/backend','BackendController')->middleware('auth')

Route::get('/category_data/{data}','FrontentController@category_data');

Route::get('/frontend_description/{id}','FrontentController@frontend_description');
Route::get('post_like/{id}','FrontentController@post_likes');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::post('/search','FrontentController@store');