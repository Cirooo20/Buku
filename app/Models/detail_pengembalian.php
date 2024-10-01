<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pengembalian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function returned()
    {
        return $this->belongsTo(Returned::class, 'id_pengembalian', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'kode_buku', 'kode_buku');
    }
}
