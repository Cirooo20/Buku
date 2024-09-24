<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_buku';

    protected $keyType = 'string';
    
    public $incrementing = false;
    
    protected $guarded = []; 

    protected $table = "books";

}
