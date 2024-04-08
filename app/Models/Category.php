<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nom'
    ];

    public function idees()
    {
        return $this->hasMany(Idee::class);
    }
}
