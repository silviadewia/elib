<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'table_pengguna';

    protected $fillable = [
    'nis',
    'nama_lengkap',
    'jurusan',
    'tempat_lahir',
    'tanggal_lahir',
    'username',
    'password',
    'level',
    'jenis_kelamin',
    'telepon',
    'email',
    'foto',
    'alamat',
    'dibuat_oleh'
];
}

