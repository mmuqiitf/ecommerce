<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->hasOne(PostCategory::class);
    }
}
