@extends('layouts.app')

@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="row bg-primary text-white py-3 mb-4">
        <div class="col-md-6">
            <h1 class="ms-3">Dashboard</h1>
        </div>
        <div class="col-md-6 text-end pe-4">
            <i class="fas fa-bell me-3"></i>
            <i class="fas fa-envelope me-3"></i>
            <span>Hi, {{ Auth::user()->name }}</span>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Total Pesanan</h5>
                    <h2>{{ $pesanan->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Pesanan Pending</h5>
                    <h2>{{ $pesanan->where('status', 'Pending')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Pesanan Selesai</h5>
                    <h2>{{ $pesanan->where('status', 'Selesai')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Pesanan Table -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Detail Pesanan</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Client</th>
                                    <th>Status</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->namaClient }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>Rp{{ number_format($data->harga, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Polar Area Chart Section -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Statistik Kategori Pesanan</h5>
                    <canvas id="polarChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card-header {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    .table {
        margin-top: 15px;
    }
</style>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const polarData = {
        labels: ['Pending', 'Selesai', 'Proses'],
        datasets: [{
            label: 'Jumlah Pesanan',
            data: [
                {{ $pesanan->where('status', 'Pending')->count() }},
                {{ $pesanan->where('status', 'Selesai')->count() }},
                {{ $pesanan->where('status', 'Proses')->count() }}
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 205, 86, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 205, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    const polarConfig = {
        type: 'polarArea',
        data: polarData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        }
    };

    const polarCtx = document.getElementById('polarChart').getContext('2d');
    new Chart(polarCtx, polarConfig);
</script>
@endpush
