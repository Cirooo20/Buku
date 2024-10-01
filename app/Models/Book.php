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

    public function detailPeminjaman()
    {
        return $this->hasMany(detail_peminjaman::class, 'kode_buku', 'kode_buku');
    }

    public function detailPengembalian()
    {
        return $this->hasMany(detail_pengembalian::class, 'kode_buku', 'kode_buku');
    }
}
