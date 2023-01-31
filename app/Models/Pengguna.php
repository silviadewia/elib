<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';

    protected $fillable = [
        'nis',
        'nama_Lengkap',
        'jurusan',
        'tempat_Lahir',
        'tanggal_Lahir',
        'username',
        'password',
        'level',
        'jenis_Kelamin',
        'telepon',
        'email',
        'foto',
        'alamat',
        'dibuat_oleh',
    ];
}
