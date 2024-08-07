<?php
// app/Models/Report.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'tanggal_kejadian',
        'lokasi_kejadian',
        'kategori',
        'lampiran',
        'user_id', // pastikan ada kolom user_id di tabel reports
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
