<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Fabian & Naifa</title>
    
    <style>
        /* --- 1. SETUP BODY & LATAR PERMANEN DENGAN SCROLL --- */
        body {
            font-family: var(--font-sans, 'Poppins', sans-serif);
            color: var(--text-blue, #2c3e50);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            
            /* Panggil Gambar Latar Pernikahan Kamu */
            background-image: url('/images/bg-wedding.jpg');
            background-size: 100% auto;
            background-position: center top;
            background-repeat: no-repeat;
            background-attachment: scroll;
            
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
            position: relative;
        }

        /* --- 2. CONTAINER ANIMASI ELEMEN BERGERAK --- */
        #bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        /* Style Kelopak & Partikel Emas */
        .petal {
            position: absolute;
            top: -10%;
            display: block;
            background: rgba(255, 218, 224, 0.9);
            border-radius: 150% 0 150% 0;
            opacity: 0;
            animation: fall linear infinite;
        }

        .gold {
            background: rgba(255, 215, 0, 0.8);
            border-radius: 50%;
            box-shadow: 0 0 6px rgba(255, 215, 0, 0.8);
        }

        @keyframes fall {
            0% { transform: translateY(0) rotate(0deg) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(110vh) rotate(1080deg) translateX(120px); opacity: 0; }
        }

        /* Variasi Posisi & Kecepatan Petal */
        .petal:nth-child(1) { left: 5%; width: 15px; height: 20px; animation-duration: 15s; animation-delay: 0s; }
        .petal:nth-child(2) { left: 15%; width: 18px; height: 23px; animation-duration: 18s; animation-delay: 2s; }
        .petal:nth-child(3) { left: 25%; width: 20px; height: 26px; animation-duration: 12s; animation-delay: 4s; }
        .petal:nth-child(4) { left: 35%; width: 14px; height: 19px; animation-duration: 22s; animation-delay: 1s; }
        .petal:nth-child(5) { left: 45%; width: 16px; height: 21px; animation-duration: 16s; animation-delay: 3s; }
        .petal:nth-child(6) { left: 55%; width: 22px; height: 28px; animation-duration: 14s; animation-delay: 5s; }
        .petal:nth-child(7) { left: 65%; width: 15px; height: 20px; animation-duration: 19s; animation-delay: 2s; }
        .petal:nth-child(8) { left: 75%; width: 18px; height: 23px; animation-duration: 21s; animation-delay: 4s; }
        .petal:nth-child(9) { left: 85%; width: 20px; height: 26px; animation-duration: 13s; animation-delay: 0s; }
        .petal:nth-child(10) { left: 95%; width: 14px; height: 19px; animation-duration: 23s; animation-delay: 1s; }
        
        .petal.gold:nth-child(11) { left: 10%; width: 6px; height: 6px; animation-duration: 10s; animation-delay: 1s; }
        .petal.gold:nth-child(12) { left: 30%; width: 7px; height: 7px; animation-duration: 12s; animation-delay: 3s; }
        .petal.gold:nth-child(13) { left: 50%; width: 5px; height: 5px; animation-duration: 15s; animation-delay: 2s; }
        .petal.gold:nth-child(14) { left: 70%; width: 7px; height: 7px; animation-duration: 11s; animation-delay: 4s; }
        .petal.gold:nth-child(15) { left: 90%; width: 6px; height: 6px; animation-duration: 13s; animation-delay: 0s; }

        /* --- 3. STYLING KARTU ASLI KAMU --- */
        .card {
            position: relative;
            z-index: 10;
            width: 90%;
            max-width: 400px;
            background-color: #fdfbf7;
            background-image: radial-gradient(#d4c5b9 0.75px, transparent 0.75px), radial-gradient(#d4c5b9 0.75px, #fdfbf7 0.75px);
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
            border-radius: 20px;
            padding: 0 1.5rem 1.5rem 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            margin: 2rem 0;
        }

        .white-rose-top, .white-rose-bottom {
            width: calc(100% + 3rem);
            margin-left: -1.5rem;
            margin-right: -1.5rem;
        }

        .white-rose-top img, .white-rose-bottom img {
            width: 100%;
            height: auto;
            display: block;
        }

        .white-rose-garland img {
            width: 90% !important;
            max-width: 450px;
            height: auto !important;
            display: block;
            margin: 1.5rem auto;
        }
    </style>
</head>
<body>

    <!-- ANIMASI ELEMEN BERGERAK -->
    <div id="bg-animation">
        <div class="petal"></div><div class="petal"></div><div class="petal"></div><div class="petal"></div><div class="petal"></div>
        <div class="petal"></div><div class="petal"></div><div class="petal"></div><div class="petal"></div><div class="petal"></div>
        <div class="petal gold"></div><div class="petal gold"></div><div class="petal gold"></div><div class="petal gold"></div><div class="petal gold"></div>
    </div>

    <!-- KARTU UNDANGAN ASLI KAMU -->
    <div class="card">
        <!-- Mawar Atas -->
        <div class="white-rose-top">
            <img src="{{ asset('images/mawar-putih-atas.png') }}" alt="Mawar Atas">
        </div>

        <!-- Teks & Konten -->
        <div style="text-align: center;">
            <p style="font-size: 0.8rem; letter-spacing: 2px; color: #bfa088; margin-top: 1rem;">🎀 THE WEDDING OF 🎀</p>
            <h1 style="font-family: 'Playfair Display', serif; font-size: 2.2rem; margin: 0.5rem 0; color: #2c3e50;">Fabian & Naifa</h1>
            
            <!-- Mawar Tengah / Garland -->
            <div class="white-rose-garland">
                <img src="{{ asset('images/mawar-tengah.png') }}" alt="Mawar Tengah">
            </div>

            <!-- Foto Pasangan -->
            <div style="margin: 1.5rem 0;">
                <img src="{{ asset('images/foto-pasangan.jpg') }}" alt="Fabian & Naifa" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; border: 4px solid #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            </div>
        </div>

        <!-- Mawar Bawah -->
        <div class="white-rose-bottom">
            <img src="{{ asset('images/mawar-putih-bawah.png') }}" alt="Mawar Bawah">
        </div>
    </div>

</body>
</html>