@extends('layouts.app')

@section('content')

<main class="main">

    <div class="brand">
        <div class="brand-icon">🌿</div>

        <h1>KEBUN RAYA BOGOR</h1>

        <p>
            Nikmati pengalaman menyenangkan di tengah keindahan alam.
        </p>
    </div>

    <div class="date-card">

    <h2>Pilih Tanggal Kunjungan</h2>

    <form action="{{ route('tiket.pilih') }}" method="GET">

        <input
            type="date"
            name="tanggal_kunjungan"
            class="date-input"
            min="{{ date('Y-m-d') }}"
            required
        >

        <button type="submit" class="continue-btn">
            Lanjutkan
        </button>

    </form>

</div>

</main>

@endsection