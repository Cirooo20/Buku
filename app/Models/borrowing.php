<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detailPeminjaman()
    {
        return $this->hasMany(detail_peminjaman::class, 'id_peminjaman', 'id');
    }

    public function returned()
    {
        return $this->hasOne(returned::class, 'id_peminjaman', 'id');
    }
}
