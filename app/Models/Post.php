<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class,'cat_posts')->withTimestamps();
    }
}
