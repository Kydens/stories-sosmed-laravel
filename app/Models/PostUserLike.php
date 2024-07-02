<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLike extends Model
{
    use HasFactory;
    protected $table = 'post_user_likes';
    protected $guarded = ['id'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts() {
        return $this->belongsTo(Posts::class, 'posts_id');
    }
}
