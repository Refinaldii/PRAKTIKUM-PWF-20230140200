<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Todo extends Model
{
    protected $fillable = ['title', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}