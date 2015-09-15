<?php

Route::get('about', 'PagesController@about');

Route::get('contact', 'PagesController@contact');

Route::get('/', 'ArticlesController@index');

Route::get('articles/unpublished', "ArticlesController@unpublished");
Route::get('articles/deleted', "ArticlesController@deleted");
Route::patch('articles/restore/{trashed_articles}', "ArticlesController@restore");
Route::resource('articles', 'ArticlesController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('foo', ['middleware' => 'manager', function () 
{
	return 'this page may only be viewed by managers';
}]);

/*
Route::get('articles', "ArticlesController@index");

Route::get('articles/create', "ArticlesController@create");

Route::get('articles/{id}', "ArticlesController@show");

Route::post('articles', 'ArticlesController@store');*/