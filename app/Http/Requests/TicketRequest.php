<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tanggal_kunjungan' => 'required|date|after_or_equal:today',
            'kategori_tiket' => 'required|in:dewasa,anak',
            'jumlah_tiket' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal_kunjungan.required' => 'Tanggal kunjungan wajib diisi.',
            'tanggal_kunjungan.date' => 'Format tanggal tidak valid.',
            'tanggal_kunjungan.after_or_equal' => 'Tanggal kunjungan tidak boleh sebelum hari ini.',

            'kategori_tiket.required' => 'Kategori tiket wajib dipilih.',
            'kategori_tiket.in' => 'Kategori tiket tidak valid.',

            'jumlah_tiket.required' => 'Jumlah tiket wajib diisi.',
            'jumlah_tiket.integer' => 'Jumlah tiket harus berupa angka.',
            'jumlah_tiket.min' => 'Jumlah tiket minimal 1.',
        ];
    }
}