<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory; // SoftDeletes;

    protected $fillable = [
        'user_id', // User yoq ligi uchun
        'title',
        'short_content',
        'content',
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()  //: HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
