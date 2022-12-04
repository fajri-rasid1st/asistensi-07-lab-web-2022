<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        "name", "seller_id", "category_id", "price", "status"
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class, "seller_id", "id");
    }

    public function category()
    {
        return $this->hasOne(Category::class, "product_id", "id");
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::createFromTimestamp(strtotime($value))->timezone('Asia/Singapore')
        ->toDateTimeString();
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::createFromTimestamp(strtotime($value))->timezone('Asia/Singapore')
        ->toDateTimeString();
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtolower($value);
    }
}