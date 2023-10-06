<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function viewers()
    {
        return self::belongsToMany(User::class, 'user_blog_seen', 'blog_id', 'user_id')
            ->withTimestamps();
    }
}
