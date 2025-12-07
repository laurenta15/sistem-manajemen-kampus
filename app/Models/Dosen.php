<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nama', 'nip', 'email', 'bidang_keahlian'];

    // Dosen membimbing banyak proyek
    public function proyeks()
    {
        return $this->hasMany(Proyek::class);
    }
}