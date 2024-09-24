<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_peminjaman extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class, 'id_peminjaman', 'id');
    }
}
