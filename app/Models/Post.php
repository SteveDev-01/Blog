<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'image', 'created_by', 'category'];

    public function categoryData()
    {
        return $this->belongsTo(Category::class, 'category');
    }
    public function userData()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
