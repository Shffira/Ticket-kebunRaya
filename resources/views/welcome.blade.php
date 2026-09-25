@extends('layouts.app')

@section('content')

<style>
    .home-wrapper {
        background: #f8f6ed;
        min-height: calc(100vh - 80px);
        color: #24382b;
    }

    .hero {
        max-width: 1200px;
        margin: auto;
        padding: 55px 25px 35px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 45px;
        align-items: center;
    }

    .hero-small {
        display: inline-block;
        background: #e7edc9;
        color: #304b35;
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .hero h1 {
        font-family: Georgia, serif;
        font-size: 58px;
        line-height: 1;
        margin: 0;
        color: #28452f;
    }

    .hero h1 span {
        color: #9ba766;
    }

    .hero p {
        max-width: 480px;
        line-height: 1.8;
        color: #667269;
        margin: 22px 0;
    }

    .features {
        display: flex;
        gap: 25px;
        margin-top: 25px;
    }

    .feature {
        max-width: 130px;
    }

    .feature-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e8edcf;
        border-radius: 12px;
        margin-bottom: 8px;
    }

    .feature strong {
        display: block;
        font-size: 13px;
    }

    .feature small {
        color: #788078;
        line-height: 1.5;
    }

    /* BOOKING CARD */

    .booking-card {
        background: #294731;
        border-radius: 24px;
        padding: 35px;
        color: white;
        box-shadow: 0 20px 45px rgba(36, 60, 42, .18);
        position: relative;
        overflow: hidden;
    }

    .booking-card::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 50%;
        right: -100px;
        bottom: -100px;
    }

    .booking-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .booking-description {
        font-size: 13px;
        color: #d9e2d5;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .date-label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
    }

    .date-input {
        width: 100%;
        box-sizing: border-box;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #b9c59a;
        background: rgba(255,255,255,.08);
        color: white;
        outline: none;
    }

    .date-input::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }

    .booking-button {
        width: 100%;
        margin-top: 15px;
        padding: 15px;
        border: 0;
        border-radius: 10px;
        background: #e8edb9;
        color: #294731;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .booking-button:hover {
        background: #dce59e;
        transform: translateY(-2px);
    }

    .booking-note {
        margin-top: 18px;
        font-size: 11px;
        color: #d6dfd3;
    }

    /* PROMO */

    .promo {
        max-width: 1100px;
        margin: 10px auto 45px;
        background: #eeefe1;
        border: 1px solid #dfe2cd;
        border-radius: 22px;
        padding: 25px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .promo h2 {
        margin: 0;
        font-family: Georgia, serif;
        color: #304c36;
    }

    .promo p {
        margin: 7px 0 0;
        color: #72796f;
        font-size: 14px;
    }

    .promo-button {
        background: #304e38;
        color: white;
        padding: 13px 22px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* LOKASI */

    .locations {
        max-width: 1100px;
        margin: auto;
        padding: 10px 25px 70px;
    }

    .section-title {
        text-align: center;
        margin-bottom: 25px;
    }

    .section-title h2 {
        font-family: Georgia, serif;
        font-size: 32px;
        color: #294731;
        margin-bottom: 7px;
    }

    .section-title p {
        color: #7b837b;
    }

    .location-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
    }

    .location-card {
        background: white;
        border: 1px solid #e3e5da;
        border-radius: 17px;
        padding: 25px 20px;
        transition: .25s;
    }

    .location-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(40,70,48,.10);
    }

    .location-card .leaf {
        font-size: 28px;
        margin-bottom: 15px;
    }

    .location-card h3 {
        margin: 0 0 6px;
        color: #294731;
    }

    .location-card p {
        margin: 0;
        font-size: 13px;
        color: #7b827b;
    }

    @media(max-width: 800px) {
        .hero {
            grid-template-columns: 1fr;
        }

        .hero h1 {
            font-size: 44px;
        }

        .location-grid {
            grid-template-columns: 1fr 1fr;
        }

        .promo {
            margin-left: 20px;
            margin-right: 20px;
        }
    }

    @media(max-width: 500px) {
        .location-grid {
            grid-template-columns: 1fr;
        }

        .features {
            flex-wrap: wrap;
        }
    }
</style>

<div class="home-wrapper">

    <section class="hero">

        <div>

            <span class="hero-small">
                🌿 TICKET BOOKING
            </span>

            <h1>
                KEBUN RAYA<br>
                <span>BOGOR</span>
            </h1>

            <p>
                Nikmati pengalaman menyenangkan di tengah
                keindahan alam Kebun Raya Bogor.
                Pilih tanggal kunjunganmu dan siapkan
                petualangan hijau bersama kami.
            </p>

            <div class="features">

                <div class="feature">
                    <div class="feature-icon">🌿</div>
                    <strong>Alam Asri</strong>
                    <small>Udara segar & lingkungan hijau</small>
                </div>

                <div class="feature">
                    <div class="feature-icon">🎟️</div>
                    <strong>Tiket Mudah</strong>
                    <small>Pemesanan cepat dan praktis</small>
                </div>

                <div class="feature">
                    <div class="feature-icon">🛡️</div>
                    <strong>Aman</strong>
                    <small>Pengalaman nyaman</small>
                </div>

            </div>

        </div>

        <div class="booking-card">

            <div class="booking-title">
                 Pilih Tanggal Kunjungan
            </div>

            <div class="booking-description">
                Tentukan tanggal kunjungan Anda ke
                Kebun Raya Bogor.
            </div>

            <form action="{{ route('tiket.index') }}" method="GET">

                <label class="date-label">
                    Tanggal Kunjungan
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="date-input"
                    min="{{ date('Y-m-d') }}"
                    required
                >

                <button type="submit" class="booking-button">
                    Lanjutkan →
                </button>

            </form>

            <div class="booking-note">
                ● Tiket hanya berlaku pada tanggal
                yang dipilih saat pembelian.
            </div>

        </div>

    </section>


    <section class="promo">

        <div>
            <h2>🌱 Nikmati Promo Spesial Hari Ini!</h2>

            <p>
                Dapatkan pengalaman seru bersama keluarga
                di Kebun Raya.
            </p>
        </div>

        <a href="{{ route('tiket.index') }}" class="promo-button">
            Lihat Tiket →
        </a>

    </section>


    <section class="locations">

        <div class="section-title">
            <h2>Jelajahi Kebun Raya</h2>

            <p>
                Temukan berbagai destinasi Kebun Raya Indonesia.
            </p>
        </div>

        <div class="location-grid">

            <div class="location-card">
                <div class="leaf">🌿</div>
                <h3>Bogor</h3>
                <p>
                    Nikmati suasana hijau dan koleksi
                    tumbuhan di pusat Kota Bogor.
                </p>
            </div>

            <div class="location-card">
                <div class="leaf">🌸</div>
                <h3>Cibodas</h3>
                <p>
                    Rasakan udara sejuk dan panorama
                    pegunungan yang indah.
                </p>
            </div>

            <div class="location-card">
                <div class="leaf">🍃</div>
                <h3>Purwodadi</h3>
                <p>
                    Jelajahi berbagai koleksi tanaman
                    tropis dan konservasi.
                </p>
            </div>

            <div class="location-card">
                <div class="leaf">🌺</div>
                <h3>Bali</h3>
                <p>
                    Nikmati keindahan taman botani
                    dengan suasana khas Bali.
                </p>
            </div>

        </div>

    </section>

</div>

@endsection