<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_follows_Category extends Model
{
    use HasFactory;

    protected $table = 'user_follows_category';
    protected $fillable = [
        'user_id',
        'category_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
