<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputAspirasi extends Model
{
    protected $table = 'input_aspirasi';

    protected $fillable = [
        'nis',
        'id_kategori',
        'lokasi',
        'foto',
        'ket',
    ];
    

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function aspirasi()
    {
        return $this->hasOne(Aspirasi::class, 'id_inputAspirasi', 'id_pelaporan');
    }
}