<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fabian & Naifa | Wedding Celebration</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            /* Palette Coastal Blue, Cream & Sand Gradient */
            --bg-cream: #F7F3EB;
            --bg-sand: #EAE1D0;
            --bg-seafoam: #C0D6D8;
            --blue-ocean: #3E5F7B;
            --blue-dark: #22374A;
            --text-blue: #2E455A;
            --text-muted: #586F83;
            --gold-accent: #C39D53;

            --font-cursive: 'Great Vibes', cursive;
            --font-serif: 'Cormorant Garamond', serif;
            --font-sans: 'Montserrat', sans-serif;

            --radius-pill: 50px;
            --shadow-soft: 0 12px 35px rgba(34, 55, 74, 0.12);
            --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
    font-family: var(--font-sans);
    color: var(--text-blue);
    margin: 0;
    padding: 0;
    min-height: 100vh;
    /* Latar Belakang Gradasi Soft Cream - Seafoam khas Pernikahan */
    background: linear-gradient(135deg, #fdfbf7 0%, #e8f0ed 50%, #f7f3ec 100%);
    background-attachment: fixed;
    line-height: 1.7;
    overflow-x: hidden;
    position: relative;
}

/* Container untuk animasi elemen bergerak */
.bg-animation-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none; /* Supaya tombol & kartu tetap bisa diklik */
    z-index: 0;
    overflow: hidden;
}

/* Style umum untuk elemen kelopak mawar / daun */
.petal {
    position: absolute;
    top: -10%;
    background: radial-gradient(circle, rgba(255, 240, 243, 0.8) 0%, rgba(240, 215, 220, 0.6) 100%);
    border-radius: 150% 0 150% 0;
    filter: blur(0.5px) drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.05));
    animation: floatDown linear infinite;
}

/* Animasi Gerakan Jatuh & Meliuk Halus */
@keyframes floatDown {
    0% {
        transform: translateY(0) rotate(0deg) translateX(0);
        opacity: 0;
    }
    10% {
        opacity: 0.8;
    }
    90% {
        opacity: 0.8;
    }
    100% {
        transform: translateY(110vh) rotate(720deg) translateX(80px);
        opacity: 0;
    }
}

/* Variasi Ukuran, Posisi, dan Kecepatan Elemen Bergerak */
.petal:nth-child(1) { left: 10%; width: 18px; height: 24px; animation-duration: 12s; animation-delay: 0s; }
.petal:nth-child(2) { left: 25%; width: 14px; height: 18px; animation-duration: 16s; animation-delay: 2s; background: rgba(220, 235, 228, 0.7); } /* Sentuhan daun hijau */
.petal:nth-child(3) { left: 40%; width: 22px; height: 28px; animation-duration: 14s; animation-delay: 4s; }
.petal:nth-child(4) { left: 65%; width: 16px; height: 20px; animation-duration: 18s; animation-delay: 1s; }
.petal:nth-child(5) { left: 80%; width: 20px; height: 26px; animation-duration: 11s; animation-delay: 3s; background: rgba(220, 235, 228, 0.7); }
.petal:nth-child(6) { left: 92%; width: 15px; height: 22px; animation-duration: 15s; animation-delay: 5s; }

        /* Slawir Transparan di Background Samping */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: -10%;
            width: 120%;
            height: 100%;
            background: radial-gradient(ellipse at center, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0) 70%);
            pointer-events: none;
            z-index: 0;
        }

        .container {
            max-width: 480px;
            margin: 0 auto;
            padding: 0 1.2rem;
            position: relative;
            z-index: 5;
        }

        /* ELEMEN BUNGAN MAWAR PUTIH BERKUMPULAN (BUNCH) */
        /* Container Bunga Atas & Bawah */
/* Atur container bunga agar fleksibel dan tidak membatasi ukuran gambar */
.white-rose-top,
.white-rose-bottom {
    width: 100%;
    height: auto; /* Biarkan tinggi menyesuaikan proporsi gambar */
    display: flex;
    justify-content: center;
    align-items: center;
    pointer-events: none;
    overflow: visible;
}

/* 2. MAWAR ATAS (Melebar Penuh Ke Sudut Kartu) */
.white-rose-top {
    width: calc(100% + 3rem); /* Menarik bunga keluar melebihi padding kanan-kiri card */
    margin-left: -1.5rem;
    margin-right: -1.5rem;
    margin-top: 0;
    margin-bottom: 1.5rem;
}

.white-rose-top img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}
/* 3. MAWAR BAWAH */
.white-rose-bottom {
    width: calc(100% + 3rem);
    margin-left: -1.5rem;
    margin-right: -1.5rem;
    margin-bottom: -1.5rem; /* Menempel ke pinggir paling bawah card */
    margin-top: 1.5rem;
}

.white-rose-bottom img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}

/* Bikin gambar mawar tampil PENUH melebar memenuhi kartu */
.white-rose-top img,
.white-rose-bottom img {
    width: 100%; /* Memenuhi lebar kartu */
    height: auto; /* Menjaga agar rasio bunga tidak gepeng */
    display: block;
    object-fit: cover;
}

/* Atur container mawar tengah agar fleksibel */
.white-rose-garland {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 1.5rem 0; /* Memberi jarak atas & bawah yang pas dari teks dan foto */
}

/* Memperbesar gambar mawar tengah */
.white-rose-garland img,
.rose-garland-img {
    width: 90% !important; /* Melebarkan gambar hingga 90% lebar kartu */
    max-width: 450px;       /* Mencegah gambar terlalu raksasa di layar PC */
    height: auto !important; /* Menjaga rasio bunga agar tidak gepeng */
    display: block;
    margin: 0 auto;
    filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.06)); /* Efek bayangan lembut */
}

        /* Pita Aesthetic Frame */
        .ribbon-banner {
            display: inline-block;
            position: relative;
            padding: 4px 20px;
            margin: 10px 0;
            background: linear-gradient(90deg, transparent 0%, rgba(195, 157, 83, 0.25) 50%, transparent 100%);
            color: var(--blue-dark);
            font-family: var(--font-serif);
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Typography */
        h1, h2, h3 {
            font-family: var(--font-cursive);
            color: var(--blue-dark);
            font-weight: 400;
        }

        h1 {
            font-size: 4.2rem;
            margin-bottom: 0.2rem;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
        }

        h2 {
            font-size: 3.2rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        h3 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }

        p {
            color: var(--text-muted);
            margin-bottom: 1rem;
            font-size: 0.9rem;
            font-family: var(--font-serif);
        }

        .serif-title {
            font-family: var(--font-serif);
            letter-spacing: 3px;
            color: var(--blue-ocean);
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        section {
            padding: 3.5rem 0;
        }

        /* Glass Cards */
        /* 1. KARTU UTAMA & BACKGROUND TEXTURE */
.card {
    position: relative;
    padding: 0 1.5rem 1.5rem 1.5rem; /* Padding atas dibuat 0 agar bunga menempel sempurna */
    border-radius: 20px;
    overflow: hidden; /* Memotong bunga agar melengkung rapi mengikuti sudut card */
    
    /* Background Motif Floral Transparan Mewah */
    background-color: #fdfbf7;
    background-image: radial-gradient(#d4c5b9 0.75px, transparent 0.75px), radial-gradient(#d4c5b9 0.75px, #fdfbf7 0.75px);
    background-size: 30px 30px;
    background-position: 0 0, 15px 15px;
}

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Arch Photo */
        .arch-photo-container {
            width: 200px;
            height: 280px;
            margin: 1rem auto;
            border-radius: 100px;
            border: 4px solid #FFFFFF;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(34, 55, 74, 0.18);
            position: relative;
        }

        .arch-photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Amplop Estetik / Envelope Container */
        .envelope-card {
            background: linear-gradient(135deg, #F5EFE6 0%, #E2ECED 100%);
            border: 2px dashed rgba(62, 95, 123, 0.3);
            border-radius: 20px;
            padding: 1.5rem;
            margin: 1.2rem 0;
            position: relative;
        }

        .envelope-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--blue-ocean);
            color: #fff;
            padding: 2px 14px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-family: var(--font-serif);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 28px;
            background-color: var(--blue-ocean);
            color: #FFFFFF !important;
            border: none;
            border-radius: var(--radius-pill);
            font-family: var(--font-serif);
            font-size: 0.9rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(62, 95, 123, 0.25);
        }

        .btn:hover {
            background-color: var(--blue-dark);
            transform: translateY(-2deg);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--blue-ocean);
            color: var(--blue-ocean) !important;
        }

        .btn-outline:hover {
            background-color: var(--blue-ocean);
            color: #FFFFFF !important;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-family: var(--font-serif);
            color: var(--blue-dark);
            margin-bottom: 0.4rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid rgba(88, 111, 131, 0.3);
            border-radius: 16px;
            font-family: var(--font-serif);
            font-size: 0.95rem;
            background-color: rgba(255, 255, 255, 0.85);
            color: var(--text-blue);
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--blue-ocean);
            background-color: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(62, 95, 123, 0.12);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .radio-group {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
            flex-wrap: wrap;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            accent-color: var(--blue-ocean);
        }

        .radio-option label {
            cursor: pointer;
            margin-bottom: 0;
            color: var(--text-blue);
        }

        /* Header Navigation */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 1rem 0;
            transition: var(--transition);
        }

        header.scrolled {
            background-color: rgba(247, 243, 241, 0.92);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 480px;
            margin: 0 auto;
            padding: 0 1.2rem;
        }

        .logo {
            font-family: var(--font-cursive);
            font-size: 1.8rem;
            color: var(--blue-dark);
        }

        .mobile-menu {
            font-size: 1.2rem;
            cursor: pointer;
            color: var(--blue-dark);
        }

        /* Hero */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            padding-top: 4rem;
        }

        .guest-name {
            font-family: var(--font-cursive);
            font-size: 2.3rem !important;
            color: var(--blue-dark) !important;
            margin-top: 0.3rem;
        }

        /* Countdown Grid */
        .countdown-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-top: 1rem;
        }

        .count-box {
            background: linear-gradient(180deg, rgba(255,255,255,0.8) 0%, rgba(220, 233, 235, 0.6) 100%);
            border: 1px solid rgba(88, 111, 131, 0.2);
            padding: 10px 4px;
            border-radius: 16px;
            text-align: center;
        }

        .count-box .num {
            font-family: var(--font-serif);
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--blue-dark);
        }

        .count-box .label {
            font-size: 0.65rem;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        /* QR Code Frame */
        .qr-container {
            background: linear-gradient(165deg, rgba(247, 243, 235, 0.95) 0%, rgba(200, 217, 219, 0.9) 100%);
            border-radius: 28px;
            padding: 1.5rem;
            box-shadow: var(--shadow-soft);
            border: 1.5px solid rgba(255, 255, 255, 0.85);
            text-align: center;
            position: relative;
        }

        .qr-code {
            width: 180px;
            height: 180px;
            margin: 1rem auto;
            background: #FFFFFF;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            border: 1px solid rgba(88, 111, 131, 0.2);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .qr-code img, .qr-code svg {
            width: 100%;
            height: 100%;
        }

        /* Wishes List */
        .wishes-list {
            margin-top: 1.5rem;
            max-height: 280px;
            overflow-y: auto;
            text-align: left;
        }

        .wish-item {
            margin-bottom: 0.8rem;
            padding: 1rem;
            background-color: rgba(255, 255, 255, 0.75);
            border-radius: 16px;
            border: 1px solid rgba(88, 111, 131, 0.15);
        }

        .wish-author {
            font-family: var(--font-serif);
            font-size: 1rem;
            font-weight: 600;
            color: var(--blue-dark);
            margin-bottom: 0.2rem;
        }

        .wish-message {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-family: var(--font-serif);
        }

        /* Footer */
        footer {
            background-color: var(--blue-dark);
            color: #FFFFFF;
            padding: 3.5rem 0 6rem;
            text-align: center;
            border-radius: 35px 35px 0 0;
            position: relative;
            overflow: hidden;
        }

        footer h3 {
            color: #FFFFFF;
        }

        footer p, .copyright p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
        }

        .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 1rem 0;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.85rem;
            font-family: var(--font-serif);
        }

        /* Audio Control Button */
        .audio-control-btn {
            position: fixed;
            bottom: 80px; 
            right: 20px; 
            z-index: 1050; 
            background-color: var(--blue-ocean); 
            color: #FFFFFF;
            border: none;
            border-radius: 50%; 
            width: 45px; 
            height: 45px; 
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(34, 55, 74, 0.3); 
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Bottom Floating Nav */
        .bottom-nav {
            position: fixed;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 30px);
            max-width: 420px;
            background: rgba(34, 55, 74, 0.88);
            backdrop-filter: blur(12px);
            border-radius: 30px;
            padding: 10px 15px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 999;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .bottom-nav a {
            color: #FFFFFF;
            font-size: 1.05rem;
            opacity: 0.7;
            transition: var(--transition);
        }

        .bottom-nav a:hover {
            opacity: 1;
            color: var(--bg-seafoam);
        }

        /* Pop-up Gradasi Estetik */
        .wedding-notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            background: linear-gradient(145deg, #F7F3EB 0%, #D2E4E6 100%);
            color: var(--text-blue);
            padding: 1.5rem;
            border-radius: 28px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
            z-index: 2000;
            text-align: center;
            max-width: 380px;
            width: 90%;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid rgba(255, 255, 255, 0.9);
            overflow: hidden;
        }

        .wedding-notification.show {
            transform: translate(-50%, -50%) scale(1);
        }

        .notification-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(34, 55, 74, 0.55);
            backdrop-filter: blur(5px);
            z-index: 1999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
        }

        .notification-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .alert {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 12px;
            display: none;
            font-size: 0.8rem;
            font-family: var(--font-serif);
        }

        .alert-success {
            background-color: #E2EFCB;
            color: #2D5A27;
        }

        .alert-error {
            background-color: #FCE8E6;
            color: #C5221F;
        }

        .ornament-divider {
            color: var(--blue-ocean);
            font-size: 1rem;
            letter-spacing: 6px;
            margin: 0.5rem 0;
            opacity: 0.75;
        }
    </style>
</head>
<body>

    <!-- ELEMEN BACKGROUND BERGERAK (Floating Petals) -->
    <div class="bg-animation-container">
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
        <div class="petal"></div>
    </div>

    <header id="header">
        <div class="nav-container">
            <div class="logo">Fabian & Naifa</div>
            <div class="mobile-menu" id="mobileMenu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content fade-in">
                <div class="card">
                    <!-- Buket Mawar Putih Lebat Atas -->
                    <div class="white-rose-top">
    <img src="{{ asset('images/mawar-putih-atas.png') }}" class="rose-img" alt="White Rose Decoration">
</div>
                    
                    <div class="ribbon-banner">🎀 The Wedding Of 🎀</div>
                    
                    <h1>Fabian & Naifa</h1>
                    
                    <div class="ornament-divider">❀ ── ❁ ── ❀</div>
                    
                    <div class="envelope-card">
                        <div class="envelope-badge"><i class="fas fa-envelope-open-text"></i> Special Invitation</div>
                        <p style="margin-bottom: 0.2rem; font-size: 0.8rem;">To Our Honored Guest:</p>
                        <p class="guest-name">{{ $guest->name }}</p>
                    </div>

                    <p style="font-style: italic;">We request the pleasure of your company to celebrate our marriage.</p>
                    
                    <!-- Rangkaian Bunga Mawar Tengah -->
                    <div class="white-rose-garland">
    <img src="{{ asset('images/mawar-putih-tengah.png') }}" class="rose-garland-img" alt="Rose Garland">
</div>

                    <div class="arch-photo-container">
                        <img src="{{ asset('images/FN.png') }}" alt="Fabian & Naifa">
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.8rem; margin-top: 1.5rem;">
                        <a href="#about" class="btn"><i class="fa-regular fa-envelope-open"></i> Open Invitation</a>
                        <a href="#rsvp" class="btn btn-outline">Send RSVP</a>
                    </div>
                    
                    <!-- Buket Mawar Putih Lebat Bawah -->
                    <!-- MAWAR BAWAH (Dipasang di bawah tombol) -->
    <div class="white-rose-bottom">
        <img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="White Rose Decoration Bottom">
    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container">
            <h2 class="fade-in">Our Love Story</h2>
            <div class="card fade-in">
                <div class="white-rose-top"></div>
                
                <div class="ribbon-banner">🎗️ Endless Love 🎗️</div>
                <h3>So This Is Love...</h3>
                <p>Our journey began with chance encounters and shared laughter, slowly weaving a tapestry of memories that became the fabric of our love story.</p>
                <p>As we stand on the brink of forever, we want you to be a part of our next chapter. Join us as we exchange vows and promise each other a lifetime of adventures.</p>
                
                <div class="arch-photo-container" style="width: 180px; height: 240px;">
                    <img src="{{ asset('images/FN.png') }}" alt="Fabian & Haifa">
                </div>

                <div class="white-rose-bottom"></div>
            </div>
        </div>
    </section>

    <section class="details" id="details">
        <div class="container">
            <h2 class="fade-in">Wedding Details</h2>
            
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div class="card fade-in">
                    <div class="white-rose-top"></div>
                    <div style="font-size: 1.6rem; color: var(--blue-ocean); margin-bottom: 0.3rem;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Location</h3>
                    <p><strong>SMK Telkom Purwokerto</strong></p>
                    <p style="font-size: 0.82rem;">Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, South Purwokerto District, Banyumas Regency, Central Java 53141</p>
                    <a href="https://maps.app.goo.gl/bDu22rrdEUnayUDw5" target="_blank" class="btn" style="margin-top: 0.5rem;">
                        <i class="fas fa-map-marked-alt"></i> Open in Google Maps
                    </a>
                    <div class="white-rose-bottom"></div>
                </div>

                <div class="card fade-in">
                    <div class="white-rose-top"></div>
                    <div style="font-size: 1.6rem; color: var(--blue-ocean); margin-bottom: 0.3rem;">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <h3>Date & Time</h3>
                    <p><strong>Monday, December 8th, 2025</strong></p>
                    <p style="font-size: 0.85rem;">Ceremony begins at 7:30 - 9:00 AM</p>

                    <div id="countdown" style="margin-top: 1rem; padding-top: 1rem; border-top: 1px dashed rgba(88, 111, 131, 0.3);">
                        <p class="serif-title" style="margin-bottom: 0.5rem;">Counting Down To Our Big Day</p>
                        
                        <div class="countdown-grid">
                            <div class="count-box"><div class="num" id="days">0</div><div class="label">Days</div></div>
                            <div class="count-box"><div class="num" id="hours">0</div><div class="label">Hours</div></div>
                            <div class="count-box"><div class="num" id="minutes">0</div><div class="label">Minutes</div></div>
                            <div class="count-box"><div class="num" id="seconds">0</div><div class="label">Seconds</div></div>
                        </div>
                    </div>
                    <div class="white-rose-bottom"></div>
                </div>

                <div class="card fade-in">
                    <div class="white-rose-top"></div>
                    <div style="font-size: 1.6rem; color: var(--blue-ocean); margin-bottom: 0.3rem;">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h3>Attire</h3>
                    <p><strong>Traditional Formal Attire</strong></p>
                    <p style="font-size: 0.85rem;">Surakarta/Solo Style</p>
                    <div class="white-rose-bottom"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="rsvp" id="rsvp">
        <div class="container">
            <h2 class="fade-in">Join Our Day</h2>
            <div class="card fade-in">
                <div class="white-rose-top"></div>
                <div id="rsvpAlert" class="alert"></div>
                
                <form id="weddingRsvp">
                    <input type="hidden" id="guestId" value="1">
                    
                    <div class="form-group">
                        <label for="guestEmail">Your Email *</label>
                        <input type="email" id="guestEmail" class="form-control" required placeholder="your@email.com">
                        <small style="color: var(--text-muted); font-size: 0.75rem; font-family: var(--font-serif);">We'll send you confirmation and wedding day reminder</small>
                    </div>

                    <div class="form-group">
                        <label>Will you be attending? *</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="attendingYes" name="attendance" value="attending" required>
                                <label for="attendingYes">Yes, I'll be there!</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="attendingNo" name="attendance" value="not_attending">
                                <label for="attendingNo">Sorry, I can't make it</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="totalGuests">Number of Guests (max: 5) *</label>
                        <input type="number" id="totalGuests" class="form-control" min="1" max="5" value="1" required>
                    </div>

                    <button type="submit" class="btn" style="width: 100%; margin-top: 0.5rem;">
                        Submit RSVP
                    </button>
                </form>
                <div class="white-rose-bottom"></div>
            </div>
        </div>
    </section>

    <section class="qr-section" id="qr">
        <div class="container">
            <h2 class="fade-in">Digital Invitation</h2>
            <div class="qr-container fade-in">
                <div class="white-rose-top"></div>
                <div class="ribbon-banner">🎀 Check-in Pass 🎀</div>
                <div class="qr-code">
                    {!! $qrCode !!}
                </div>
                <div>
                    <p style="font-size: 0.85rem;">Your personal QR code for event check-in. Please present this code upon arrival.</p>
                    <p style="margin-top: 0.5rem;"><strong>Guest Code:</strong> {{ $guest->code }}</p>
                    <a href="/qr/{{ $guest->code }}" class="btn" style="margin-top: 1rem;">
                        <i class="fas fa-expand"></i> View Full QR Code
                    </a>
                </div>
                <div class="white-rose-bottom"></div>
            </div>
        </div>
    </section>

    <section class="wishes" id="wishes">
        <div class="container">
            <h2 class="fade-in">Messages & Wishes</h2>
            
            <div class="card fade-in">
                <div class="white-rose-top"></div>
                <div id="wishAlert" class="alert"></div>
                <form id="wishForm">
                    <div class="form-group">
                        <label for="wishName">Your Name *</label>
                        <input type="text" id="wishName" class="form-control" value="{{ $guest->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="wishMessage">Your Message *</label>
                        <textarea id="wishMessage" class="form-control" required placeholder="Share your well wishes for the couple"></textarea>
                    </div>
                    <button type="submit" class="btn" style="width: 100%;">Send Message</button>
                </form>

                <div class="wishes-list" id="wishesList">
                    <div class="wish-item">
                        <div class="wish-author">John Doe</div>
                        <div class="wish-message">Congratulations on your wedding! Wishing you a lifetime of love and happiness.</div>
                    </div>
                    <div class="wish-item">
                        <div class="wish-author">Jane Smith</div>
                        <div class="wish-message">May your marriage be filled with all the right ingredients: love, humor, understanding, and patience.</div>
                    </div>
                </div>
                <div class="white-rose-bottom"></div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="white-rose-bottom"></div>
            <h3>Fabian & Naifa</h3>
            <p>Thank you for being part of our special day!</p>
            
            <ul class="footer-links">
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">Our Story</a></li>
                <li><a href="#details">Details</a></li>
                <li><a href="#rsvp">RSVP</a></li>
            </ul>

            <div class="copyright">
                <p>&copy; 2025 Fabian & Naifa Wedding. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Audio Control -->
    <audio id="background-music" src="{{ asset('audio/lagunikahan.mpeg') }}" loop preload="auto"></audio>
    <button id="play-pause-button" class="audio-control-btn" title="Kontrol Musik Latar">
        <i class="fas fa-play"></i> 
    </button>

    <!-- Bottom Nav Bar -->
    <div class="bottom-nav">
        <a href="#hero"><i class="fa-solid fa-house"></i></a>
        <a href="#about"><i class="fa-solid fa-heart"></i></a>
        <a href="#details"><i class="fa-solid fa-calendar-check"></i></a>
        <a href="#rsvp"><i class="fa-solid fa-clipboard-check"></i></a>
        <a href="#qr"><i class="fa-solid fa-qrcode"></i></a>
        <a href="#wishes"><i class="fa-solid fa-comment-dots"></i></a>
    </div>

    <!-- Pop-up Modal Bunga Mawar Berkumpulan -->
    <div class="notification-overlay" id="notificationOverlay"></div>
    <div class="wedding-notification" id="weddingNotification">
        <div class="white-rose-top" style="height: 100px;"></div>
        <div class="ribbon-banner">✨ Special Announcement ✨</div>
        <h2 style="font-size: 2.3rem; margin-bottom: 0.5rem;">The Wedding Has Begun! 🎉</h2>
        <p>Fabian & Naifa's special moment is starting now!</p>
        <button class="btn" style="margin-top: 1rem;" onclick="closeNotification()">Celebrate With Us!</button>
        <div class="white-rose-bottom" style="height: 100px;"></div>
    </div>

    <script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    window.addEventListener('scroll', function() {
        const header = document.getElementById('header');
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const fadeElements = document.querySelectorAll('.fade-in');
        const fadeInOnScroll = function() {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('visible');
                }
            });
        };
        
        fadeInOnScroll();
        window.addEventListener('scroll', fadeInOnScroll);

        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Audio
        const audio = document.getElementById('background-music');
        const playPauseButton = document.getElementById('play-pause-button');
        
        audio.volume = 0.4;
        function togglePlayPause() {
            if (audio.paused) {
                audio.play()
                    .then(() => {
                        playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
                    })
                    .catch(error => {
                        console.log('Playback error:', error);
                    });
            } else {
                audio.pause();
                playPauseButton.innerHTML = '<i class="fas fa-play"></i>';
            }
        }
        playPauseButton.addEventListener('click', togglePlayPause);
        
        document.body.addEventListener('click', function attemptPlayOnce() {
            if (audio.paused) {
                audio.play()
                    .then(() => {
                        playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
                    })
                    .catch(e => console.log("Play error:", e));
            }
            document.body.removeEventListener('click', attemptPlayOnce);
        });

        // Countdown Timer
        let notificationShown = false;
        function updateCountdown() {
            const weddingDate = new Date('2025-12-08T07:30:00').getTime();
            const now = new Date().getTime();
            const distance = weddingDate - now;
            
            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById('days').textContent = days;
                document.getElementById('hours').textContent = hours;
                document.getElementById('minutes').textContent = minutes;
                document.getElementById('seconds').textContent = seconds;
            } else {
                document.getElementById('countdown').innerHTML = '<p style="font-weight: 600; color: var(--blue-dark);">The Wedding Day is Here! 🎉</p>';
                
                if (!notificationShown) {
                    showWeddingNotification();
                    notificationShown = true;
                }
            }
        }

        function showWeddingNotification() {
            const hasRSVP = localStorage.getItem('hasRSVP') === 'true';
            if (!hasRSVP) return;
            
            const overlay = document.getElementById('notificationOverlay');
            const notification = document.getElementById('weddingNotification');
            
            overlay.classList.add('show');
            notification.classList.add('show');
            
            if ('Notification' in window && Notification.permission === 'granted') {
                new Notification('🎉 Wedding Started!', {
                    body: 'Fabian & Naifa\'s wedding ceremony has begun!',
                    icon: 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=200',
                    tag: 'wedding-notification'
                });
            }
            
            if (!audio.paused) {
                audio.volume = 0.6;
            }
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);

        // RSVP Form
        document.getElementById('weddingRsvp').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const guestId = document.getElementById('guestId').value;
            const email = document.getElementById('guestEmail').value;
            const attendance = document.querySelector('input[name="attendance"]:checked');
            const totalGuests = document.getElementById('totalGuests').value;
            
            if (!attendance) {
                alert('Please select attendance option');
                return;
            }

            try {
                const response = await fetch('/rsvp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        guest_id: guestId,
                        email: email,
                        attendance: attendance.value,
                        total_guests: totalGuests
                    })
                });
                const data = await response.json();
                
                const alertBox = document.getElementById('rsvpAlert');
                if (data.success) {
                    if (attendance.value === 'attending') {
                        localStorage.setItem('hasRSVP', 'true');
                        if ('Notification' in window && Notification.permission === 'default') {
                            Notification.requestPermission();
                        }
                    }
                    
                    alertBox.className = 'alert alert-success';
                    alertBox.textContent = 'RSVP submitted successfully!';
                    alertBox.style.display = 'block';
                    alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                } else {
                    alertBox.className = 'alert alert-error';
                    alertBox.textContent = 'Failed to submit RSVP.';
                    alertBox.style.display = 'block';
                }

                setTimeout(() => { alertBox.style.display = 'none'; }, 5000);
            } catch (error) {
                console.error('Error:', error);
                const alertBox = document.getElementById('rsvpAlert');
                alertBox.className = 'alert alert-error';
                alertBox.textContent = 'An error occurred.';
                alertBox.style.display = 'block';
                setTimeout(() => { alertBox.style.display = 'none'; }, 5000);
            }
        });

        // Wish Form
        document.getElementById('wishForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const name = document.getElementById('wishName').value;
            const message = document.getElementById('wishMessage').value;

            try {
                const response = await fetch('/wishes', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ name: name, message: message })
                });
                const data = await response.json();

                if (data.success) {
                    const wishesList = document.getElementById('wishesList');
                    const newWish = document.createElement('div');
                    newWish.className = 'wish-item';
                    newWish.innerHTML = `
                        <div class="wish-author">${name}</div>
                        <div class="wish-message">${message}</div>
                    `;
                    wishesList.prepend(newWish);
                    
                    document.getElementById('wishForm').reset();
                    
                    const alertBox = document.getElementById('wishAlert');
                    alertBox.className = 'alert alert-success';
                    alertBox.textContent = data.message;
                    alertBox.style.display = 'block';

                    setTimeout(() => { alertBox.style.display = 'none'; }, 5000);
                } else {
                    const alertBox = document.getElementById('wishAlert');
                    alertBox.className = 'alert alert-error';
                    alertBox.textContent = 'Failed to submit wish.';
                    alertBox.style.display = 'block';
                    setTimeout(() => { alertBox.style.display = 'none'; }, 5000);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred.');
            }
        });
    });

    function closeNotification() {
        document.getElementById('notificationOverlay').classList.remove('show');
        document.getElementById('weddingNotification').classList.remove('show');
    }
    </script>
</body>
</html>