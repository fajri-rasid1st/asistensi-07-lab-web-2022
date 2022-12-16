<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'user_id',
        'food_id',
    ];

    // Cardinality from Favorite to User: one-to-one
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cardinality from Favorite to Food: one-to-one
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
