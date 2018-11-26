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

Route::group(['middlewire'=>['web']], function(){

    Route::get('/', 'PagesController@getIndex');
    Route::get('/kapcsolat', 'PagesController@getContact');
    Route::post('/kapcsolat','PagesController@postContact');

    Route::get('hirek/{slug}', ['as'=>'post.single', 'uses'=>'PostController@getSingle']);

    Route::resource('news', 'NewsController');
    Route::resource('tags','TagController',['except'=>['create']]);
    Route::post('comments/{news_id}', ['uses' => 'CommentsController@store', 'as'=>'comments.store']);
    Route::delete('comments/{id}',['uses'=>'CommentsController@destroy', 'as' => 'comments.destroy']);
    Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete', 'as'=>'comments.delete']);

    Route::resource('projects', 'ProjectsController');
    

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
