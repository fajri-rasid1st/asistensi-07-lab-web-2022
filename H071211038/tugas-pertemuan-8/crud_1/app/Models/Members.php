<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "nama", "akun_fb", "email", "regional", "tahun"
    ];
}
