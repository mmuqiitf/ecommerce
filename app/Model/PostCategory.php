<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_categories';
    protected $guarded = [];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
