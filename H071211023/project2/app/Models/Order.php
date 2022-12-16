<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'food_id',
        'address',
        'quantity',
        'total_price',
        'note',
    ];

    // Cardinality from Order to User: one-to-one
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cardinality from Order to Food: one-to-one
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
