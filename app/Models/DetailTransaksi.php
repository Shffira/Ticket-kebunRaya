<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
    protected $fillable = [
        'transaksi_id',
        'tiket_id',
        'jumlah',
        'harga',
        'subtotal',
    ];

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function tiket(): BelongsTo
    {
        return $this->belongsTo(Tiket::class);
    }
}