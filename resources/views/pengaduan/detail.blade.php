<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Pengaduan</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $report->judul }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Isi:</strong> {{ $report->isi }}</p>
                <p><strong>Tanggal Kejadian:</strong> {{ $report->tanggal_kejadian }}</p>
                <p><strong>Lokasi Kejadian:</strong> {{ $report->lokasi_kejadian }}</p>
                <p><strong>Kategori:</strong> {{ $report->kategori }}</p>
                @if ($report->lampiran)
                    <p><strong>Lampiran:</strong> <a href="{{ Storage::url($report->lampiran) }}" target="_blank">Lihat Lampiran</a></p>
                @else
                    <p><strong>Lampiran:</strong> Tidak ada</p>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
