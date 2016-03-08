<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Article;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;//rollback database after test phpunit
    /**
     * A basic functional test example.
     *
     * @return void
     */
    // public function testBasicExample()
    // {
    //     $this->visit('/')
    //          ->see('Laravel 5');
    // }

    // public function testBasicExample()
    // {
    //     $this->visit('/')
    //          ->type('some query', '#search')
    //          ->press('Search')
    //          ->see('Search results for "some query"');
    //          //->onPage('/search-results');
    // }

    // public function testBasicExample()
    // {
    //     $article = factory(Article::class)->create();
    //     $this->visit('article')
    //           ->see($article->title);
    // }

    public function testBasicExample()
    {
        // $this->visit('admin')
        //       ->seePageIs('/');

        $traian = factory('App\User')->create(['name' => 'traian']);
        $this->actingAs($traian)
             ->visit('admin')
             //->seePageIs('admin');
             ->see('This page has been seen only by admins');
    }
}