<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_kelas';
    
    protected $keyType = 'string';

    public function Students()
    {
        return $this->hasMany(Students::class, 'kode_kelas', 'kode_kelas');
    }
}
