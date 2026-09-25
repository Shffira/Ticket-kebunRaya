@extends('layouts.app')

@section('content')

<style>
    .ticket-page {
        background: #f7f6ef;
        min-height: calc(100vh - 80px);
        padding: 45px 6%;
        color: #243b2a;
    }

    .ticket-header {
        max-width: 1100px;
        margin: 0 auto 30px;
    }

    .ticket-badge {
        display: inline-block;
        background: #e8edcf;
        color: #35533a;
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .ticket-header h1 {
        font-family: Georgia, serif;
        font-size: 42px;
        margin: 0;
        color: #294731;
    }

    .ticket-header p {
        color: #707970;
        margin-top: 8px;
    }

    .ticket-date {
        background: #294731;
        color: white;
        max-width: 1100px;
        margin: 0 auto 30px;
        padding: 18px 24px;
        border-radius: 15px;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .ticket-date strong {
        color: #dceaa9;
    }

    .ticket-layout {
        max-width: 1100px;
        margin: auto;

        display: grid;
        grid-template-columns: 1.7fr .8fr;
        gap: 25px;
    }

    .ticket-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .ticket-card {
        background: white;
        border: 1px solid #e1e4d9;
        border-radius: 18px;
        padding: 24px;

        display: flex;
        justify-content: space-between;
        align-items: center;

        transition: .2s;
    }

    .ticket-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(40, 70, 48, .10);
    }

    .ticket-info {
        max-width: 70%;
    }

    .ticket-icon {
        width: 45px;
        height: 45px;

        background: #edf1d9;
        border-radius: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 22px;
        margin-bottom: 12px;
    }

    .ticket-info h3 {
        margin: 0 0 7px;
        color: #294731;
    }

    .ticket-info p {
        margin: 0;

        font-size: 13px;
        line-height: 1.6;
        color: #788078;
    }

    .ticket-buy {
        text-align: right;
    }

    .ticket-price {
        display: block;

        font-weight: 700;
        color: #294731;

        margin-bottom: 10px;
    }

    .quantity {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .quantity button {
        width: 35px;
        height: 35px;

        border: none;
        border-radius: 8px;

        background: #31583a;
        color: white;

        font-size: 18px;
        cursor: pointer;
    }

    .quantity button:hover {
        background: #23452c;
    }

    .quantity input {
        width: 42px;
        height: 33px;

        text-align: center;

        border: 1px solid #ccd2c7;
        border-radius: 8px;

        background: white;
    }

    /* SUMMARY */

    .summary {
        background: #294731;
        color: white;

        border-radius: 20px;
        padding: 25px;

        height: fit-content;

        position: sticky;
        top: 20px;
    }

    .summary h2 {
        margin-top: 0;
        font-size: 20px;
    }

    .summary-line {
        display: flex;
        justify-content: space-between;

        padding: 13px 0;

        border-bottom: 1px solid rgba(255,255,255,.12);

        font-size: 13px;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;

        margin-top: 20px;

        font-size: 18px;
        font-weight: 700;
    }

    .continue-btn {
        display: block;

        width: 100%;

        border: none;

        margin-top: 20px;

        padding: 14px;

        border-radius: 10px;

        background: #e8edb9;
        color: #294731;

        font-weight: 700;

        cursor: pointer;

        transition: .2s;
    }

    .continue-btn:hover {
        background: #dbe5a0;
        transform: translateY(-2px);
    }

    .continue-btn:disabled {
        background: #777;
        color: #ddd;

        cursor: not-allowed;

        transform: none;
    }

    @media(max-width: 800px) {

        .ticket-layout {
            grid-template-columns: 1fr;
        }

        .ticket-info {
            max-width: 60%;
        }

        .summary {
            position: static;
        }
    }
</style>


<div class="ticket-page">

    {{-- HEADER --}}
    <div class="ticket-header">

        <span class="ticket-badge">
            🌿 TICKET BOOKING
        </span>

        <h1>
            Pilih Tiket Kunjungan
        </h1>

        <p>
            Pilih tiket yang sesuai untuk pengalamanmu di Kebun Raya.
        </p>

    </div>


    {{-- TANGGAL --}}
    <div class="ticket-date">

        <div>
            📅 Tanggal Kunjungan
        </div>

        <strong>
            {{ $tanggal ?? 'Belum dipilih' }}
        </strong>

    </div>


    {{-- FORM PEMBELIAN --}}
    <form
        action="{{ route('tiket.pembelian') }}"
        method="POST"
    >

        @csrf

        <input
            type="hidden"
            name="tanggal"
            value="{{ $tanggal ?? '' }}"
        >


        <div class="ticket-layout">


            {{-- DAFTAR TIKET --}}
            <div class="ticket-list">

                @foreach($tiket as $item)

                    <div class="ticket-card">

                        <div class="ticket-info">

                            <div class="ticket-icon">
                                🎟️
                            </div>

                            <h3>
                                {{ $item['nama'] }}
                            </h3>

                            <p>
                                {{ $item['deskripsi'] }}
                            </p>

                        </div>


                        <div class="ticket-buy">

                            <span class="ticket-price">

                                IDR
                                {{ number_format($item['harga'], 0, ',', '.') }}

                            </span>


                            <div class="quantity">

                                <button
                                    type="button"
                                    onclick="kurang(this)"
                                >
                                    −
                                </button>


                                <input
                                    type="number"
                                    value="0"
                                    min="0"
                                    readonly
                                    data-harga="{{ $item['harga'] }}"
                                >


                                <button
                                    type="button"
                                    onclick="tambah(this)"
                                >
                                    +
                                </button>

                            </div>


                            {{-- DATA UNTUK CONTROLLER --}}

                            <input
                                type="hidden"
                                name="tiket[{{ $loop->index }}][nama]"
                                value="{{ $item['nama'] }}"
                            >

                            <input
                                type="hidden"
                                name="tiket[{{ $loop->index }}][harga]"
                                value="{{ $item['harga'] }}"
                            >

                            <input
                                type="hidden"
                                name="tiket[{{ $loop->index }}][jumlah]"
                                value="0"
                                class="jumlah-tiket"
                            >

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- RINGKASAN --}}
            <div class="summary">

                <h2>
                    🌿 Ringkasan Tiket
                </h2>


                <div class="summary-line">

                    <span>
                        Tanggal
                    </span>

                    <span>
                        {{ $tanggal ?? '-' }}
                    </span>

                </div>


                <div class="summary-line">

                    <span>
                        Total Tiket
                    </span>

                    <span id="total-ticket">
                        0
                    </span>

                </div>


                <div class="summary-total">

                    <span>
                        Total
                    </span>

                    <span id="total-price">
                        IDR 0
                    </span>

                </div>


                <button
                    type="submit"
                    class="continue-btn"
                    id="continueButton"
                    disabled
                >
                    Lanjutkan →
                </button>

            </div>

        </div>

    </form>

</div>



<script>

function tambah(button) {

    const card =
        button.closest('.ticket-card');

    const input =
        card.querySelector('input[type="number"]');

    let value =
        parseInt(input.value) || 0;

    input.value =
        value + 1;

    updateSummary();
}


function kurang(button) {

    const card =
        button.closest('.ticket-card');

    const input =
        card.querySelector('input[type="number"]');

    let value =
        parseInt(input.value) || 0;

    if (value > 0) {

        input.value =
            value - 1;

    }

    updateSummary();
}


function updateSummary() {

    let totalTicket = 0;

    let totalPrice = 0;


    const jumlahInputs =
        document.querySelectorAll(
            '.quantity input[type="number"]'
        );


    const hiddenInputs =
        document.querySelectorAll(
            '.jumlah-tiket'
        );


    jumlahInputs.forEach((input, index) => {

        const jumlah =
            parseInt(input.value) || 0;

        const harga =
            parseInt(input.dataset.harga) || 0;


        totalTicket += jumlah;

        totalPrice += jumlah * harga;


        // Masukkan jumlah ke hidden input

        hiddenInputs[index].value =
            jumlah;

    });


    // Tampilkan total tiket

    document.getElementById(
        'total-ticket'
    ).innerText =
        totalTicket;


    // Tampilkan total harga

    document.getElementById(
        'total-price'
    ).innerText =
        'IDR ' +
        totalPrice.toLocaleString('id-ID');


    // Aktifkan tombol

    const button =
        document.getElementById(
            'continueButton'
        );


    button.disabled =
        totalTicket === 0;

}

</script>

@endsection