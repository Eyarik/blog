<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foodlist extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class,'food_posts')->withTimestamps();
    }
    public function category()
    {
        return $this->belongsToMany(Category::class,'cat_lists')->withTimestamps();
    }
    
    
}
