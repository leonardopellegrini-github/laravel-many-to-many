<?php

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
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTagsTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(UpdatePostsSeeder::class);
    }
}
