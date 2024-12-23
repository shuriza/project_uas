<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf; // Import DomPDF
class PesananController extends Controller

{

        // Menampilkan daftar pesanan
        public function create(Request $request)
        {
            // Jika request adalah AJAX dan ada nama_produk serta kategori_layanan
            if ($request->ajax()) {
                if ($request->has('nama_produk') && $request->has('kategori_layanan')) {
                    $namaProduk = $request->query('nama_produk');
                    $kategoriLayanan = $request->query('kategori_layanan');
        
                    // Ambil harga dari tabel berdasarkan nama produk dan kategori layanan
                    $harga = Kategori::where('nama_produk', $namaProduk)
                                    ->where('kategori_layanan', $kategoriLayanan)
                                    ->value('harga');
        
                    if (!$harga) {
                        return response()->json(['message' => 'Harga tidak ditemukan'], 404);
                    }
        
                    return response()->json(['harga' => $harga]);
                }
        
                // Jika hanya nama_produk yang dikirim (untuk kategori layanan)
                if ($request->has('nama_produk')) {
                    $namaProduk = $request->query('nama_produk');
                    $kategoriLayanan = Kategori::where('nama_produk', $namaProduk)->pluck('kategori_layanan');
        
                    if ($kategoriLayanan->isEmpty()) {
                        return response()->json(['message' => 'Kategori layanan tidak ditemukan'], 404);
                    }
        
                    return response()->json($kategoriLayanan);
                }
            }
        
            // Jika bukan AJAX, tampilkan form pemesanan
            $kategoris = Kategori::select('nama_produk')->distinct()->get();
            return view('pesanan.create', compact('kategoris'));
        }
        
        
        public function getHarga(Request $request)
        {
            $namaProduk = $request->query('nama_produk');
            $kategoriLayanan = $request->query('kategori_layanan');

            // Cari harga berdasarkan nama_produk dan kategori_layanan
            $harga = Kategori::where('nama_produk', $namaProduk)
                            ->where('kategori_layanan', $kategoriLayanan)
                            ->value('harga');

            // Jika harga tidak ditemukan
            if (!$harga) {
                return response()->json(['message' => 'Harga tidak ditemukan'], 404);
            }

            // Kembalikan harga dalam format JSON
            return response()->json(['harga' => $harga]);
        }



    // Menyimpan data pesanan
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'namaClient' => 'required|string|max:255',
            'emailClient' => 'required|email',
            'teleponClient' => 'required|string|max:15',
            'alamatClient' => 'required|string',
            'nama_produk' => 'required|string',
            'kategori_layanan' => 'required|string',
            'pembayaranMelalui' => 'required|string',
            'tanggalPemasangan' => 'required|date',
            'catatan' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);
     $validated['namaClient'] = auth()->user()->name;
        
        // Simpan data ke tabel `pesanans`
        Pesanan::create($validated);
    
        // Redirect dengan pesan sukses
        return redirect()->route('pesanan.create')->with('success', 'Pesanan berhasil disimpan!');
    }
    
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id); // Ambil data berdasarkan ID
        return view('pesanan.edit', compact('pesanan')); // Tampilkan form edit
    }
    
    public function update(Request $request, $id)
{
    // Validasi data
    $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'status' => 'required|string|in:Pending,Proses,Selesai',
    ]);

    // Temukan data pesanan
    $pesanan = Pesanan::findOrFail($id);

    // Perbarui data
    $pesanan->update($validated);

    // Redirect dengan pesan sukses
    return redirect()->route('table.example', $id)->with('status', 'Pesanan berhasil diperbarui!');
    
}



    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id); // Ambil data berdasarkan ID
        $pesanan->delete(); // Hapus data
        return redirect()->route('table.example')->with('success', 'Pesanan berhasil dihapus!');
    }
    
    public function detail($id)
{
    $pesanan = Pesanan::findOrFail($id); // Ambil data berdasarkan ID
    return view('pesanan.detail', compact('pesanan')); // Kirim data ke view
}



public function export()
{
    $pesanan = Pesanan::all();

    $csvData = "ID,Nama Client,Email Client,Telepon Client,Alamat Client,Nama Produk,Kategori Layanan,Harga,Status\n";

    foreach ($pesanan as $item) {
        $csvData .= "{$item->id},{$item->namaClient},{$item->emailClient},{$item->teleponClient},{$item->alamatClient},{$item->nama_produk},{$item->kategori_layanan},{$item->harga},{$item->status}\n";
    }

    $fileName = "pesanan_" . date('Ymd_His') . ".csv";
    $headers = ['Content-Type' => 'text/csv'];

    return Response::make($csvData, 200, $headers)->header('Content-Disposition', "attachment; filename=$fileName");
}


public function exportPdf()
{
    $pesanan = Pesanan::all(); // Ambil semua data pesanan

    // Kirim data ke view untuk PDF
    $pdf = Pdf::loadView('pesanan.export-pdf', compact('pesanan'));

    // Nama file PDF
    $fileName = 'pesanan_' . date('Ymd_His') . '.pdf';

    // Return download file PDF
    return $pdf->download($fileName);
}

public function index(Request $request)
{
    $pesanan = Pesanan::all();

    $pesanan->transform(function ($item) {
        // Contoh logika status
        $item->status = now()->greaterThanOrEqualTo($item->tanggalPemasangan) ? 'Selesai' : 'Proses';
        return $item;
    });

    return view('layouts.table-example', compact('pesanan'));
}

public function verify($id)
{
    $pesanan = Pesanan::findOrFail($id);
    $pesanan->status = 'Verified';
    $pesanan->save();

    return redirect()->route('pesanan.index')->with('message', 'Pesanan berhasil diverifikasi!');
}

public function assignTechnician(Request $request, $id)
{
    $pesanan = Pesanan::findOrFail($id);
    $pesanan->technician_id = $request->technician_id;
    $pesanan->status = 'Assigned';
    $pesanan->save();

    return redirect()->route('pesanan.index')->with('message', 'Teknisi berhasil ditugaskan!');
}

}
