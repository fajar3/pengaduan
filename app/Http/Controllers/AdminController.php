<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil laporan beserta informasi pengguna
        $reports = Report::with('user')->get();
        return view('pengaduan/dashboard', compact('reports'));
    
        // $reports = Report::all();
        // return view('pengaduan/dashboard', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('report', compact('report'));
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        if ($report->lampiran) {
            \Storage::delete('public/' . $report->lampiran);
        }
        $report->delete();
        return redirect()->route('dashboard')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
