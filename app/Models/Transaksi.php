<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id',
        'invoice',
        'tanggal_kunjungan',
        'total_tiket',
        'total_harga',
        'bukti_pembayaran',
        'status',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];
}