<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'sellers';
    protected $fillable = [
        "name", "address", "gender", "no_hp", "status"
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'seller_id', 'id');
    }
    
    public function permission() {
        return $this->belongsToMany(Permission::class, 'seller_permissions', 'seller_id', 'permission_id');
    }

    public function getCreatedAtAttributeb ($value) {
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