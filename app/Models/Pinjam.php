<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'table_pinjam';

    protected $fillable = [
        'no_pinjaman',
        'id_anggota',
        'lama',
        'id_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'denda',
        'status',
        'dibuat_oleh'
    ];
}
