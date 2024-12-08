<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

        // Menambahkan kolom-kolom yang dapat diisi secara massal
        protected $fillable = [
            'namaClient',
            'emailClient',
            'teleponClient',
            'alamatClient',
            'namaProduk',
            'kategori',
            'pembayaranMelalui',
            'tanggalPemasangan',
            'catatan',
        ];
}
