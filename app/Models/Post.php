<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_url',
        'user_id'
    ];
        
    /**
     * Get the user that owns the Post
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
    