<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;
    protected $table = 'table_rak';

    protected $fillable = [
        'nama',
        'dibuat_oleh',
    ];
}
