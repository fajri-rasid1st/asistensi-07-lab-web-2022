<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerPermission extends Model
{
    use HasFactory;

    protected $table = "seller_permissions";
    
    protected $fillable = [
        "seller_id", "permission_id"
    ];

    public $timestamps = false;
}
