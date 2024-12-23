@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pembayaran Pesanan #{{ $pesanan->id }}</h2>
    <p>Nama Produk: {{ $pesanan->nama_produk }}</p>
    <p>Harga: Rp{{ number_format($pesanan->harga, 0, ',', '.') }}</p>

    <a href="{{ $paymentLink }}" class="btn btn-primary" target="_blank">Bayar Sekarang</a>
</div>
@endsection
