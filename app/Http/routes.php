<?php

$router->controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// get('article', 'ArticleController@index');
// get('article/create', 'ArticleController@create');
// get('article/{id}', 'ArticleController@show');
// post('article', 'ArticleController@store');
// get('article/{id}/edit', 'ArticleController@edit');
resource('article', 'ArticleController');

get('/', 'HomeController@index');

//Route::get() became $router->get() became get()
//Route::post became router->post became post()
//Route::resource() became $router->resource() became resource()