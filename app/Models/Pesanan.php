<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;
class Pesanan extends Model
{
    use HasFactory;

        // Menambahkan kolom-kolom yang dapat diisi secara massal
        protected $fillable = [
            'namaClient',
            'emailClient',
            'teleponClient',
            'alamatClient',
            'nama_produk',
            'kategori_layanan',
            'pembayaranMelalui',
            'tanggalPemasangan',
            'catatan',
            'harga',
            'status',
        ];

        public function kategori()
        {
            return $this->belongsTo(Kategori::class);
        }
}
