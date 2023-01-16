<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'table_buku';

    protected $fillable = [
        'sampul',
        'isbn',
        'judul',
        'kategori',
        'rak',
        'penerbit',
        'pengarang',
        'tahun',
        'jumlah_buku',
        'lampiran_buku',
        'keterangan_lain',
        'pinjam',
        'dibuat_oleh'
    ];
}
