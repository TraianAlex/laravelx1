<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class NavigationComposer{
	
	/**
	* bulding a repository class with readeble methods
	*/
	// public function __construct(ArticlesRepository $articles)
	// {

	// }

	public function compose(View $view)//or only $view
	{
		$view->with('latest', \App\Article::latest()->first());
	}
}