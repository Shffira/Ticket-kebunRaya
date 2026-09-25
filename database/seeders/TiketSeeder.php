<?php

namespace Database\Seeders;

use App\Models\Tiket;
use Illuminate\Database\Seeder;

class TiketSeeder extends Seeder
{
    public function run(): void
    {
        Tiket::create([
            'nama' => 'Tiket Pengunjung Dewasa',
            'kategori' => 'Dewasa',
            'harga' => 15000,
            'deskripsi' => 'Tiket masuk Kebun Raya untuk pengunjung dewasa.',
            'status' => true,
        ]);

        Tiket::create([
            'nama' => 'Tiket Pengunjung Anak',
            'kategori' => 'Anak',
            'harga' => 10000,
            'deskripsi' => 'Tiket masuk Kebun Raya untuk pengunjung anak.',
            'status' => true,
        ]);
    }
}