<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = ['id'];
    protected $cast = [
        'created_at'=>'datetime',
    ];


    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d M Y');
    }

    public function users() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function likedBy() {
        return $this->belongsToMany(User::class, 'post_user_likes')->withTimestamps();
    }
}
