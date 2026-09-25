<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Kebun Raya Bogor' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #0b1110;
            color: #f4f1e9;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 82px;
            padding: 0 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #0b1110;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        .logo {
            text-decoration: none;
            color: #d8f5c8;
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            line-height: .8;
            font-weight: 700;
        }

        .logo small {
            display: block;
            font-family: 'DM Sans', sans-serif;
            font-size: 10px;
            letter-spacing: 3px;
            margin-top: 6px;
            color: #8fc58b;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-menu a {
            color: #eeeeeb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-menu a:hover {
            color: #b7eb9f;
        }
        .nav-menu a.active {
    color: #a9db8c;
    position: relative;
}

.nav-menu a.active::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: -8px;
    height: 2px;
    background: #a9db8c;
    border-radius: 10px;
}
        .login-btn {
            padding: 11px 23px;
            border: 1px solid #71806e;
            border-radius: 9px;
        }

        .login-btn:hover {
            background: #d8f5c8;
            color: #0b1110 !important;
        }

        /* =========================
           BOTANICAL PATTERN
        ========================= */

        .pattern {
            height: 86px;

            background-color: #101714;

            background-image:
                radial-gradient(
                    circle at 20% 50%,
                    rgba(166, 210, 124, .35) 0 2px,
                    transparent 3px
                ),
                radial-gradient(
                    circle at 70% 30%,
                    rgba(208, 153, 76, .35) 0 2px,
                    transparent 3px
                );

            background-size: 45px 45px;
            border-bottom: 1px solid rgba(255,255,255,.05);

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pattern span {
            font-size: 28px;
            letter-spacing: 24px;
            color: rgba(205, 221, 190, .45);
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            min-height: calc(100vh - 168px);
            padding: 70px 20px 100px;

            background:
                radial-gradient(
                    circle at 50% 10%,
                    rgba(62, 105, 64, .25),
                    transparent 35%
                ),
                #0b1110;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            text-align: center;
            max-width: 800px;
            margin: auto;
        }

        .hero-leaf {
            font-size: 43px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(38px, 6vw, 68px);
            line-height: 1;
            letter-spacing: -1px;
            color: #f4f1e9;
        }

        .hero h1 span {
            color: #a9db8c;
        }

        .hero p {
            max-width: 580px;
            margin: 20px auto 0;
            color: #9ba69e;
            font-size: 15px;
            line-height: 1.8;
        }

        /* =========================
           DATE CARD
        ========================= */

        .booking-card {
            width: min(650px, 100%);
            margin: 50px auto 0;

            padding: 30px;

            background: rgba(25, 34, 30, .95);

            border: 1px solid rgba(176, 211, 158, .16);

            border-radius: 20px;

            box-shadow:
                0 25px 80px rgba(0,0,0,.35);
        }

        .booking-label {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #9fc88b;
            margin-bottom: 12px;
        }

        .booking-title {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            margin-bottom: 25px;
        }

        .date-input {
            width: 100%;
            height: 55px;

            padding: 0 16px;

            border-radius: 10px;

            border: 1px solid #59665d;

            background: #0e1512;

            color: #f5f5f0;

            font-family: inherit;
            font-size: 14px;

            outline: none;
        }

        .date-input:focus {
            border-color: #9bc985;
            box-shadow: 0 0 0 3px rgba(155,201,133,.1);
        }

        .continue-btn {
            width: 100%;
            height: 53px;

            margin-top: 15px;

            border: none;
            border-radius: 10px;

            background: #b6e49a;
            color: #122016;

            font-family: inherit;
            font-weight: 700;
            font-size: 14px;

            cursor: pointer;

            transition: .25s;
        }

        .continue-btn:hover {
            background: #d0f1bb;
            transform: translateY(-2px);
        }

        /* =========================
           INFO
        ========================= */

        .quick-info {
            width: min(650px, 100%);
            margin: 22px auto 0;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 10px;
        }

        .info-box {
            padding: 15px;

            text-align: center;

            background: rgba(255,255,255,.025);

            border: 1px solid rgba(255,255,255,.06);

            border-radius: 12px;
        }

        .info-box strong {
            display: block;
            color: #cce6bb;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .info-box span {
            color: #7f8b83;
            font-size: 11px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            padding: 35px 8%;

            background: #080d0c;

            border-top: 1px solid rgba(255,255,255,.06);

            display: flex;
            justify-content: space-between;

            color: #78837d;

            font-size: 12px;
        }

        .footer-brand {
            color: #cce4bd;
            font-family: 'Playfair Display', serif;
            font-size: 18px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media(max-width: 700px) {

            .navbar {
                padding: 0 20px;
            }

            .nav-menu {
                gap: 10px;
            }

            .nav-menu a:not(.login-btn) {
                display: none;
            }

            .main {
                padding-top: 50px;
            }

            .booking-card {
                padding: 22px;
                margin-top: 35px;
            }

            .quick-info {
                grid-template-columns: 1fr;
            }

            .footer {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">

    <a href="{{ route('home') }}" class="logo">
        KEBUN
        <small>RAYA BOGOR</small>
    </a>

    <nav class="nav-menu">

        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Beranda
        </a>

        <a href="{{ route('aktivitas') }}"
           class="{{ request()->routeIs('aktivitas') ? 'active' : '' }}">
            Aktivitas
        </a>

        <a href="{{ route('syarat') }}"
           class="{{ request()->routeIs('syarat') ? 'active' : '' }}">
            Syarat & Ketentuan
        </a>

        <a href="#" class="login-btn">
            Login / Register
        </a>

    </nav>

</header>


    <div class="pattern">
        <span>❀ ✦ ❁ ✿ ❀ ✦ ❁ ✿</span>
    </div>


    @yield('content')


    <footer class="footer">

        <div>
            <div class="footer-brand">
                KEBUN RAYA
            </div>

            <p>
                Menjelajahi alam, menciptakan pengalaman.
            </p>
        </div>

        <div>
            © {{ date('Y') }} Ticket Kebun Raya
        </div>

    </footer>

</body>
</html>