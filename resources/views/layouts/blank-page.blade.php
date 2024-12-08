@extends('layouts.app')

@section('title', 'Page Orders')

@push('style')
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

@endpush

@section('content')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Page Orders</h1>
            </div>



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
                        <label for="namaProduk">Nama Produk <span class="text-danger">*</span></label>
                        <select class="form-control" id="namaProduk" name="namaProduk" required>
                            <option value="bisnis_non_fup">Bisnis Non FUP</option>
                            <option value="bisnis_basic_fup">Bisnis Basic FUP</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Kategori Layanan -->
                    <div class="form-group">
                        <label for="kategori">Kategori Layanan <span class="text-danger">*</span></label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value="paket_50mb">Paket 50 MB</option>
                            <option value="paket_100mb">Paket 100 MB</option>
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


@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush


