<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $table = 'table_denda';

    protected $fillable = [
        'status',
        'biaya_denda',
        'dibuat_oleh'
    ];
}
