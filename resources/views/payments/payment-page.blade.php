@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pembayaran Pesanan #{{ $pesanan->id }}</h2>
    <p>Nama Produk: {{ $pesanan->nama_produk }}</p>
    <p>Harga: Rp{{ number_format($pesanan->harga, 0, ',', '.') }}</p>

    <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert('Pembayaran Berhasil');
                window.location.href = "/pesanan/{{ $pesanan->id }}/konfirmasi";
            },
            onPending: function(result) {
                alert('Menunggu Pembayaran');
            },
            onError: function(result) {
                alert('Pembayaran Gagal');
            }
        });
    });
</script>
@endsection
