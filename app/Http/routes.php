<?php

get('foo', 'TestController@foo');//repository
get('users', 'TestController@users');//injection
get('admin', 'TestController@admin');//check middleware

get('broadcast', 'TestController@broadcast');//event
//event('App\Events\UserHasRegistered', $user);
//event(new App\Events\UserHasRegistered);

/*-------------------------------------------------------------------------*/

// $router->bind('songs', function($slug)
// {
// 	return App\Song::whereSlug($slug)->first();//App\Song::where('slug', $slug)->first()
// });

resource('songs', 'SongsController', [
	'names' => ['index' => 'songs_path',
				 'show' => 'song_path'
	 ]//,'only' => ['index', 'show'] //'except' => ['create']
]);
//we can change the name of songs with music
// get('songs', ['as' => 'songs_path', 'uses' => 'SongsController@index']);
// get('songs/{songs}', ['as' => 'song_path', 'uses' => 'SongsController@show']);
// get('songs/{songs}/edit', ['as' => 'son_path', 'uses' => 'SongsController@edit']);
// patch('songs/{songs}', ['as' => 'so_path', 'uses' => 'SongsController@update']);

/*------------------------------------------------------------------------------*/

$router->controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

get('tags/{tags}', 'TagsController@show');
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

//get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']);

post('search-results', function()
{
	return sprintf('Search results for "%s"', Request::input('search'));
});

Route::group(['prefix' => 'admin', 'as' => 'Admin.'], function(){
	Route::get('xxxx', ['as' => 'xxxx'], function(){
		return 'some view';
	});
});
//dd(route('Admin.xxxx'));