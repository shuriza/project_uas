@extends('layouts.app')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Table Details</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Table Pemesanan</h2>
            <p class="section-lead">
                Halaman ini menampilkan detail data pemesanan yang telah dibuat.
            </p>

    <!-- Tampilkan pesan error jika validasi gagal -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div class="form-group">
            <label for="nama_produk">Nama Produk:</label>
            <input 
                type="text" 
                name="nama_produk" 
                id="nama_produk" 
                class="form-control @error('nama_produk') is-invalid @enderror" 
                value="{{ old('nama_produk', $pesanan->nama_produk) }}"
            >
            @error('nama_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Harga -->
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input 
                type="number" 
                name="harga" 
                id="harga" 
                class="form-control @error('harga') is-invalid @enderror" 
                value="{{ old('harga', $pesanan->harga) }}"
            >
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status:</label>
            <select 
                name="status" 
                id="status" 
                class="form-control @error('status') is-invalid @enderror"
            >
                <option value="Pending" {{ old('status', $pesanan->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Proses" {{ old('status', $pesanan->status) == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Selesai" {{ old('status', $pesanan->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
