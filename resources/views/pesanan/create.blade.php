@extends('layouts.app')

@section('title', 'Clock Example')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Langganan Paket Internet</h1>
        </div>

    <div class="container">
        <h2 class="my-4">Form Input Pemesanan</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Nama Client -->
                    <div class="form-group">
                        <label for="namaClient">Nama Client <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="namaClient" name="namaClient" required>
                    </div>
                    
                    <!-- Email Client -->
                    <div class="form-group">
                        <label for="emailClient">Email Client <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="emailClient" name="emailClient" required>
                    </div>

                    <!-- Telepon Client -->
                    <div class="form-group">
                        <label for="teleponClient">Telepon Client <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="teleponClient" name="teleponClient" required>
                    </div>

                    <!-- Alamat Client -->
                    <div class="form-group">
                        <label for="alamatClient">Alamat Client <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="alamatClient" name="alamatClient" rows="3" required></textarea>
                    </div>

                    <!-- Nama Produk -->
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <select name="nama_produk" id="nama_produk" class="form-control" required>
                            <option value="" disabled selected>Pilih Nama Produk</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->nama_produk }}">{{ $kategori->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Kategori Layanan -->
                    <div class="form-group">
                        <label for="kategori_layanan">Kategori Layanan</label>
                        <select name="kategori_layanan" id="kategori_layanan" class="form-control" required>
                            <option value="" disabled selected>Pilih Kategori Layanan</option>
                        </select>
                    </div>

                    <!-- Pembayaran Melalui -->
                    <div class="form-group">
                        <label for="pembayaranMelalui">Pembayaran Melalui <span class="text-danger">*</span></label>
                        <select class="form-control" id="pembayaranMelalui" name="pembayaranMelalui" required>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="gopay">GoPay</option>
                            <option value="ovo">OVO</option>
                            <option value="dana">DANA</option>
                            <option value="credit_card">Kartu Kredit</option>
                        </select>
                    </div>

                    <!-- Tanggal Pemasangan -->
                    <div class="form-group">
                        <label for="tanggalPemasangan">Tanggal Pemasangan <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggalPemasangan" name="tanggalPemasangan" required>
                    </div>

                    <!-- Catatan -->
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                    </div>

                    <!-- Harga -->
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" id="harga" class="form-control" name="harga" readonly required>
                    </div>
                </div>
            </div>
            
            <!-- Button Container -->
            <div class="btn-container mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="button" class="btn btn-success">Kembali</button>
            </div>
        </form>
    </div>

    <!-- Script -->
    <script>
    const namaProdukSelect = document.getElementById('nama_produk');
    const kategoriLayananSelect = document.getElementById('kategori_layanan');
    const hargaInput = document.getElementById('harga');

    // Event listener untuk Nama Produk
    namaProdukSelect.addEventListener('change', function () {
        const namaProduk = this.value;

        // Bersihkan dropdown kategori layanan
        kategoriLayananSelect.innerHTML = '<option value="" disabled selected>Pilih Kategori Layanan</option>';
        hargaInput.value = ''; // Reset harga

        // AJAX untuk mengambil kategori layanan
        fetch(`/pesanan/create?nama_produk=${namaProduk}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                } else {
                    // Tambahkan kategori layanan ke dropdown
                    data.forEach(function (kategori) {
                        const option = document.createElement('option');
                        option.value = kategori;
                        option.textContent = kategori;
                        kategoriLayananSelect.appendChild(option);
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    });

    kategoriLayananSelect.addEventListener('change', function () {
        const namaProduk = namaProdukSelect.value;
        const kategoriLayanan = this.value;

        // AJAX untuk mengambil harga berdasarkan nama produk dan kategori layanan
        fetch(`/kategori-harga?nama_produk=${encodeURIComponent(namaProduk)}&kategori_layanan=${encodeURIComponent(kategoriLayanan)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                } else {
                    // Tampilkan harga di input readonly
                    hargaInput.value = data.harga;
                }
            })
            .catch(error => console.error('Error:', error));
    });
    </script>

        
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
