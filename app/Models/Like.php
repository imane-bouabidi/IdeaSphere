<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table= 'likes';
    protected $fillable = ['user_id', 'post_id', 'liked'];

    public function post()
    {
        return $this->belongsTo(Idee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
