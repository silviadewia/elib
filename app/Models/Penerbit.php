<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'table_penerbit';

    protected $fillable = [
        'nama',
        'dibuat_oleh',
    ];
}
