@extends('layouts.app')

@section('content')

<style>

    .home {
        background: #f8f7f1;
        overflow: hidden;
    }

    /* ================= HERO ================= */

    .hero {
        min-height: 590px;

        padding: 70px 8%;

        display: grid;
        grid-template-columns: 1.05fr .95fr;
        align-items: center;
        gap: 60px;

        background:
            radial-gradient(
                circle at 70% 30%,
                #e4ebd9,
                transparent 35%
            );
    }

    .hero-label {
        display: inline-block;

        padding: 8px 15px;

        background: #e2ead5;
        color: #557346;

        border-radius: 30px;

        font-size: 11px;
        font-weight: 700;

        letter-spacing: 1.5px;
        text-transform: uppercase;

        margin-bottom: 20px;
    }

    .hero h1 {
        font-family: 'Playfair Display', serif;

        font-size: clamp(45px, 6vw, 78px);

        line-height: 1.02;

        color: #274631;

        margin-bottom: 22px;
    }

    .hero h1 span {
        color: #8a9c5d;
    }

    .hero-description {
        max-width: 520px;

        color: #6e796f;

        line-height: 1.8;

        font-size: 15px;

        margin-bottom: 30px;
    }

    .hero-buttons {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .primary-btn {
        display: inline-block;

        padding: 14px 24px;

        background: #315f3c;
        color: white;

        border-radius: 9px;

        text-decoration: none;

        font-size: 13px;
        font-weight: 700;

        transition: .2s;
    }

    .primary-btn:hover {
        background: #244a2e;
        transform: translateY(-2px);
    }

    .secondary-btn {
        display: inline-block;

        padding: 13px 23px;

        border: 1px solid #9cae96;
        color: #496049;

        border-radius: 9px;

        text-decoration: none;

        font-size: 13px;
        font-weight: 700;
    }

    /* ================= HERO VISUAL ================= */

    .hero-visual {
        position: relative;

        min-height: 440px;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .plant-circle {
        width: 360px;
        height: 360px;

        border-radius: 50%;

        background: #dfe8d3;

        display: flex;
        justify-content: center;
        align-items: center;

        font-size: 145px;

        box-shadow:
            20px 20px 0 #cdd9bd;
    }

    .floating-card {
        position: absolute;

        background: white;

        padding: 18px 22px;

        border-radius: 13px;

        box-shadow: 0 12px 35px rgba(46, 67, 51, .13);

        font-size: 12px;
    }

    .floating-card strong {
        display: block;
        color: #315f3c;
        margin-bottom: 4px;
    }

    .floating-card span {
        color: #788278;
    }

    .card-one {
        top: 45px;
        right: 20px;
    }

    .card-two {
        bottom: 50px;
        left: 0;
    }

    /* ================= BOOKING ================= */

    .booking-section {
        padding: 75px 8%;

        background: #294a34;

        color: white;
    }

    .booking-inner {
        max-width: 1100px;
        margin: auto;

        display: grid;
        grid-template-columns: .8fr 1.2fr;

        gap: 60px;

        align-items: center;
    }

    .booking-text small {
        color: #b9d29e;

        text-transform: uppercase;

        letter-spacing: 2px;
        font-size: 11px;
        font-weight: 700;
    }

    .booking-text h2 {
        font-family: 'Playfair Display', serif;

        font-size: 40px;

        margin: 13px 0;
    }

    .booking-text p {
        color: #c3d1c3;

        font-size: 14px;
        line-height: 1.7;
    }

    .booking-box {
        padding: 25px;

        background: #f9f8f2;

        border-radius: 17px;

        color: #293d2f;
    }

    .booking-box label {
        display: block;

        font-size: 12px;

        font-weight: 700;

        color: #4e6253;

        margin-bottom: 9px;
    }

    .date-input {
        width: 100%;
        height: 52px;

        border: 1px solid #ccd5c9;

        border-radius: 8px;

        padding: 0 14px;

        font-family: inherit;

        color: #35483a;

        outline: none;
    }

    .date-input:focus {
        border-color: #668c5e;
    }

    .booking-submit {
        width: 100%;
        height: 50px;

        margin-top: 13px;

        border: 0;

        border-radius: 8px;

        background: #315f3c;

        color: white;

        font-family: inherit;

        font-size: 13px;
        font-weight: 700;

        cursor: pointer;
    }

    .booking-submit:hover {
        background: #244a2e;
    }

    /* ================= FEATURES ================= */

    .features {
        padding: 70px 8%;

        text-align: center;
    }

    .features h2 {
        font-family: 'Playfair Display', serif;

        font-size: 35px;

        color: #294b32;

        margin-bottom: 10px;
    }

    .features-intro {
        color: #7b857c;

        max-width: 600px;

        margin: 0 auto 35px;

        font-size: 14px;

        line-height: 1.7;
    }

    .feature-grid {
        max-width: 1050px;

        margin: auto;

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 20px;
    }

    .feature-card {
        padding: 28px 22px;

        background: white;

        border: 1px solid #e3e7de;

        border-radius: 15px;

        transition: .2s;
    }

    .feature-card:hover {
        transform: translateY(-5px);

        box-shadow:
            0 12px 30px rgba(40, 70, 45, .08);
    }

    .feature-icon {
        font-size: 32px;

        margin-bottom: 14px;
    }

    .feature-card h3 {
        font-size: 16px;

        color: #31563a;

        margin-bottom: 8px;
    }

    .feature-card p {
        color: #7b857c;

        font-size: 13px;

        line-height: 1.7;
    }

    /* ================= MOBILE ================= */

    @media(max-width: 800px) {

        .hero {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .hero-description {
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-visual {
            min-height: 350px;
        }

        .plant-circle {
            width: 270px;
            height: 270px;
            font-size: 100px;
        }

        .booking-inner {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .feature-grid {
            grid-template-columns: 1fr;
        }
    }

</style>


<div class="home">

    {{-- HERO --}}

    <section class="hero">

        <div>

            <div class="hero-label">
                Botanical Experience
            </div>

            <h1>
                Temukan
                <br>
                <span>Ruang Hijau</span>
                <br>
                untukmu.
            </h1>

            <p class="hero-description">
                Rasakan suasana asri Kebun Raya Bogor,
                jelajahi koleksi tumbuhan, dan nikmati
                waktu berkualitas bersama orang-orang terdekat.
            </p>

            <div class="hero-buttons">

                <a href="{{ route('tiket.create') }}" class="primary-btn">
                    Pesan Tiket →
                </a>

                <a href="#tentang" class="secondary-btn">
                    Jelajahi
                </a>

            </div>

        </div>


        <div class="hero-visual">

            <div class="plant-circle">
                🌿
            </div>

            <div class="floating-card card-one">

                <strong>🌱 15.000+</strong>

                <span>
                    koleksi tanaman
                </span>

            </div>

            <div class="floating-card card-two">

                <strong>📍 Bogor</strong>

                <span>
                    Jawa Barat
                </span>

            </div>

        </div>

    </section>


    {{-- BOOKING --}}

    <section class="booking-section">

        <div class="booking-inner">

            <div class="booking-text">

                <small>
                    Rencanakan kunjungan
                </small>

                <h2>
                    Siap menjelajah?
                </h2>

                <p>
                    Pilih tanggal kunjunganmu dan
                    dapatkan tiket dengan mudah.
                </p>

            </div>


            <div class="booking-box">

                <form
                    action="{{ route('tiket.pilih') }}"
                    method="GET"
                >

                    <label>
                        Tanggal Kunjungan
                    </label>

                    <input
                        type="date"
                        name="tanggal_kunjungan"
                        class="date-input"
                        min="{{ date('Y-m-d') }}"
                        required
                    >

                    <button
                        type="submit"
                        class="booking-submit"
                    >
                        Pilih Tiket →
                    </button>

                </form>

            </div>

        </div>

    </section>


    {{-- FEATURES --}}

    <section class="features" id="tentang">

        <h2>
            Lebih dari Sekadar Taman
        </h2>

        <p class="features-intro">
            Tempat untuk belajar, menjelajah,
            beristirahat, dan menikmati keindahan alam.
        </p>


        <div class="feature-grid">

            <div class="feature-card">

                <div class="feature-icon">
                    🌿
                </div>

                <h3>
                    Koleksi Tanaman
                </h3>

                <p>
                    Kenali berbagai jenis tumbuhan
                    dalam lingkungan yang asri.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    📚
                </div>

                <h3>
                    Edukasi
                </h3>

                <p>
                    Temukan pengalaman belajar yang
                    menyenangkan tentang dunia tumbuhan.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    📸
                </div>

                <h3>
                    Pengalaman
                </h3>

                <p>
                    Nikmati suasana hijau dan abadikan
                    momen bersama orang terdekat.
                </p>

            </div>

        </div>

    </section>

</div>

@endsection