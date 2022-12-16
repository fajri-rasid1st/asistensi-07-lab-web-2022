<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    // Cardinality from Category to Food: one-to-many
    public function foods()
    {
        return $this->hasMany(Food::class);
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
