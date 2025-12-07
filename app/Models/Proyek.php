<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $fillable = [
        'judul', 
        'deskripsi', 
        'mahasiswa_id', 
        'dosen_id',
        'dokumen', 
        'status'
    ];

    // Proyek dimiliki oleh satu mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    // Proyek dibimbing oleh satu dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
