<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = 'categories';
    protected $guarded = [];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
}
