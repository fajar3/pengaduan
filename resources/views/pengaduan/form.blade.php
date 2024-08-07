<form action="{{ route('submit.report') }}" method="post" enctype="multipart/form-data">
    {{method_field('post')}}
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
