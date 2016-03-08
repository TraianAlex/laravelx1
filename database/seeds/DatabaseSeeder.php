<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call(UserTableSeeder::class);
        User::truncate();
        Article::truncate();

        //factory(User::class, 10)->create();
        //factory(Article::class, 10)->create();

        Model::reguard();
    }
}