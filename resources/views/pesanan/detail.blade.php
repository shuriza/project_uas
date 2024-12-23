@extends('layouts.app')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Table Edit</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Table Pemesanan</h2>
            <p class="section-lead">
                Halaman ini menampilkan detail data pemesanan yang telah dibuat.
            </p>




<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $pesanan->id }}</td>
        </tr>
        <tr>
            <th>Nama Client</th>
            <td>{{ $pesanan->namaClient }}</td>
        </tr>
        <tr>
            <th>Email Client</th>
            <td>{{ $pesanan->emailClient }}</td>
        </tr>
        <tr>
            <th>Telepon Client</th>
            <td>{{ $pesanan->teleponClient }}</td>
        </tr>
        <tr>
            <th>Alamat Client</th>
            <td>{{ $pesanan->alamatClient }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td>{{ $pesanan->nama_produk }}</td>
        </tr>
        <tr>
            <th>Kategori Layanan</th>
            <td>{{ $pesanan->kategori_layanan }}</td>
        </tr>
        <tr>
            <th>Pembayaran Melalui</th>
            <td>{{ $pesanan->pembayaranMelalui }}</td>
        </tr>
        <tr>
            <th>Tanggal Pemasangan</th>
            <td>{{ $pesanan->tanggalPemasangan }}</td>
        </tr>
        <tr>
            <th>Catatan</th>
            <td>{{ $pesanan->catatan }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $pesanan->harga }}</td>
        </tr>
    </table>
    <a href="{{ route('table.example') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

        


@push('scripts')
    <!-- JS Libraries -->
@endpush
