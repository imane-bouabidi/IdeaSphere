<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = [
        'Name',
    ];

    public function idees()
    {
        return $this->belongsToMany(Idee::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follows_tag');
    }
}
