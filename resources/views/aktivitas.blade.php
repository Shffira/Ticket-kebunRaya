@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert-success">
        🌿 {{ session('success') }}
    </div>
@endif
<style>
.alert-success {
    max-width: 1000px;
    margin: 20px auto;
    padding: 15px 20px;
    background: #e8f5d0;
    color: #294731;
    border: 1px solid #c8dda5;
    border-radius: 12px;
    font-weight: 600;
}
</style>
<div class="main">

    <div class="hero">

        <div class="hero-leaf">
            🌱
        </div>

        <h1>
            Aktivitas di
            <br>
            <span>Kebun Raya</span>
        </h1>

        <p>
            Temukan berbagai kegiatan menarik dan pengalaman
            yang bisa kamu nikmati bersama keluarga maupun teman.
        </p>

    </div>

</div>

@endsection