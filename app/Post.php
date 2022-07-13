<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];


    public static function slugGenerator($titolo)
    {
        $slug = Str::slug($titolo, '-');
        $standard_slug = $slug;
        $get_slug = Post::where('slug', $slug)->first();
        $i = 0;

        while ($get_slug) {
            $slug = $standard_slug . '-' . $i;
            $i++;
            $get_slug = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}