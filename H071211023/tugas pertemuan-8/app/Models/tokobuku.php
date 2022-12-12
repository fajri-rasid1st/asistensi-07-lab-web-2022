<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokobuku extends Model
{
    use HasFactory;
    protected  $table = "tokobukus" ;
    protected $fillable  = ['judul', 'penerbit', 'genre', 'pengarang', 'isbnbuku', 'harga'];
}
