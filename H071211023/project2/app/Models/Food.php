<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory, Sluggable;
    

    protected $table = 'foods';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'excerpt',
        'description',
        'price',
        'category_id',
        'tag_id',
    ];

    // Cardinality from Food to Category: one-to-one
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Cardinality from Food to Tag: one-to-many
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
