<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'likes',
        'title',
        'content',
        'user_id',
        'slug'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
