<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'parent_id',
    ];

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
