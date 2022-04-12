<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;

class Article extends Model {
    protected $table='articles';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function featured()
    {
        if ($this->featured == 1)
        {
            return "Yes";
        }
        return "No";
    }
}
