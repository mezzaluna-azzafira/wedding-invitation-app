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
            background: linear-gradient(135deg, #fdfbf7 0%, #e8f0ed 50%, #f7f3ec 100%);
            background-attachment: fixed;
            line-height: 1.7;
            overflow-x: hidden;
            position: relative;
        }

        .bg-animation-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .petal {
            position: absolute;
            top: -10%;
            background: radial-gradient(circle, rgba(255, 240, 243, 0.8) 0%, rgba(240, 215, 220, 0.6) 100%);
            border-radius: 150% 0 150% 0;
            filter: blur(0.5px) drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.05));
            animation: floatDown linear infinite;
        }

        @keyframes floatDown {
            0% { transform: translateY(0) rotate(0deg) translateX(0); opacity: 0; }
            10% { opacity: 0.8; }
            90% { opacity: 0.8; }
            100% { transform: translateY(110vh) rotate(720deg) translateX(80px); opacity: 0; }
        }

        .petal:nth-child(1) { left: 10%; width: 18px; height: 24px; animation-duration: 12s; animation-delay: 0s; }
        .petal:nth-child(2) { left: 25%; width: 14px; height: 18px; animation-duration: 16s; animation-delay: 2s; background: rgba(220, 235, 228, 0.7); }
        .petal:nth-child(3) { left: 40%; width: 22px; height: 28px; animation-duration: 14s; animation-delay: 4s; }
        .petal:nth-child(4) { left: 65%; width: 16px; height: 20px; animation-duration: 18s; animation-delay: 1s; }
        .petal:nth-child(5) { left: 80%; width: 20px; height: 26px; animation-duration: 11s; animation-delay: 3s; background: rgba(220, 235, 228, 0.7); }
        .petal:nth-child(6) { left: 92%; width: 15px; height: 22px; animation-duration: 15s; animation-delay: 5s; }

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

        .white-rose-top, .white-rose-bottom {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
            overflow: visible;
        }

        .white-rose-top {
            width: calc(100% + 3rem);
            margin-left: -1.5rem;
            margin-right: -1.5rem;
            margin-top: 0;
            margin-bottom: 1.5rem;
        }

        .white-rose-top img, .white-rose-bottom img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .white-rose-bottom {
            width: calc(100% + 3rem);
            margin-left: -1.5rem;
            margin-right: -1.5rem;
            margin-bottom: -1.5rem;
            margin-top: 1.5rem;
        }

        .white-rose-garland {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1.5rem 0;
        }

        .white-rose-garland img, .rose-garland-img {
            width: 90% !important;
            max-width: 450px;
            height: auto !important;
            display: block;
            margin: 0 auto;
            filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.06));
        }

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

        h1, h2, h3 {
            font-family: var(--font-cursive);
            color: var(--blue-dark);
            font-weight: 400;
        }

        h1 { font-size: 4.2rem; margin-bottom: 0.2rem; text-shadow: 1px 1px 2px rgba(255,255,255,0.8); }
        h2 { font-size: 3.2rem; margin-bottom: 1rem; text-align: center; }
        h3 { font-size: 2.2rem; margin-bottom: 0.5rem; }

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

        section { padding: 3.5rem 0; }

        .card {
            position: relative;
            padding: 0 1.5rem 1.5rem 1.5rem;
            border-radius: 20px;
            overflow: hidden;
            background-color: #fdfbf7;
            background-image: radial-gradient(#d4c5b9 0.75px, transparent 0.75px), radial-gradient(#d4c5b9 0.75px, #fdfbf7 0.75px);
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
            text-align: center;
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

        /* Fitur Bank Card */
        .bank-card {
            background: #ffffff;
            border: 1px solid rgba(88, 111, 131, 0.2);
            border-radius: 16px;
            padding: 1.2rem;
            margin-top: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }

        .bank-number {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--blue-dark);
            letter-spacing: 1.5px;
            margin: 0.5rem 0;
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

        textarea.form-control { min-height: 100px; resize: vertical; }

        .radio-group { display: flex; gap: 1rem; margin-top: 0.5rem; flex-wrap: wrap; }
        .radio-option { display: flex; align-items: center; gap: 0.5rem; accent-color: var(--blue-ocean); }
        .radio-option label { cursor: pointer; margin-bottom: 0; color: var(--text-blue); }

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

        .logo { font-family: var(--font-cursive); font-size: 1.8rem; color: var(--blue-dark); }
        .mobile-menu { font-size: 1.2rem; cursor: pointer; color: var(--blue-dark); }

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

        .qr-code img, .qr-code svg { width: 100%; height: 100%; }

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

        footer {
            background-color: var(--blue-dark);
            color: #FFFFFF;
            padding: 3.5rem 0 6rem;
            text-align: center;
            border-radius: 35px 35px 0 0;
            position: relative;
            overflow: hidden;
        }

        footer h3 { color: #FFFFFF; }
        footer p, .copyright p { color: rgba(255, 255, 255, 0.7); font-size: 0.85rem; }

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

        .bottom-nav a:hover { opacity: 1; color: var(--bg-seafoam); }

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

        .wedding-notification.show { transform: translate(-50%, -50%) scale(1); }

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

        .notification-overlay.show { opacity: 1; visibility: visible; }

        .alert {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 12px;
            display: none;
            font-size: 0.8rem;
            font-family: var(--font-serif);
        }

        .alert-success { background-color: #E2EFCB; color: #2D5A27; }
        .alert-error { background-color: #FCE8E6; color: #C5221F; }

        .ornament-divider {
            color: var(--blue-ocean);
            font-size: 1rem;
            letter-spacing: 6px;
            margin: 0.5rem 0;
            opacity: 0.75;
        }

        /* Beri jarak aman di paling bawah halaman agar tidak tertutup nav */
body {
    padding-bottom: 120px !important;
}

/* Pastikan footer memiliki ruang lebih di bawah */
footer {
    padding-bottom: 80px !important;
}

/* Kunci ukuran QR Code agar tidak meluap keluar kartu */
.qr-code img, 
.qr-code svg {
    max-width: 100% !important;
    height: auto !important;
    display: block;
    margin: 0 auto;
}

/* Khusus merapatkan mawar di bagian Digital Pass / QR */
.qr-container {
    padding-top: 0 !important;
    overflow: hidden !important;
}

.qr-container .white-rose-top {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

.qr-container .white-rose-top img {
    margin-top: -2px !important; /* Mendorong mawar mepet sampai paling atas */
    border-top-left-radius: 20px !important;
    border-top-right-radius: 20px !important;
}
/* Menghilangkan gambar mawar khusus di area footer */
footer .white-rose-top,
footer .white-rose-bottom,
footer img[src*="mawar"] {
    display: none !important;
}
/* Buat footer full memenuhi bagian paling bawah halaman */
body {
    padding-bottom: 0 !important;
}

footer {
    border-radius: 28px 28px 0 0 !important; /* Melengkung hanya di atas, bawahnya lurus */
    margin-bottom: 0 !important;
    padding-bottom: 90px !important; /* Ruang ekstra di dalam footer agar tidak tertutup nav */
    width: 100% !important;
}

body {
    background-image: url('/images/bg-wedding.png') !important;
    background-size: cover !important;
    background-position: center !important;
    background-attachment: fixed !important;
    background-repeat: no-repeat !important;
}

/* ==========================================
   STYLING KHUSUS GALERI FOTO (SAFE & NEAT)
   ========================================== */
.gallery-section {
    width: 100%;
    max-width: 480px; /* Menyesuaikan frame kartu agar presisi */
    margin: 30px auto;
    padding: 20px 15px;
    box-sizing: border-box;
}

.gallery-title {
    text-align: center;
    margin-bottom: 20px;
}

.gallery-title h2 {
    font-family: 'Playfair Display', serif, cursive; /* Menyesuaikan font nikahan */
    font-size: 24px;
    color: #2b3a4a;
    margin: 0;
}

.gallery-title p {
    font-size: 13px;
    color: #7a8b9e;
    margin-top: 4px;
    letter-spacing: 1px;
}

/* Grid Rapi 2 Kolom */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* 2 Kolom sejajar simetris */
    gap: 12px; /* Jarak antar foto */
}

/* Frame Tiap Foto */
.gallery-item {
    position: relative;
    width: 100%;
    padding-top: 100%; /* Membuat bingkai foto otomatis Kotak / Square (1:1) */
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    background-color: #f8f9fa;
    border: 3px solid #ffffff; /* Efek bingkai putih rapi */
}

/* Gambar di dalam frame */
.gallery-item img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Foto otomatis terpotong rapi tanpa melar */
    transition: transform 0.4s ease;
}

/* Efek Zoom Halus Saat Disentuh / Hover */
.gallery-item:hover img {
    transform: scale(1.06);
}

/* ==========================================
   COVER / WELCOME OVERLAY STYLING
   ========================================== */
#welcome-cover {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 99999;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #1a1a1a;
    transition: transform 0.8s ease-in-out, opacity 0.8s ease-in-out;
}

/* Background Blur di Luar Kartu */
.cover-bg-blur {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('/images/foto-cover.jpg'); /* Samakan dengan foto utama */
    background-size: cover;
    background-position: center;
    filter: blur(15px) brightness(0.5);
    transform: scale(1.1); /* Mencegah pinggiran blur putih */
}

/* Kartu Tengah Mobile-Frame */
.cover-card {
    position: relative;
    width: 90%;
    max-width: 420px;
    height: 85vh;
    max-height: 680px;
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0,0,0,0.4);
    display: flex;
    flex-direction: column;
    z-index: 2;
}

/* Foto bagian atas kartu */
.cover-image {
    width: 100%;
    height: 45%;
    overflow: hidden;
}

.cover-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Isi Teks Kartu */
.cover-content {
    padding: 25px 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
    background: #fafafa;
}

.sub-title {
    font-size: 11px;
    letter-spacing: 3px;
    color: #666;
    margin: 0;
}

.couple-name {
    font-family: 'Playfair Display', serif, cursive;
    font-size: 28px;
    color: #1a2b3c;
    margin: 5px 0 15px 0;
}

.dear-text {
    font-size: 13px;
    color: #555;
    margin-bottom: 2px;
}

.guest-name {
    font-size: 18px;
    font-weight: 700;
    color: #1a2b3c;
    margin: 0 0 8px 0;
}

.invitation-text {
    font-size: 12px;
    color: #777;
    line-height: 1.4;
    margin: 0 auto;
    max-width: 80%;
}

/* Tombol Buka Undangan */
.btn-open-invitation {
    background-color: #2b3a4a;
    color: #ffffff;
    border: none;
    padding: 12px 28px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    margin: 15px auto 0 auto;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(43, 58, 74, 0.3);
}

.btn-open-invitation:hover {
    background-color: #1a2530;
    transform: translateY(-2px);
}

/* Class saat sampul dibuka (Menghilang ke atas) */
.cover-hidden {
    transform: translateY(-100%);
    opacity: 0;
    pointer-events: none;
}

/* Container Utama Date & Time */
.date-time-card {
    text-align: center;
    padding: 20px 15px;
}

.calendar-icon {
    font-size: 1.8rem;
    color: #2b3a4a;
    margin-bottom: 10px;
}

.date-title {
    font-family: 'Great Vibes', 'Playfair Display', cursive, serif;
    font-size: 2.2rem;
    color: #2b3a4a;
    margin: 0;
}

.date-subtitle {
    font-size: 1rem;
    color: #2b3a4a;
    margin: 8px 0 4px 0;
}

.ceremony-text {
    font-size: 0.85rem;
    color: #666;
    margin: 0 0 15px 0;
}

.dotted-line {
    border: none;
    border-top: 1px dashed #ccc;
    margin: 20px auto;
    width: 80%;
}

/* Grid 4 Kotak Sejajar */
.countdown-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
    margin-top: 15px;
}

/* Tampilan Tiap Kotak Putih */
.countdown-box {
    background: #ffffff;
    border-radius: 12px;
    padding: 12px 5px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(0, 0, 0, 0.03);
}

.countdown-box .number {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #2b3a4a;
    line-height: 1;
}

.countdown-box .label {
    font-size: 0.75rem;
    color: #666;
    margin-top: 6px;
    font-style: italic;
}

    </style>
</head>
<body>

    <!-- OVERLAY COVER UTAMA -->
<div id="welcome-cover">
    <!-- Background foto besar yang di-blur -->
    <div class="cover-bg-blur"></div>

    <!-- Kartu Utama di Tengah -->
    <div class="cover-card">
        <!-- Foto Sampul Atas -->
        <div class="cover-image">
            <img src="/images/foto-cover.jpg" alt="Fabian & Naifa">
        </div>

        <!-- Konten Undangan -->
        <div class="cover-content">
            <p class="sub-title">PERNIKAHAN</p>
            <h1 class="couple-name">Fabian & Naifa</h1>
            
            <div class="guest-box">
                <p class="dear-text">Dear.</p>
                <h3 class="guest-name">{{ $guest_name ?? 'Nama Tamu' }}</h3>
                <p class="invitation-text">Kami mengundang Anda untuk menghadiri acara Pernikahan kami.</p>
            </div>

            <!-- Tombol Buka Undangan -->
            <button type="button" class="btn-open-invitation" onclick="openInvitation()">
                <i class="fas fa-envelope-open"></i> Buka Undangan
            </button>
        </div>
    </div>
</div>

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
                    
                    <div class="white-rose-bottom">
                        <img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="White Rose Decoration Bottom">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION BIODATA MEMPELAI BARU -->
    <section class="couples" id="couples">
        <div class="container">
            <h2 class="fade-in">The Happy Couple</h2>
            <div class="card fade-in">
                <div class="white-rose-top"><img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top"></div>
                
                <!-- Groom -->
                <div style="margin: 1rem 0;">
                    <div class="arch-photo-container" style="width: 150px; height: 200px;">
                        <img src="{{ asset('images/FN.png') }}" alt="Fabian Profile">
                    </div>
                    <h3 style="font-size: 2.5rem; margin-top: 0.5rem;">Fabian Ahza</h3>
                    <p style="margin-bottom: 0.3rem;"><strong>Putra dari:</strong></p>
                    <p>Bpk. Fathurrahman & Ibu Sarah</p>
                    <a href="https://instagram.com" target="_blank" class="btn btn-outline" style="padding: 6px 16px; font-size: 0.75rem; margin-top: 0.3rem;">
                        <i class="fab fa-instagram"></i> @fabianahza
                    </a>
                </div>

                <div class="ornament-divider" style="margin: 1.5rem 0;">❀ & ❀</div>

                <!-- Bride -->
                <div style="margin: 1rem 0;">
                    <div class="arch-photo-container" style="width: 150px; height: 200px;">
                        <img src="{{ asset('images/FN.png') }}" alt="Naifa Profile">
                    </div>
                    <h3 style="font-size: 2.5rem; margin-top: 0.5rem;">Naifa Az-Zahra</h3>
                    <p style="margin-bottom: 0.3rem;"><strong>Putri dari:</strong></p>
                    <p>Bpk. Ahmad Subagyo & Ibu Maryam</p>
                    <a href="https://instagram.com" target="_blank" class="btn btn-outline" style="padding: 6px 16px; font-size: 0.75rem; margin-top: 0.3rem;">
                        <i class="fab fa-instagram"></i> @naifaazzahra
                    </a>
                </div>

                <div class="white-rose-bottom"><img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom"></div>
            </div>
        </div>
    </section>

    <!-- KODE GALERI FOTO (ISOLATED) -->
<section class="gallery-section">
    <div class="gallery-title">
        <h2>Our Moments</h2>
        <p>Memories of Us</p>
    </div>

    <div class="gallery-grid">
        <div class="gallery-item">
            <img src="/images/foto1.jpg" alt="Gallery Photo 1">
        </div>
        <div class="gallery-item">
            <img src="/images/foto2.jpg" alt="Gallery Photo 2">
        </div>
        <div class="gallery-item">
            <img src="/images/foto3.jpg" alt="Gallery Photo 3">
        </div>
        <div class="gallery-item">
            <img src="/images/foto4.jpg" alt="Gallery Photo 4">
        </div>
        <div class="gallery-item">
            <img src="/images/foto5.jpg" alt="Gallery Photo 5">
        </div>
        <div class="gallery-item">
            <img src="/images/foto6.jpg" alt="Gallery Photo 6">
        </div>
    </div>
</section>

    <section class="about" id="about">
        <div class="container">
            <h2 class="fade-in">Our Love Story</h2>
            <div class="card fade-in">
                <div class="white-rose-top"><img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top"></div>
                
                <div class="ribbon-banner">🎗️ Endless Love 🎗️</div>
                <h3>So This Is Love...</h3>
                <p>Our journey began with chance encounters and shared laughter, slowly weaving a tapestry of memories that became the fabric of our love story.</p>
                <p>As we stand on the brink of forever, we want you to be a part of our next chapter. Join us as we exchange vows and promise each other a lifetime of adventures.</p>
                
                <div class="arch-photo-container" style="width: 180px; height: 240px;">
                    <img src="{{ asset('images/FN.png') }}" alt="Fabian & Naifa">
                </div>

                <div class="white-rose-bottom"><img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom"></div>
            </div>
        </div>
    </section>

    <section class="details" id="details">
    <div class="container">
        <h2 class="fade-in">Wedding Details</h2>
        
        <div style="display: flex; flex-direction: column; gap: 1rem;">

            <!-- KARTU LOKASI / LOCATION -->
<div class="card" style="position: relative; overflow: hidden; text-align: center;">
    
    <!-- Mawar Atas -->
    <div class="white-rose-top" style="margin-top: -2px; padding: 0;">
        <img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top" style="width: 100%; height: auto; border-top-left-radius: 20px; border-top-right-radius: 20px;">
    </div>

    <div style="padding: 10px 20px 20px 20px;">
        <!-- Icon Location -->
        <div style="font-size: 1.8rem; color: var(--blue-ocean); margin-bottom: 0.3rem;">
            <i class="fas fa-map-marker-alt"></i>
        </div>

        <!-- Judul -->
        <h3 style="font-family: 'Great Vibes', 'Playfair Display', cursive, serif; font-size: 2.2rem; color: var(--blue-ocean); margin: 0 0 10px 0;">Location</h3>

        <!-- Gambar Lokasi/Gedung -->
        <div style="margin: 15px auto; max-width: 90%; overflow: hidden; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
            <img src="{{ asset('images/hotel-mulia.webp') }}" alt="Grand Ballroom Hotel Mulia" style="width: 100%; height: auto; display: block; object-fit: cover;">
        </div>

        <!-- Nama Tempat & Alamat -->
        <h4 style="font-size: 1.1rem; font-weight: 700; color: #2b3a4a; margin: 10px 0 5px 0;">Grand Ballroom Hotel Mulia Senayan</h4>
        <p style="font-size: 0.85rem; color: #555; line-height: 1.5; margin: 0 0 20px 0; padding: 0 10px;">
            Jl. Asia Afrika, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270
        </p>

        <!-- Button Open in Google Maps -->
        <a href="https://maps.app.goo.gl/jCy4SFAwyPjkoLpm7" target="_blank" rel="noopener noreferrer" 
           style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; background-color: #3b597b; color: #ffffff; padding: 12px 24px; border-radius: 30px; text-decoration: none; font-size: 0.9rem; font-weight: 600; box-shadow: 0 4px 12px rgba(59, 89, 123, 0.3); transition: all 0.3s ease;">
            <i class="fas fa-map-marked-alt"></i>
            <span>Open in Google Maps</span>
        </a>
    </div>

    <!-- Mawar Bawah -->
    <div class="white-rose-bottom" style="margin-bottom: -2px; padding: 0;">
        <img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom" style="width: 100%; height: auto; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
    </div>
</div>
            <!-- KARTU DATE & TIME -->
<div class="card" style="opacity: 1 !important; display: block !important; position: relative; overflow: hidden; padding-bottom: 0;">
    <div class="white-rose-top" style="margin-top: -2px; padding: 0;">
        <img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top" style="width: 100%; height: auto; border-top-left-radius: 20px; border-top-right-radius: 20px;">
    </div>

    <div style="padding: 10px 20px 20px 20px; text-align: center;">
        <div style="font-size: 1.8rem; color: var(--blue-ocean); margin-bottom: 0.3rem;">
            <i class="far fa-calendar-alt"></i>
        </div>
        <h3 style="font-family: 'Great Vibes', 'Playfair Display', cursive, serif; font-size: 2.2rem; color: var(--blue-ocean); margin: 0 0 5px 0;">Date & Time</h3>
        
        <!-- TANGGAL TEKS (UBAH KE TAHUN DEPAN/2027) -->
        <p style="font-size: 1rem; font-weight: 600; color: #2b3a4a; margin-bottom: 4px;">Wednesday, December 8th, 2027</p>
        <p style="font-size: 0.85rem; color: #555; font-style: italic; margin-top: 0;">Ceremony begins at 7:30 - 9:00 AM</p>

        <div id="countdown-box" style="margin-top: 1.2rem; padding-top: 1.2rem; border-top: 1px dashed rgba(88, 111, 131, 0.3);">
            <p class="serif-title" style="margin-bottom: 0.8rem; font-size: 0.95rem; color: #4a5a6a;">Counting Down To Our Big Day</p>
            
            <div class="countdown-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; margin-bottom: 10px;">
                <div class="count-box" style="background: #ffffff; border-radius: 12px; padding: 12px 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.06); border: 1px solid rgba(0,0,0,0.04);">
                    <div class="num" id="days" style="font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: #2b3a4a;">0</div>
                    <div class="label" style="font-size: 0.75rem; color: #666; margin-top: 4px; font-style: italic;">Hari</div>
                </div>
                <div class="count-box" style="background: #ffffff; border-radius: 12px; padding: 12px 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.06); border: 1px solid rgba(0,0,0,0.04);">
                    <div class="num" id="hours" style="font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: #2b3a4a;">0</div>
                    <div class="label" style="font-size: 0.75rem; color: #666; margin-top: 4px; font-style: italic;">Jam</div>
                </div>
                <div class="count-box" style="background: #ffffff; border-radius: 12px; padding: 12px 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.06); border: 1px solid rgba(0,0,0,0.04);">
                    <div class="num" id="minutes" style="font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: #2b3a4a;">0</div>
                    <div class="label" style="font-size: 0.75rem; color: #666; margin-top: 4px; font-style: italic;">Menit</div>
                </div>
                <div class="count-box" style="background: #ffffff; border-radius: 12px; padding: 12px 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.06); border: 1px solid rgba(0,0,0,0.04);">
                    <div class="num" id="seconds" style="font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: #2b3a4a;">0</div>
                    <div class="label" style="font-size: 0.75rem; color: #666; margin-top: 4px; font-style: italic;">Detik</div>
                </div>
            </div>
        </div>
    </div>

    <div class="white-rose-bottom" style="margin-bottom: -2px; padding: 0;">
        <img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom" style="width: 100%; height: auto; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
    </div>
</div>

              

            <!-- KARTU DRESS CODE -->
            <div class="card fade-in" style="position: relative; overflow: hidden; padding-bottom: 20px;">
                <div class="white-rose-top" style="margin-top: -2px; padding: 0;">
                    <img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top" style="width: 100%; height: auto; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                </div>

                <div style="padding: 15px 20px 0 20px; text-align: center;">
                    <h3 style="font-family: 'Great Vibes', 'Playfair Display', cursive, serif; font-size: 2.2rem; color: var(--blue-ocean); margin: 5px 0;">Dress Code</h3>
                    <p style="font-size: 1rem; font-weight: 600; color: #2b3a4a; margin-bottom: 4px;"></p>
                    <p style="font-size: 0.85rem; color: #555; font-style: italic; margin-top: 0; line-height: 1.4;">To complement the theme of our reception, guests are kindly requested to dress in formal attire (Suits & Dresses).</p>
                </div>

                <img src="{{ asset('images/dresscode.png') }}" alt="Dress Code Illustration" style="width: 100%; height: auto; display: block; mix-blend-mode: multiply; filter: contrast(110%);">

                <div class="white-rose-bottom" style="margin-bottom: -2px; padding: 0;">
                    <img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom" style="width: 100%; height: auto; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                </div>
            </div>
        </div> <!-- Penutup untuk flex container -->
    </div> <!-- Penutup container -->
</section>
    <!-- SECTION DIGITAL GIFT BARU -->
    <section class="gift" id="gift">
        <div class="container">
            <h2 class="fade-in">Wedding Gift</h2>
            <div class="card fade-in">
                <div class="white-rose-top"><img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top"></div>
                <div class="ribbon-banner">🎁 Love & Blessings 🎁</div>
                <p>Doa restu Anda merupakan hadiah terindah bagi kami. Namun jika Anda ingin memberi hadiah, Anda dapat mengirimkannya melalui:</p>

                <!-- Rekening 1 -->
                <div class="bank-card">
                    <p style="margin-bottom: 0.2rem; font-weight: 600; color: var(--blue-ocean);">BANK BCA</p>
                    <div class="bank-number" id="bankNum1">1234 5678 90</div>
                    <p style="font-size: 0.8rem; margin-bottom: 0.5rem;">a.n Fabian Ahza</p>
                    <button class="btn btn-outline" style="padding: 6px 18px; font-size: 0.75rem;" onclick="copyToClipboard('1234567890')">
                        <i class="fas fa-copy"></i> Salin Rekening
                    </button>
                </div>

                <!-- Rekening 2 -->
                <div class="bank-card">
                    <p style="margin-bottom: 0.2rem; font-weight: 600; color: var(--blue-ocean);">BANK MANDIRI</p>
                    <div class="bank-number" id="bankNum2">0987 6543 21</div>
                    <p style="font-size: 0.8rem; margin-bottom: 0.5rem;">a.n Naifa Az-Zahra</p>
                    <button class="btn btn-outline" style="padding: 6px 18px; font-size: 0.75rem;" onclick="copyToClipboard('0987654321')">
                        <i class="fas fa-copy"></i> Salin Rekening
                    </button>
                </div>

                <div class="white-rose-bottom"><img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom"></div>
            </div>
        </div>
    </section>

    <section class="rsvp" id="rsvp">
    <div class="container">
        <h2 class="fade-in">Join Our Day</h2>
        <div class="card fade-in">
            <div class="white-rose-top"><img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top"></div>
            <div id="rsvpAlert" class="alert"></div>
            
            <form id="weddingRsvp">
                <input type="hidden" id="guestId" name="guest_id" value="{{ $guest->id ?? 1 }}">
                
                <div class="form-group">
                    <label for="guestEmail">Your Email *</label>
                    <input type="email" id="guestEmail" name="email" class="form-control" required placeholder="your@email.com" value="{{ $guest->email ?? '' }}">
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
                    <input type="number" id="totalGuests" name="total_guests" class="form-control" min="1" max="5" value="1" required>
                </div>

                <button type="submit" class="btn" style="width: 100%; margin-top: 0.5rem;">
                    Submit RSVP
                </button>
            </form>
            <div class="white-rose-bottom"><img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom"></div>
        </div>
    </div>
</section>

<section class="qr-section" id="qr">
    <div class="container">
        <h2 class="fade-in">Digital Invitation</h2>
        <div class="qr-container fade-in">
            <div class="white-rose-top"><img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top"></div>
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
            <div class="white-rose-bottom"><img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom"></div>
        </div>
    </div>
</section>

<section class="wishes" id="wishes">
    <div class="container">
        <h2 class="fade-in">Messages & Wishes</h2>
        
        <div class="card fade-in">
            <div class="white-rose-top"><img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Rose Top"></div>
            <div id="wishAlert" class="alert"></div>
            <form id="wishForm">
                <div class="form-group">
                    <label for="wishName">Your Name *</label>
                    <input type="text" id="wishName" name="name" class="form-control" value="{{ $guest->name }}" required>
                </div>
                <div class="form-group">
                    <label for="wishMessage">Your Message *</label>
                    <textarea id="wishMessage" name="message" class="form-control" required placeholder="Share your well wishes for the couple"></textarea>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Send Message</button>
            </form>

            <div class="wishes-list" id="wishesList">
                <!-- 1. Ucapan Dinamis dari Database (Akan bertambah di atas saat dikirim) -->
                @if(isset($wishes) && count($wishes) > 0)
                    @foreach($wishes as $wish)
                        <div class="wish-item">
                            <div class="wish-author">{{ $wish->name }}</div>
                            <div class="wish-message">{{ $wish->message }}</div>
                        </div>
                    @endforeach
                @endif

                <!-- 2. Ucapan Estetik Menetap (Fixed English Wishes) -->
                <div class="wish-item">
                    <div class="wish-author">Sarah & Alexander</div>
                    <div class="wish-message">"Wishing you both a lifetime of unending love, warmth, and laughter. May your sweet union bring more joy than you can ever imagine! Congratulations, Fabian & Naifa!"</div>
                </div>

                <div class="wish-item">
                    <div class="wish-author">David K.</div>
                    <div class="wish-message">"So happy to celebrate this special day with you two! May your love story continue to inspire everyone around you. Best wishes on this wonderful journey!"</div>
                </div>

                <div class="wish-item">
                    <div class="wish-author">Elena & Marcus</div>
                    <div class="wish-message">"May the love you share today grow stronger as you grow old together. Cheers to a beautiful love story and a happily ever after!"</div>
                </div>
            </div>

            <div class="white-rose-bottom"><img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Rose Bottom"></div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <h3>Fabian & Naifa</h3>
        <p>Thank you for being part of our special day!</p>
        
        <ul class="footer-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#couples">Couples</a></li>
            <li><a href="#about">Our Story</a></li>
            <li><a href="#details">Details</a></li>
            <li><a href="#gift">Gift</a></li>
            <li><a href="#rsvp">RSVP</a></li>
        </ul>

        <div class="copyright">
            <p>&copy; 2026 Fabian & Naifa Wedding. All rights reserved.</p>
        </div>
    </div>
</footer>

<audio id="background-music" src="{{ asset('audio/a-thousand.mp3') }}" loop preload="auto"></audio>
<button id="play-pause-button" class="audio-control-btn" title="Kontrol Musik Latar">
    <i class="fas fa-play"></i> 
</button>

<div class="bottom-nav">
    <a href="#hero"><i class="fa-solid fa-house"></i></a>
    <a href="#couples"><i class="fa-solid fa-user-group"></i></a>
    <a href="#details"><i class="fa-solid fa-calendar-check"></i></a>
    <a href="#gift"><i class="fa-solid fa-gift"></i></a>
    <a href="#rsvp"><i class="fa-solid fa-clipboard-check"></i></a>
    <a href="#qr"><i class="fa-solid fa-qrcode"></i></a>
    <a href="#wishes"><i class="fa-solid fa-comment-dots"></i></a>
</div>

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
const csrfMeta = document.querySelector('meta[name="csrf-token"]');
const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Nomor rekening berhasil disalin: ' + text);
    }).catch(err => {
        console.error('Gagal menyalin: ', err);
    });
}

function openInvitation() {
    const cover = document.getElementById('welcome-cover');
    if(cover) cover.classList.add('cover-hidden');

    const audio = document.getElementById('background-music'); 
    if (audio) {
        audio.play().catch(e => console.log(e));
    }
    document.body.style.overflow = 'auto';
}

function closeNotification() {
    document.getElementById('notificationOverlay').classList.remove('show');
    document.getElementById('weddingNotification').classList.remove('show');
}

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Fade In Animation
    const fadeElements = document.querySelectorAll('.fade-in');
    const fadeInOnScroll = function() {
        fadeElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            if (elementTop < window.innerHeight - 150) {
                element.classList.add('visible');
            }
        });
    };
    fadeInOnScroll();
    window.addEventListener('scroll', fadeInOnScroll);

    // 2. Audio Control
    const audio = document.getElementById('background-music');
    const playPauseButton = document.getElementById('play-pause-button');
    if (audio && playPauseButton) {
        audio.volume = 0.4;
        playPauseButton.addEventListener('click', function() {
            if (audio.paused) {
                audio.play().then(() => {
                    playPauseButton.innerHTML = '<i class="fas fa-pause"></i>';
                });
            } else {
                audio.pause();
                playPauseButton.innerHTML = '<i class="fas fa-play"></i>';
            }
        });
    }

    // 3. Countdown Timer Single Clean Script
    const targetDate = new Date("2026-12-08T07:30:00").getTime();
    function updateCountdown() {
        const now = new Date().getTime();
        const distance = targetDate - now;
        
        if (distance > 0) {
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            if (document.getElementById('days')) document.getElementById('days').textContent = days;
            if (document.getElementById('hours')) document.getElementById('hours').textContent = hours;
            if (document.getElementById('minutes')) document.getElementById('minutes').textContent = minutes;
            if (document.getElementById('seconds')) document.getElementById('seconds').textContent = seconds;
        } else {
            const cdBox = document.getElementById('countdown');
            if(cdBox) cdBox.innerHTML = '<p style="font-weight: 600;">The Wedding Day is Here! 🎉</p>';
        }
    }
    updateCountdown();
    setInterval(updateCountdown, 1000);

    // 4. Submit RSVP Form
    const rsvpForm = document.getElementById('weddingRsvp');
    if (rsvpForm) {
        rsvpForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const guestId = document.getElementById('guestId').value;
            const email = document.getElementById('guestEmail').value;
            const attendance = document.querySelector('input[name="attendance"]:checked');
            const totalGuests = document.getElementById('totalGuests').value;
            const alertBox = document.getElementById('rsvpAlert');
            
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
                
                if (data.success) {
                    alertBox.className = 'alert alert-success';
                    alertBox.textContent = 'RSVP submitted successfully!';
                    alertBox.style.display = 'block';
                } else {
                    alertBox.className = 'alert alert-error';
                    alertBox.textContent = 'Failed to submit RSVP.';
                    alertBox.style.display = 'block';
                }
                setTimeout(() => { alertBox.style.display = 'none'; }, 5000);
            } catch (error) {
                console.error('Error:', error);
                alertBox.className = 'alert alert-error';
                alertBox.textContent = 'An error occurred.';
                alertBox.style.display = 'block';
                setTimeout(() => { alertBox.style.display = 'none'; }, 5000);
            }
        });
    }

    // 5. Submit Wish Form
    const wishForm = document.getElementById('wishForm');
    if (wishForm) {
        wishForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const name = document.getElementById('wishName').value;
            const message = document.getElementById('wishMessage').value;
            const alertBox = document.getElementById('wishAlert');

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
                    
                    document.getElementById('wishMessage').value = '';
                    
                    alertBox.className = 'alert alert-success';
                    alertBox.textContent = data.message || 'Wish sent successfully!';
                    alertBox.style.display = 'block';
                } else {
                    alertBox.className = 'alert alert-error';
                    alertBox.textContent = 'Failed to submit wish.';
                    alertBox.style.display = 'block';
                }
                setTimeout(() => { alertBox.style.display = 'none'; }, 5000);
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred.');
            }
        });
    }
});
</script>
</body>
</html>