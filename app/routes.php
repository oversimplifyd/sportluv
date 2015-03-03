<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'index', 'uses' => 'PostsController@getIndex'));

Route::get('/view_post/{id}', array('as' => 'view_post', 'uses' => 'PostsController@viewPost'));

/*
Route::post('/create_post', array('as' => 'create_post', 'uses' => 'PostsController@createPost'));*/

/*Route::get('/add_post', array('as' => 'add_post','uses' => 'PostsController@addPost'));

Route::get('/find_post/{tag}', array('as' => 'find_post', 'uses' => 'PostsController@findPost'));

Route::get('/signup', array('as' => 'signup', 'uses' => 'UsersController@getSignup'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@getLogout'));

Route::post('/post_comment/{id}', array('as' => 'post_comment', 'uses' => 'CommentsController@postComment'));

Route::post('/post_login', array('as' => 'post_login', 'uses' => 'UsersController@postLogin'));

Route::post('/post_signup', array('as' => 'post_signup', 'uses' => 'UsersController@postSignup'));*/

// ADMIN ROUTE
Route::get('/admin', array('as' => 'admin_login', 'uses' => 'UsersController@getAdminLogin'));

Route::get('/admin/home', array('as' => 'admin_home', /*'before' => 'guest.admin',*/'uses' => 'UsersController@getAdminIndex'));

Route::get('/admin/logout', array('as' => 'admin_logout', 'uses' => 'UsersController@getAdminLogout'));

Route::get('/admin/view_posts/{date_range?}', array('as' => 'admin_view_posts', 'uses' => 'PostsController@adminViewPosts'));

Route::get('/admin/view_post/{id}', array('as' => 'admin_view_post', 'uses' => 'PostsController@adminViewPost'));

Route::get('/admin/add_post', array('as' => 'admin_add_post', /*'before' => 'auth',*/ 'uses' => 'PostsController@adminAddPost'));

Route::get('/admin/delete_post/{id}', array('as' => 'admin_delete_post', 'uses' => 'PostsController@adminDeletePost'));

Route::get('/admin/edit_post/{id}', array('as' => 'admin_edit_post', 'uses' => 'PostsController@adminEditPost'));

Route::get('/admin/update_view', array('as' => 'admin_update_view', 'uses' => 'PostsController@updateView'));

Route::post('/admin/post_login', array('as' => 'post_admin_login', 'uses' => 'UsersController@postAdminLogin'));

Route::post('/admin/create_post', array('as' => 'admin_create_post', 'uses' => 'PostsController@adminCreatePost'));

Route::post('/admin/update_post/{id}', array('as' => 'admin_update_post', 'uses' => 'PostsController@adminUpdatePost'));

Route::post('/admin/find_post', array('as' => 'admin_find_post', 'uses' => 'PostsController@adminFindPost'));

/*Route::get('/limit/{id}', array('as' => 'limit', 'uses' => 'PostsController@limitString'));*/