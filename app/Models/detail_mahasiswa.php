<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'detail_mahasiswa';
    protected $fillable = [
        'nama', 
        'nim',
        'alamat'
    ];
}
