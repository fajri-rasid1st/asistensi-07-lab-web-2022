<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $fillable = [
        "name", "description", "status"
    ];

    public function seller() {
        return $this->belongsToMany(Seller::class, 'seller_permissions', 'permission_id', 'seller_id');
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
