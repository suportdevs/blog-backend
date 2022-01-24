<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'title',
        'excerpt',
        'featured_image',
        'description',

    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function postUpdatedBy()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(600);
    }

}
