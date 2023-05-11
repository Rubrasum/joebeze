<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; // allows all mass assigned but can be used to

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
