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

Route::get( '/', 'FrontendController@index' )->name( 'frontend.index' );
Route::get( '/video/details/{id}', 'FrontendController@detailsVideo' )->name( 'video.details' );
Route::get( '/post/details/{id}', 'FrontendController@detailsPost' )->name( 'post.details' );

Auth::routes();

Route::get( '/home', 'HomeController@index' )->name( 'home' );

Route::group( ['middleware' => 'auth'], function () {
    Route::get( '/post/view', 'PostController@index' )->name( 'view.post' );
    Route::get( '/post/create', 'PostController@create' )->name( 'create.post' );
    Route::post( '/post/create', 'PostController@store' )->name( 'create.post' );
    Route::get( '/post/publish/{id}', 'PostController@publishPost' )->name( 'publish.post' );
    Route::get( '/post/unpublish/{id}', 'PostController@unpublishPost' )->name( 'unpublish.post' );
    Route::get( '/post/delete/{id}', 'PostController@deletePost' )->name( 'delete.post' );

    Route::get( '/video/view', 'VideoController@index' )->name( 'view.video' );
    Route::get( '/video/create', 'VideoController@create' )->name( 'create.video' );
    Route::post( '/video/create', 'VideoController@store' )->name( 'create.video' );
    Route::get( '/video/publish/{id}', 'VideoController@publishPostVideo' )->name( 'publish.video' );
    Route::get( '/video/unpublish/{id}', 'VideoController@unpublishPostVideo' )->name( 'unpublish.video' );
    Route::get( '/video/delete/{id}', 'VideoController@deleteVideo' )->name( 'delete.video' );
} );
