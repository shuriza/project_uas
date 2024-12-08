<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // Menampilkan form pemesanan
    public function create()
    {
        return view('pesanan.create');
    }

    // Menyimpan data pesanan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaClient' => 'required|string|max:255',
            'emailClient' => 'required|email',
            'teleponClient' => 'required|string|max:15',
            'alamatClient' => 'required|string',
            'namaProduk' => 'required|string',
            'kategori' => 'required|string',
            'pembayaranMelalui' => 'required|string',
            'tanggalPemasangan' => 'required|date',
            'catatan' => 'required|string',
        ]);

        // Menyimpan data pesanan ke database
        Pesanan::create($validated);

        // Redirect kembali ke form dengan pesan sukses
        return redirect()->route('pesanan.create')->with('success', 'Pesanan berhasil dibuat!');
    }
}
