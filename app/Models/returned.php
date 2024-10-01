<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class returned extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detailPengembalian()
    {
        return $this->hasMany(detail_pengembalian::class, 'id_pengembalian', 'id');
    }

    public function borrowing()
    {
        return $this->belongsTo(borrowing::class, 'id_peminjaman', 'id');
    }
}
