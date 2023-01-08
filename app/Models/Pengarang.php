<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory;
    protected $table = 'table_pengarang';

    protected $fillable = [
        'nama',
        'dibuat_oleh',
    ];
}
