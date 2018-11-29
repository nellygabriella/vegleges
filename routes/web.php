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

    Route::get('hirek/{slug}', ['as'=>'post.newssingle', 'uses'=>'PostController@getNewsSingle']);
    Route::get('hirek', ['uses' => 'PostController@getNewsIndex', 'as' => 'post.newsindex']);

    Route::get('forum/{slug}', ['as'=>'post.forumsingle', 'uses'=>'PostController@getQuestionSingle']);
    Route::get('forum', ['uses' => 'PostController@getQuestionIndex', 'as' => 'post.forumindex']);

    Route::get('jegyzetek/{slug}', ['as'=>'post.notessingle', 'uses'=>'PostController@getNotesSingle']);

    Route::get('projektek', ['uses' => 'PostController@getProjectsIndex', 'as' => 'post.projectsindex']);
    Route::get('projektek/{slug}', ['as'=>'post.projectsingle', 'uses'=>'PostController@getProjectSingle']);

    Route::get('allas', ['uses' => 'PostController@getJobsIndex', 'as' => 'post.jobsindex']);
    Route::get('allas/{slug}', ['as'=>'post.jobsingle', 'uses'=>'PostController@getJobSingle']);
    

    /*Route::get('/{question_id}', function($question_id){
 
        return view('post.forumsingle',['question_id' => $question_id]);
      
    });*/
    
    
    Route::get('comments/{slug_id}', 'CommentsController@index');
    
    Route::post('comments', 'CommentsController@store');
    
    Route::post('comments/{slug_id}/{type}', 'CommentsController@update');

    Route::resource('news', 'NewsController');
    Route::resource('tags','TagController',['except'=>['create']]);
    
    Route::resource('projects', 'ProjectsController');

    Route::resource('jobs', 'JobsController');
    
    Route::resource('notes','NotesController');
    Route::get('notes/get_file/{filename}', [
        'as' => 'getfile', 'uses' => 'NotesController@get_file']);

    Route::resource('questions', 'QuestionsController');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
