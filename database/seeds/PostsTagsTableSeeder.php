<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $tag_id = Tag::inRandomOrder()->first()->id;
            $post->tags()->attach($tag_id);
        }
    }
}