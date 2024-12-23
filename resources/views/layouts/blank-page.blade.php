@extends('layouts.app')

@section('title', 'Page Orders')

@push('style')
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Page Orders</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pesanan Anda</h2>
            <p class="section-lead">
                Halaman ini menampilkan daftar pesanan milik Anda.
            </p>

            <!-- Table Orders -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Client</th>
                        <th>Kategori Layanan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->namaClient }}</td>
                        <td>{{ $item->kategori_layanan }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('pesanan.detail', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pesanan Anda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Tambahkan Paginate di sini -->
<div class="d-flex justify-content-center">
    {{ $pesanan->links('pagination::bootstrap-4') }}
</div>


        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
