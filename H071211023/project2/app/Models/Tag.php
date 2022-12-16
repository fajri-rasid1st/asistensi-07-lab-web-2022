<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug',
    ];

    // Cardinality from Tag to Food: one-to-many
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
