@extends('layouts.app')

@section('content')

<style>
    .ticket-page {
        max-width: 1250px;
        margin: auto;
        padding: 45px 25px 80px;
    }

    .ticket-brand {
        text-align: center;
        margin-bottom: 45px;
    }

    .ticket-brand .icon {
        font-size: 42px;
        margin-bottom: 5px;
    }

    .ticket-brand h1 {
        font-family: 'Playfair Display', serif;
        font-size: 34px;
        color: #263d2c;
    }

    .ticket-brand p {
        margin-top: 8px;
        color: #758078;
        font-size: 14px;
    }

    .ticket-layout {
        display: grid;
        grid-template-columns: 1.7fr 1fr;
        gap: 30px;
        align-items: start;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
    }

    .section-title::before,
    .section-title::after {
        content: "";
        height: 1px;
        background: #d9dedb;
        flex: 1;
    }

    .section-title h2 {
        font-size: 17px;
        color: #356441;
        white-space: nowrap;
        letter-spacing: 1px;
    }

    .ticket-card {
        border: 1px solid #dce2de;
        border-radius: 13px;
        padding: 25px;
        margin-bottom: 18px;
        background: white;
        transition: 0.25s;
    }

    .ticket-card:hover {
        border-color: #5c8b68;
        box-shadow: 0 8px 25px rgba(30, 70, 40, 0.08);
    }

    .ticket-card h3 {
        color: #1f3551;
        font-size: 17px;
        margin-bottom: 10px;
    }

    .ticket-date {
        color: #77817b;
        font-size: 13px;
        margin-bottom: 17px;
    }

    .ticket-description {
        color: #405047;
        font-size: 13px;
        line-height: 1.7;
        max-width: 700px;
    }

    .ticket-bottom {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
    }

    .price {
        font-weight: 700;
        color: #263b2c;
        margin-right: 10px;
    }

    .quantity {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .quantity button {
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 7px;
        background: #32643d;
        color: white;
        font-size: 21px;
        cursor: pointer;
        transition: 0.2s;
    }

    .quantity button:hover {
        background: #244c2e;
    }

    .quantity input {
        width: 55px;
        height: 40px;
        border: 1px solid #cbd3ce;
        border-radius: 6px;
        text-align: center;
        font-size: 15px;
        color: #273b2d;
        background: white;
    }

    /* DETAIL */

    .summary-wrapper {
        background: #f5f6f5;
        padding: 18px;
        border-radius: 12px;
        position: sticky;
        top: 20px;
    }

    .summary-title {
        color: #356441;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .summary-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .summary-card h3 {
        font-size: 17px;
        color: #263b55;
        margin-bottom: 7px;
    }

    .summary-date {
        font-size: 13px;
        color: #68756d;
        padding-bottom: 18px;
        border-bottom: 1px solid #eeeeee;
    }

    .summary-items {
        margin-top: 15px;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid #eeeeee;
        font-size: 13px;
        color: #435148;
    }

    .summary-item-left {
        display: flex;
        gap: 10px;
    }

    .badge {
        background: #edf1ed;
        padding: 3px 8px;
        border-radius: 5px;
        font-size: 12px;
        min-width: 30px;
        text-align: center;
    }

    .empty {
        text-align: center;
        color: #8a948e;
        font-size: 13px;
        padding: 20px 0;
        font-style: italic;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        padding-top: 17px;
        font-weight: 700;
        color: #263b2c;
    }

    .total-box {
        margin-top: 20px;
        background: white;
        border: 2px solid #70d9aa;
        border-radius: 12px;
        padding: 20px;
    }

    .total-heading {
        display: flex;
        justify-content: space-between;
        font-weight: 700;
        color: #266340;
        margin-bottom: 18px;
    }

    .continue-ticket {
        width: 100%;
        height: 45px;
        border: none;
        border-radius: 7px;
        background: #32643d;
        color: white;
        font-weight: 700;
        cursor: pointer;
    }

    .continue-ticket:hover {
        background: #244c2e;
    }

    .continue-ticket:disabled {
        background: #999;
        cursor: not-allowed;
    }

    @media (max-width: 850px) {
        .ticket-layout {
            grid-template-columns: 1fr;
        }

        .summary-wrapper {
            position: static;
        }

        .ticket-bottom {
            justify-content: space-between;
        }
    }

    @media (max-width: 500px) {
        .ticket-page {
            padding: 30px 15px 60px;
        }

        .ticket-card {
            padding: 18px;
        }

        .ticket-bottom {
            flex-wrap: wrap;
        }

        .price {
            width: 100%;
            margin-bottom: 5px;
        }
    }
</style>


<main class="ticket-page">

    <div class="ticket-brand">
        <div class="icon">🌿</div>

        <h1>KEBUN RAYA BOGOR</h1>

        <p>
            Pilih tiket yang sesuai dengan kebutuhan kunjunganmu.
        </p>
    </div>


    <div class="ticket-layout">

        {{-- BAGIAN PILIH TIKET --}}
        <div>

            <div class="section-title">
                <h2>PILIH TIKET</h2>
            </div>


            {{-- TIKET DEWASA --}}
            <div class="ticket-card">

                <h3>Tiket Pengunjung Dewasa</h3>

                <div class="ticket-date">
                    🗒
                    {{ $tanggal ? date('d F Y', strtotime($tanggal)) : 'Tanggal belum dipilih' }}
                </div>

                <p class="ticket-description">
                    Tiket masuk untuk pengunjung dewasa.
                    Nikmati berbagai koleksi tanaman dan suasana
                    hijau Kebun Raya Bogor.
                </p>

                <div class="ticket-bottom">

                    <span class="price">
                        IDR 15.500
                    </span>

                    <div class="quantity">

                        <button
                            type="button"
                            onclick="kurang('dewasa')"
                        >
                            −
                        </button>

                        <input
                            type="text"
                            id="jumlah-dewasa"
                            value="0"
                            readonly
                        >

                        <button
                            type="button"
                            onclick="tambah('dewasa')"
                        >
                            +
                        </button>

                    </div>

                </div>

            </div>


            {{-- TIKET ANAK --}}
            <div class="ticket-card">

                <h3>Tiket Pengunjung Anak</h3>

                <div class="ticket-date">
                    🗒
                    {{ $tanggal ? date('d F Y', strtotime($tanggal)) : 'Tanggal belum dipilih' }}
                </div>

                <p class="ticket-description">
                    Tiket masuk untuk pengunjung anak.
                    Cocok untuk menikmati pengalaman edukasi
                    dan mengenal berbagai tanaman di Kebun Raya.
                </p>

                <div class="ticket-bottom">

                    <span class="price">
                        IDR 10.000
                    </span>

                    <div class="quantity">

                        <button
                            type="button"
                            onclick="kurang('anak')"
                        >
                            −
                        </button>

                        <input
                            type="text"
                            id="jumlah-anak"
                            value="0"
                            readonly
                        >

                        <button
                            type="button"
                            onclick="tambah('anak')"
                        >
                            +
                        </button>

                    </div>

                </div>

            </div>

        </div>


        {{-- BAGIAN DETAIL --}}
        <div>

            <div class="summary-wrapper">

                <div class="summary-title">
                    DETAIL TIKET ANDA
                </div>

                <div class="summary-card">

                    <h3>Kebun Raya Bogor</h3>

                    <div class="summary-date">
                        🗒
                        {{ $tanggal ? date('l, d F Y', strtotime($tanggal)) : '-' }}
                    </div>


                    <div class="summary-items" id="summary-items">

                        <div class="empty">
                            Belum ada tiket yang dipilih
                        </div>

                    </div>


                    <div class="summary-total">
                        <span>Total Harga</span>

                        <span id="total-summary">
                            IDR 0
                        </span>
                    </div>

                </div>


                <div class="total-box">

                    <div class="total-heading">

                        <span>Total Harga</span>

                        <span id="total-price">
                            IDR 0
                        </span>

                    </div>

                    <button
                        type="button"
                        class="continue-ticket"
                        id="continue-button"
                        disabled
                        onclick="lanjutkan()"
                    >
                        Simpan dan Lanjutkan
                    </button>

                </div>

            </div>

        </div>

    </div>

</main>


<script>

    const harga = {
        dewasa: 15500,
        anak: 10000
    };

    const namaTiket = {
        dewasa: 'Tiket Pengunjung Dewasa',
        anak: 'Tiket Pengunjung Anak'
    };

    let jumlah = {
        dewasa: 0,
        anak: 0
    };


    function tambah(tipe) {

        jumlah[tipe]++;

        updateTampilan();

    }


    function kurang(tipe) {

        if (jumlah[tipe] > 0) {
            jumlah[tipe]--;
        }

        updateTampilan();

    }


    function formatRupiah(angka) {

        return 'IDR ' + angka.toLocaleString('id-ID');

    }


    function updateTampilan() {

        document.getElementById('jumlah-dewasa').value =
            jumlah.dewasa;

        document.getElementById('jumlah-anak').value =
            jumlah.anak;


        let total = 0;

        let html = '';


        Object.keys(jumlah).forEach(function(tipe) {

            if (jumlah[tipe] > 0) {

                let subtotal =
                    jumlah[tipe] * harga[tipe];

                total += subtotal;


                html += `
                    <div class="summary-item">

                        <div class="summary-item-left">

                            <span class="badge">
                                ${jumlah[tipe]}x
                            </span>

                            <span>
                                ${namaTiket[tipe]}
                            </span>

                        </div>

                        <span>
                            ${formatRupiah(subtotal)}
                        </span>

                    </div>
                `;

            }

        });


        if (total === 0) {

            html = `
                <div class="empty">
                    Belum ada tiket yang dipilih
                </div>
            `;

        }


        document.getElementById('summary-items').innerHTML =
            html;


        document.getElementById('total-summary').innerText =
            formatRupiah(total);

        document.getElementById('total-price').innerText =
            formatRupiah(total);


        document.getElementById('continue-button').disabled =
            total === 0;

    }


    function lanjutkan() {

        const tanggal = @json($tanggal);

        const params = new URLSearchParams({

            tanggal_kunjungan: tanggal,

            dewasa: jumlah.dewasa,

            anak: jumlah.anak

        });

        window.location.href =
            "{{ route('tiket.checkout') }}?" + params.toString();

    }

</script>

@endsection