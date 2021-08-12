<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(User::class)->count(10)->create()

            ->each(function ($user) {
                $user->posts()->save(Post::factory(Post::class)->make());
            }); //pull out user and create instance and access relationship and access methoad to save database
    }
}
