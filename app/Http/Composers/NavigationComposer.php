<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class NavigationComposer{
	
	// public function __construct(ArticlesRepository $articles)
	// {

	// }

	public function compose(View $view)
	{
		$view->with('latest', \App\Article::latest()->first());
	}
}