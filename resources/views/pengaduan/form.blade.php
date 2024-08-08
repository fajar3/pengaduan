<!DOCTYPE html>
<html lang="id">
<head>
    meta charset="utf-8">
    <title>LPKni News</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Nama Aplikasi</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report.create') }}">Kirim Pengaduan</a>
                    </li>
                    <!-- Tambahkan item navigasi lainnya di sini -->
                </ul>
            </div>
        </nav>
    </header>
    <main class="container mt-4">
        <form action="{{ route('submit.report') }}" method="post" enctype="multipart/form-data">
            {{ method_field('post') }}
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Pengaduan" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" placeholder="Isi Pengaduan" required></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Kejadian</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal_kejadian" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi Kejadian</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi_kejadian" placeholder="Lokasi Kejadian" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori Pengaduan</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Pelayanan Publik">Pelayanan Publik</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Infrastruktur">Infrastruktur</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lampiran">Upload Lampiran (Foto/Video)</label>
                <input type="file" class="form-control-file" id="lampiran" name="lampiran" accept="image/*,video/*">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Kirim Pengaduan</button>
        </form>
    </main>
    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; {{ date('Y') }} Nama Aplikasi. All rights reserved.</p>
        <!-- Tambahkan link footer lainnya di sini -->
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Tambahkan script lainnya di sini -->
</body>
</html>
