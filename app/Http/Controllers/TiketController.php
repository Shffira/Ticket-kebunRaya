<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->tanggal;

        $tiket = [
            [
                'nama' => 'Tiket Pengunjung Domestik',
                'deskripsi' => 'Tiket masuk untuk pengunjung Warga Negara Indonesia.',
                'harga' => 15000,
            ],
            [
                'nama' => 'Tiket Pengunjung Anak',
                'deskripsi' => 'Tiket khusus anak-anak untuk menikmati kawasan Kebun Raya.',
                'harga' => 10000,
            ],
            [
                'nama' => 'Tiket Sepeda',
                'deskripsi' => 'Tiket masuk untuk sepeda pribadi.',
                'harga' => 15000,
            ],
            [
                'nama' => 'Tiket Kendaraan',
                'deskripsi' => 'Tiket kendaraan untuk area parkir Kebun Raya.',
                'harga' => 20000,
            ],
        ];

        return view('tiket.index', compact('tanggal', 'tiket'));
    }


    public function pembelian(Request $request)
    {
        $tanggal = $request->tanggal;
        $dataTiket = $request->tiket ?? [];

        $detailTiket = [];
        $totalTiket = 0;
        $totalHarga = 0;

        foreach ($dataTiket as $item) {

            $jumlah = (int) ($item['jumlah'] ?? 0);
            $harga = (int) ($item['harga'] ?? 0);
            $nama = $item['nama'] ?? '';

            if ($jumlah > 0) {

                $subtotal = $jumlah * $harga;

                $detailTiket[] = [
                    'nama' => $nama,
                    'jumlah' => $jumlah,
                    'harga' => $harga,
                    'subtotal' => $subtotal,
                ];

                $totalTiket += $jumlah;
                $totalHarga += $subtotal;
            }
        }

        $invoice = 'INV-' . date('YmdHis');

        $qrData =
            "KEBUN RAYA BOGOR\n" .
            "Invoice: {$invoice}\n" .
            "Tanggal: {$tanggal}\n" .
            "Total: Rp " .
            number_format($totalHarga, 0, ',', '.');

        return view('pembelian', [
            'tanggal' => $tanggal,
            'detailTiket' => $detailTiket,
            'totalTiket' => $totalTiket,
            'totalHarga' => $totalHarga,
            'invoice' => $invoice,
            'qrData' => $qrData,
        ]);
    }


    // PROSES KIRIM BUKTI PEMBAYARAN
    public function kirimBukti(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'invoice' => 'required',
        ]);

        // Simpan bukti pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('bukti-pembayaran'),
                $namaFile
            );
        }

        // Notifikasi
        return redirect()
            ->route('aktivitas')
            ->with(
                'success',
                'Pembayaran berhasil dikirim! Bukti pembayaran sedang menunggu konfirmasi admin.'
            );
    }
}