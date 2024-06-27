<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = []; // allows all mass assigned but can be used to

    protected $with = []; // More efficient sql

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
