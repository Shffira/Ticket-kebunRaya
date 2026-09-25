@extends('layouts.app')

@section('content')

<style>
    .payment-page {
        background: #f7f6ef;
        min-height: calc(100vh - 80px);
        padding: 55px 7%;
        color: #294731;
    }

    .payment-container {
        max-width: 1100px;
        margin: auto;
    }

    .payment-badge {
        display: inline-block;
        background: #e8edcf;
        color: #35533a;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .payment-title {
        font-family: Georgia, serif;
        font-size: 46px;
        margin: 0;
        color: #294731;
    }

    .payment-subtitle {
        color: #718078;
        margin-top: 8px;
        font-size: 16px;
    }

    .payment-layout {
        display: grid;
        grid-template-columns: 1.6fr .8fr;
        gap: 28px;
        margin-top: 35px;
        align-items: start;
    }

    /* KIRI */
    .payment-card {
        background: white;
        border: 1px solid #e1e4d9;
        border-radius: 20px;
        padding: 26px;
        box-shadow: 0 10px 30px rgba(40, 70, 48, .06);
    }

    .date-box {
        background: #294731;
        color: white;
        padding: 18px 22px;
        border-radius: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
    }

    .date-box strong {
        color: #e8edb9;
    }

    .section-title {
        font-size: 21px;
        margin-bottom: 15px;
        color: #294731;
    }

    .ticket-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 0;
        border-bottom: 1px solid #e4e7df;
    }

    .ticket-item:last-child {
        border-bottom: none;
    }

    .ticket-name {
        font-weight: 700;
        color: #294731;
        margin-bottom: 5px;
    }

    .ticket-detail {
        color: #788078;
        font-size: 13px;
    }

    .ticket-subtotal {
        font-weight: 700;
        color: #294731;
        white-space: nowrap;
    }

    .upload-section {
        margin-top: 25px;
    }

    .upload-label {
        display: block;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .upload-box {
        width: 100%;
        box-sizing: border-box;
        padding: 14px;
        border: 1px solid #d8ddd3;
        border-radius: 12px;
        background: #fafbf8;
    }

    /* KANAN */
    .payment-summary {
        background: #294731;
        color: white;
        border-radius: 20px;
        padding: 28px;
        position: sticky;
        top: 20px;
    }

    .payment-summary h2 {
        margin-top: 0;
        font-size: 22px;
    }

    .invoice-box {
        background: rgba(255,255,255,.08);
        padding: 12px 14px;
        border-radius: 10px;
        margin: 20px 0;
        font-size: 13px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        color: #e4e9e2;
    }

    .summary-total {
        border-top: 1px solid rgba(255,255,255,.15);
        margin-top: 15px;
        padding-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .summary-total span:last-child {
        color: #e8edb9;
        font-size: 24px;
        font-weight: 700;
    }

    /* QR */
    .qr-section {
        margin-top: 25px;
        background: white;
        color: #294731;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
    }

    .qr-section h3 {
        margin: 0 0 8px;
        font-size: 17px;
    }

    .qr-section p {
        color: #718078;
        font-size: 12px;
        line-height: 1.5;
        margin-bottom: 15px;
    }

    .qr-code {
        width: 190px;
        height: 190px;
        object-fit: contain;
        border-radius: 8px;
    }

    .qr-total {
        margin-top: 12px;
        font-weight: 700;
        color: #294731;
    }

    .submit-btn {
        width: 100%;
        border: none;
        margin-top: 20px;
        padding: 15px;
        border-radius: 11px;
        background: #e8edb9;
        color: #294731;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background: #dce5a4;
    }

    @media(max-width: 800px) {
        .payment-layout {
            grid-template-columns: 1fr;
        }

        .payment-summary {
            position: static;
        }

        .payment-title {
            font-size: 36px;
        }
    }
</style>


<div class="payment-page">

    <div class="payment-container">

        {{-- HEADER --}}
        <span class="payment-badge">
            🌿 TICKET BOOKING
        </span>

        <h1 class="payment-title">
            Pembayaran Tiket
        </h1>

        <p class="payment-subtitle">
            Silakan periksa pesananmu sebelum melakukan pembayaran.
        </p>


        <div class="payment-layout">

            {{-- ===================== --}}
            {{-- BAGIAN KIRI --}}
            {{-- ===================== --}}

            <div class="payment-card">

                {{-- TANGGAL --}}
                <div class="date-box">
                    <span>
                        📅 &nbsp; Tanggal Kunjungan
                    </span>

                    <strong>
                        {{ $tanggal }}
                    </strong>
                </div>


                {{-- TIKET --}}
                <h2 class="section-title">
                    🎟️ Tiket yang Dipilih
                </h2>

                @foreach($detailTiket as $item)

                    <div class="ticket-item">

                        <div>
                            <div class="ticket-name">
                                {{ $item['nama'] }}
                            </div>

                            <div class="ticket-detail">
                                {{ $item['jumlah'] }}
                                tiket ×
                                IDR {{ number_format($item['harga'], 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="ticket-subtotal">
                            IDR {{ number_format($item['subtotal'], 0, ',', '.') }}
                        </div>

                    </div>

                @endforeach


                {{-- UPLOAD --}}
                <div class="upload-section">

                    <form action="{{ route('tiket.kirimBukti') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="invoice" value="{{ $invoice }}">

    <div>
        <label>Bukti Pembayaran</label>

        <input
            type="file"
            name="bukti_pembayaran"
            accept="image/*"
            required
        >
    </div>

    <button type="submit">
        Kirim Bukti Pembayaran →
    </button>

</form>

                </div>

            </div>


            {{-- ===================== --}}
            {{-- BAGIAN KANAN --}}
            {{-- ===================== --}}

            <div class="payment-summary">

                <h2>
                    🌿 Ringkasan Pembayaran
                </h2>


                {{-- INVOICE --}}
                <div class="invoice-box">

                    <div>
                        Invoice
                    </div>

                    <strong>
                        {{ $invoice }}
                    </strong>

                </div>


                {{-- TOTAL TIKET --}}
                <div class="summary-row">

                    <span>
                        Total Tiket
                    </span>

                    <strong>
                        {{ $totalTiket }} tiket
                    </strong>

                </div>


                {{-- TANGGAL --}}
                <div class="summary-row">

                    <span>
                        Tanggal
                    </span>

                    <strong>
                        {{ $tanggal }}
                    </strong>

                </div>


                {{-- TOTAL --}}
                <div class="summary-total">

                    <span>
                        Total Pembayaran
                    </span>

                    <span>
                        IDR {{ number_format($totalHarga, 0, ',', '.') }}
                    </span>

                </div>


                {{-- ================= --}}
                {{-- QR CODE --}}
                {{-- ================= --}}

                <div class="qr-section">

                    <h3>
                        📱 Scan QR untuk Pembayaran
                    </h3>

                    <p>
                        Scan QR Code menggunakan kamera
                        atau aplikasi pembayaran.
                    </p>

                    <img
                        class="qr-code"
                        src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data={{ urlencode($qrData) }}"
                        alt="QR Pembayaran"
                    >

                    <div class="qr-total">
                        IDR {{ number_format($totalHarga, 0, ',', '.') }}
                    </div>

                </div>


                {{-- TOMBOL --}}
                <button
                    type="button"
                    class="submit-btn"
                    onclick="document.querySelector('.upload-section form').submit()"
                >
                    Kirim Bukti Pembayaran →
                </button>

            </div>

        </div>

    </div>

</div>

@endsection