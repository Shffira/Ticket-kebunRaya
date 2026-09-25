@extends('layouts.app')

@section('content')

<style>
    .terms-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 55px 30px 80px;
        min-height: 650px;
    }

    .terms-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 30px;
        margin-bottom: 35px;
    }

    .terms-title {
        color: #173b28;
        font-size: 30px;
        font-weight: 700;
        margin: 0 0 12px;
    }

    .terms-subtitle {
        color: #718071;
        font-size: 15px;
        margin: 0;
    }

    /* LANGUAGE SWITCH */
    .language-switch {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f4f5ef;
        padding: 5px;
        border-radius: 12px;
        border: 1px solid #e0e4d8;
        flex-shrink: 0;
    }

    .language-btn {
        border: none;
        background: transparent;
        padding: 9px 15px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        color: #687266;
        transition: all 0.25s ease;
    }

    .language-btn:hover {
        color: #214d31;
    }

    .language-btn.active {
        background: #214d31;
        color: white;
        box-shadow: 0 3px 8px rgba(33, 77, 49, 0.18);
    }

    /* CONTENT CARD */
    .terms-card {
        background: #ffffff;
        border: 1px solid #e4e8df;
        border-radius: 18px;
        padding: 35px 40px;
        box-shadow: 0 8px 25px rgba(29, 55, 36, 0.06);
    }

    .terms-list {
        margin: 0;
        padding-left: 25px;
    }

    .terms-list li {
        color: #34473a;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 17px;
        padding-left: 7px;
    }

    .terms-list li::marker {
        color: #4d7c59;
        font-weight: 700;
    }

    .terms-note {
        margin-top: 30px;
        padding: 18px 20px;
        background: #f3f7ed;
        border-left: 4px solid #63875b;
        border-radius: 10px;
        color: #526052;
        font-size: 14px;
        line-height: 1.7;
    }

    /* RESPONSIVE */
    @media (max-width: 700px) {
        .terms-page {
            padding: 35px 18px 60px;
        }

        .terms-header {
            flex-direction: column;
        }

        .terms-title {
            font-size: 25px;
        }

        .terms-card {
            padding: 25px 20px;
        }

        .terms-list li {
            font-size: 14px;
        }

        .language-switch {
            align-self: flex-start;
        }
    }
</style>


<div class="terms-page">

    <!-- HEADER -->
    <div class="terms-header">

        <div>
            <h1 class="terms-title" id="termsTitle">
                Syarat & Ketentuan
            </h1>

            <p class="terms-subtitle" id="termsSubtitle">
                Harap membaca ketentuan berikut sebelum melakukan pembelian tiket.
            </p>
        </div>

        <!-- LANGUAGE -->
        <div class="language-switch">

            <button
                type="button"
                class="language-btn active"
                id="btnId"
                onclick="changeLanguage('id')">
                🇮🇩 Indonesia
            </button>

            <button
                type="button"
                class="language-btn"
                id="btnEn"
                onclick="changeLanguage('en')">
                🇬🇧 English
            </button>

        </div>

    </div>


    <!-- TERMS -->
    <div class="terms-card">

        <!-- INDONESIA -->
        <ol class="terms-list" id="termsIndonesia">

            <li>
                Tiket berlaku untuk 1 kali masuk ke dalam Kebun Raya.
            </li>

            <li>
                Tiket yang sudah dibeli tidak dapat dikembalikan.
            </li>

            <li>
                Tiket hanya berlaku pada tanggal kunjungan yang dipilih
                pada saat pembelian dan tidak dapat digunakan pada tanggal lainnya.
            </li>

            <li>
                Tiket hanya berlaku sesuai jam operasional Kebun Raya.
            </li>

            <li>
                Anak dengan tinggi maksimal 90 cm tidak dipungut biaya tiket masuk.
            </li>

            <li>
                Tiket masuk pengunjung belum termasuk tiket masuk kendaraan.
            </li>

            <li>
                Kendaraan yang parkir di dalam Kebun Raya dilarang untuk menginap.
            </li>

            <li>
                Seluruh penyelenggaraan kegiatan acara di Kebun Raya harus
                menghubungi Visitor Center terlebih dahulu.
            </li>

        </ol>


        <!-- ENGLISH -->
        <ol class="terms-list" id="termsEnglish" style="display: none;">

            <li>
                The ticket is valid for one entry to the Botanical Garden.
            </li>

            <li>
                Purchased tickets are non-refundable.
            </li>

            <li>
                Tickets are only valid for the visit date selected at the time
                of purchase and cannot be used on other dates.
            </li>

            <li>
                Tickets are only valid during the Botanical Garden's operating hours.
            </li>

            <li>
                Children with a maximum height of 90 cm are not charged an entrance fee.
            </li>

            <li>
                Visitor entrance tickets do not include vehicle entrance tickets.
            </li>

            <li>
                Vehicles parked inside the Botanical Garden are not allowed to stay overnight.
            </li>

            <li>
                All events held at the Botanical Garden must contact the Visitor Center
                in advance.
            </li>

        </ol>


        <!-- NOTE -->
        <div class="terms-note" id="termsNote">
            🌿 Dengan membeli tiket, pengunjung dianggap telah membaca dan menyetujui
            seluruh Syarat & Ketentuan yang berlaku.
        </div>

    </div>

</div>


<script>

function changeLanguage(language) {

    const indonesia = document.getElementById('termsIndonesia');
    const english = document.getElementById('termsEnglish');

    const btnId = document.getElementById('btnId');
    const btnEn = document.getElementById('btnEn');

    const title = document.getElementById('termsTitle');
    const subtitle = document.getElementById('termsSubtitle');
    const note = document.getElementById('termsNote');


    if (language === 'en') {

        // Tampilkan English
        indonesia.style.display = 'none';
        english.style.display = 'block';

        // Judul
        title.textContent = 'Terms & Conditions';

        subtitle.textContent =
            'Please read the following terms before purchasing your ticket.';

        note.textContent =
            '🌿 By purchasing a ticket, visitors are considered to have read and agreed to all applicable Terms & Conditions.';

        // Tombol
        btnId.classList.remove('active');
        btnEn.classList.add('active');

    } else {

        // Tampilkan Indonesia
        indonesia.style.display = 'block';
        english.style.display = 'none';

        // Judul
        title.textContent = 'Syarat & Ketentuan';

        subtitle.textContent =
            'Harap membaca ketentuan berikut sebelum melakukan pembelian tiket.';

        note.textContent =
            '🌿 Dengan membeli tiket, pengunjung dianggap telah membaca dan menyetujui seluruh Syarat & Ketentuan yang berlaku.';

        // Tombol
        btnEn.classList.remove('active');
        btnId.classList.add('active');
    }

}

</script>

@endsection