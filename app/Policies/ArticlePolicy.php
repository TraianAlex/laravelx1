<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Article;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    public function edit(User $user, Article $article)
    {
        //return $user->id == $article->user_id;
        return $user->owns($article);
    }

    public function store()
    {

    }
}
