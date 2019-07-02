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

Route::get('/migrate',function(){
    return 'Migration has been doing';
});

Route::get('/CreateTime', 'MoodlesController@showCreateTime');

Route::get('/save/{name}/{phone}', 'MoodlesController@store');


Route::get('/update{id}', 'MoodlesController@update');

Route::get('/delete{id}', 'MoodlesController@delete');

Route::get('/update', 'MoodlesController@updateAll');

Route::get('/forceDelete{id}', 'MoodlesController@forceDelete');

Route::get('/restore{id}', 'MoodlesController@restore');

Route::get('/showNames', 'MoodlesController@showNames');

Route::get('/searchPhone/{name}', 'MoodlesController@searchPhone');

Route::get('/chunkProcess', 'MoodlesController@chunkChunk');

Route::get('/karbar/{name}', 'karbarsController@store');

Route::get('/show/karbars', 'karbarsController@show');

Route::get('/delete/karbar/{name}', 'karbarsController@deleteKarbar');

Route::get('/forceDelete/karbar/{name}', 'karbarsController@forceDeleteKarbar');

Route::get('/karbar/{name}/add/post/{namePost}/{captionPost}' , 'karbarsController@addPost');

Route::get('/show/posts' , 'postsController@show');

Route::get('/delete/post/{name}', 'postsController@deletePost');

Route::get('/forceDelete/post/{name}', 'postsController@forceDeletePost');

Route::get('/dissociate/post/{namePost}', 'postsController@dissociate');

Route::get('/associate/karbar/{name}/post/{namePost}', 'postsController@associate');

Route::get('/form/create',function (){
    return view('formName');
});

Route::post('/form/post','postsController@store');

Route::get('/form/error',function (){
    return view('error');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
