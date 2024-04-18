<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_follows_Tag extends Model
{
    use HasFactory;

    protected $table = 'user_follows_Tag';
    protected $fillable = [
        'user_id',
        'tag_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
