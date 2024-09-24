<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $primaryKey = 'nis';

    public $incrementing = false;
    
    protected $keyType = 'string';
    
    public $timestamps = false;
    
    protected $table = 'students';
    
    protected $guarded = [];

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class, 'kode_kelas', 'kode_kelas');
    }
}
