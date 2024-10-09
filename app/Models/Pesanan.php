<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'kepada',
        'polsek',
        'tanggal',
        'kendaraan',
        'nopol',
        'item',
        'quant',
        'harga',
    ];
}
