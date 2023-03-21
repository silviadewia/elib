<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'table_pengguna';
    protected $guarded = ['id'];

    //     protected $fillable = [
    //     'nis',
    //     'nama_lengkap',
    //     'jurusan',
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'username',
    //     'password',
    //     'level',
    //     'jenis_kelamin',
    //     'telepon',
    //     'email',
    //     'foto',
    //     'alamat',
    //     'dibuat_oleh'
    // ];
}
=======
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
>>>>>>> 9473735d7e181c4845bb8f82029f090f879fd2c2
