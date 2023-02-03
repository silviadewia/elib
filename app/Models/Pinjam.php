<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'table_transaksi_peminjaman';

    protected $guarded = ['id'];
    //     protected $fillable = [
    //      'no_pinjaman',
    //      'tgl_pinjaman',
    //      'id_anggota',
    //      'lama',
    //      'id_buku',
    //      'tanggal_kembali',
    //      'denda',
    //      'dibuat_oleh'
    //  ];

    
}
