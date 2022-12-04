<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        "name", "status"
    ];

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
