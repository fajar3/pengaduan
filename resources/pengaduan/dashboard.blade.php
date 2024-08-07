<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard Admin</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pengadu</th> <!-- Kolom tambahan untuk nama pengadu -->
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal Kejadian</th>
                    <th>Lokasi Kejadian</th>
                    <th>Kategori</th>
                    <th>Lampiran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->id }}</td>
                        <td>{{ $report->user->name ?? 'Tidak Diketahui' }}</td> <!-- Menampilkan nama pengadu -->
                        <td>{{ $report->judul }}</td>
                        <td>{{ $report->isi }}</td>
                        <td>{{ $report->tanggal_kejadian }}</td>
                        <td>{{ $report->lokasi_kejadian }}</td>
                        <td>{{ $report->kategori }}</td>
                        <td>
                            @if ($report->lampiran)
                                <a href="{{ Storage::url($report->lampiran) }}" target="_blank">Lihat Lampiran</a>
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.report.show', $report->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <form action="{{ route('admin.report.destroy', $report->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
