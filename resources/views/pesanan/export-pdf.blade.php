<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Data Pesanan</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Client</th>
                <th>Email Client</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->namaClient }}</td>
                <td>{{ $item->emailClient }}</td>
                <td>{{ $item->teleponClient }}</td>
                <td>{{ $item->alamatClient }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->kategori_layanan }}</td>
                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
