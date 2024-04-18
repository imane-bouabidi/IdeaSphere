<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'user_id',
        'idee_id',
        'replay_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function idee()
    {
        return $this->belongsTo(Idee::class);
    }

    public function replay()
    {
        return $this->belongsTo(self::class, 'replay_id');
    }

    public function replies()
    {
        return $this->hasMany(self::class, 'replay_id');
    }
}
