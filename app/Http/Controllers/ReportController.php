<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function submitReport(Request $request)
    {\Log::info('submitReport method hit');
        dd('submitReport method hit');
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_kejadian' => 'required|date',
            'lokasi_kejadian' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,mp4,avi|max:20480',
        ]);

        // Simpan lampiran jika ada
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
        }

        // Simpan laporan ke database
        $report = Report::create([
            'judul' => $validatedData['judul'],
            'isi' => $validatedData['isi'],
            'tanggal_kejadian' => $validatedData['tanggal_kejadian'],
            'lokasi_kejadian' => $validatedData['lokasi_kejadian'],
            'kategori' => $validatedData['kategori'],
            'lampiran' => $lampiranPath,
        ]);

        // Kirim email
        Mail::raw("Judul: {$report->judul}\nIsi: {$report->isi}\nTanggal Kejadian: {$report->tanggal_kejadian}\nLokasi Kejadian: {$report->lokasi_kejadian}\nKategori: {$report->kategori}", function ($message) use ($report) {
            $message->to('your-email@example.com') // Ganti dengan alamat email Anda
                    ->subject('Pengaduan Baru dari LAPOR!')
                    ->from('noreply@example.com');

            if ($report->lampiran) {
                $message->attach(storage_path('app/public/' . $report->lampiran));
            }
        });

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }
}
