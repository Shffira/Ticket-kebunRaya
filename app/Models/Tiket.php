<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tiket extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'deskripsi',
        'status',
    ];

    public function detailTransaksis(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}