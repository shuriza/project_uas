@extends('layouts.app')

@section('title', 'Table Example')

@push('style')
<!-- CSS Libraries -->
<style>
/* Style khusus untuk cetak */
@media print {
    body {
        font-size: 12px;
        color: black;
    }

    .btn, .form-inline, .pagination {
        display: none; /* Sembunyikan elemen yang tidak perlu saat mencetak */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
}
</style>
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Table Example</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Table Pemesanan</h2>
            <p class="section-lead">
                Halaman ini menampilkan data pemesanan yang telah dibuat.
            </p>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <a href="{{ route('pesanan.export') }}" class="btn btn-success mr-2">
                        <i class="fa fa-download"></i> Export CSV
                    </a>
                    <a href="{{ route('pesanan.export-pdf') }}" class="btn btn-danger">
                        <i class="fa fa-file-pdf"></i> Export PDF
                    </a>
                </div>
                <button id="printButton" class="btn btn-secondary">
                    <i class="fa fa-print"></i> Cetak
                </button>
            </div>

            <!-- Form Filter -->
            <form action="{{ route('table.example') }}" method="GET" class="form-inline mb-4">
                <div class="form-group mr-2">
                    <label for="status" class="mr-2">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Semua</option>
                        <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

            <!-- Tabel Pesanan -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Client</th>
                        <th>Email Client</th>
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
                        <td>{{ $item->emailClient }}</td>
                        <td>{{ $item->kategori_layanan }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('pesanan.detail', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('pesanan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pesanan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pesanan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Paginate -->
            <div class="d-flex justify-content-center">
                {{ $pesanan->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>
@endpush
