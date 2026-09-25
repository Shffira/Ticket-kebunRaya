@extends('layouts.app')

@section('content')

<style>
    .checkout-page {
        background: #f8f6ed;
        min-height: calc(100vh - 80px);
        padding: 50px 25px;
        color: #29412f;
    }

    .checkout-container {
        max-width: 1050px;
        margin: auto;
    }

    .checkout-title {
        text-align: center;
        margin-bottom: 35px;
    }

    .checkout-title small {
        color: #81907f;
    }

    .checkout-title h1 {
        font-family: Georgia, serif;
        font-size: 38px;
        margin: 8px 0;
    }

    .checkout-grid {
        display: grid;
        grid-template-columns: 1fr 370px;
        gap: 25px;
    }

    .checkout-card {
        background: white;
        border: 1px solid #e0e4d9;
        border-radius: 20px;
        padding: 28px;
    }

    .checkout-card h2 {
        margin-top: 0;
        color: #294731;
    }

    .date-box {
        background: #edf0dc;
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .item {
        display: flex;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #eceee8;
        font-size: 14px;
    }

    .item:last-child {
        border-bottom: 0;
    }

    .item-name {
        font-weight: 600;
    }

    .item-detail {
        color: #788078;
        font-size: 13px;
        margin-top: 4px;
    }

    .checkout-total {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        font-weight: 700;
    }

    .pay-button {
        display: block;
        width: 100%;
        margin-top: 25px;
        padding: 15px;
        border: 0;
        border-radius: 10px;
        background: #2e5437;
        color: white;
        font-weight: 700;
        cursor: pointer;
    }

    .pay-button:hover {
        background: #24452d;
    }

    .secure {
        margin-top: 15px;
        text-align: center;
        font-size: 12px;
        color: #7c847c;
    }

    @media(max-width: 800px) {
        .checkout-grid {
            grid-template-columns: 1fr;
        }
    }
    <style>
.qr-payment {
    margin-top: 25px;
    padding: 20px;
    background: #f7f6ef;
    border-radius: 15px;
    text-align: center;
}

.qr-payment h3 {
    color: #294731;
    margin-bottom: 15px;
}

.qr-box {
    background: white;
    padding: 15px;
    border-radius: 12px;
    display: inline-block;
}

.qr-box svg {
    width: 220px;
    height: 220px;
}

.qr-payment p {
    color: #707970;
    font-size: 13px;
    margin: 12px 0 5px;
}

.qr-payment strong {
    color: #294731;
    font-size: 13px;
}
</style>
</style>


<div class="checkout-page">

    <div class="checkout-container">

        <div class="checkout-title">

            <small>
                Tiket → Pembelian
            </small>

            <h1>Detail Pembelian</h1>

            <p>
                Periksa kembali tiket yang kamu pilih.
            </p>

        </div>


        <div class="checkout-grid">

            <div class="checkout-card">

                <h2>🎟️ Tiket Kunjungan</h2>

                <div class="date-box">
                    📅
                    <strong>
                        {{ date('d F Y', strtotime($tanggal)) }}
                    </strong>
                </div>


                @foreach($items as $item)

                    <div class="item">

                        <div>

                            <div class="item-name">
                                {{ $item['nama'] }}
                            </div>

                            <div class="item-detail">
                                {{ $item['jumlah'] }} tiket ×
                                IDR {{ number_format($item['harga'], 0, ',', '.') }}
                            </div>

                        </div>

                        <strong>
                            IDR {{ number_format($item['subtotal'], 0, ',', '.') }}
                        </strong>

                    </div>

                @endforeach

            </div>


            <div class="qr-payment">

    <h3>📱 Scan QR Pembayaran</h3>

    <div class="qr-box">
        {!! QrCode::size(220)->generate($qrData) !!}
    </div>

    <p>
        Scan QR untuk melihat detail pembayaran.
    </p>

    <strong>
        {{ $invoice }}
    </strong>

</div>

        </div>

    </div>

</div>

@endsection